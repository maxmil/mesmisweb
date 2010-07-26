<?php

/**
 * product actions.
 *
 * @package    mesmisweb
 * @subpackage product
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class productActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {

    $c = new Criteria();
    $c->addAscendingOrderByColumn(ProductGroupI18nPeer::TITLE);
    $this->productGroups = ProductGroupPeer::doSelectWithI18n($c);
  }

  public function executeOpenMI(sfWebRequest $request)
  {
    $c = new Criteria();
    $c->add(ProductPeer::STATE, ProductPeer::STATE_PUBLISHED);
    $c->add(ProductPeer::TYPE, ProductPeer::TYPE_MILINK);
    $products = ProductPeer::doSelect($c);
    $request->setParameter('id', $products[0]->getId());
    $this->forward('product', 'download');
  }

  public function executeDownload(sfWebRequest $request)
  {

    $this->id = $request->getParameter('id');
    
    // Get the product
    $this->product = ProductPeer::retrieveByPK($this->id);
    $this->forward404If(empty($this->product));

    // Get the user
    $user = UserPeer::retrieveByPK($this->getUser()->getAttribute('userId'));
    if (empty($user)){
      if($request->isXmlHttpRequest()){
        return $this->renderPartial('getEmail');
      }else{
        return "GetEmail";
      }
    }

    // If this is ajax request then just return download partial which will call
    // this action as a full page request
    if($request->isXmlHttpRequest()){
      return $this->renderPartial('download');
    }

    // Save the download
    $download = new Download();
    $download->setProduct($this->product);
    $download->setUser($user);
    $download->setCulture($this->getUser()->getCulture());
    $download->save();

    // Stream the file or render partial
    if($this->product->getType() == ProductPeer::TYPE_FILE){

      $filePath = sfConfig::get('sf_data_dir') . DIRECTORY_SEPARATOR . 'products' . DIRECTORY_SEPARATOR . $this->product->getResource();
      
      $response = $this->getResponse();
      $response->setContentType($this->product->getMimeType());
      $response->setHttpHeader('Content-Disposition', 'attachment; filename='. $this->product->getResource());
      $response->setHttpHeader('Content-Length', filesize($filePath));
      $response->sendHttpHeaders();
      
      readfile($filePath);

      return sfView::NONE;

    } else {
      $this->logMessage("Serving resource " . $this->product->getResource());
      $this->getResponse()->setTitle($this->product->getTitle());
      return $this->renderPartial($this->product->getResource());
    }
  }

  public function executeLogin(sfWebRequest $request)
  {

    $this->id = $request->getParameter('id');
    $email = $request->getParameter('e-mail');

    // Get the product
    $this->product = ProductPeer::retrieveByPK($this->id);
    $this->forward404If(empty($this->product));

    // Check that user is registered
    $c = new Criteria();
    $c->add(UserPeer::EMAIL, $email);
    $users = UserPeer::doSelect($c);

    // If user not registered then return the registration form
    if (empty($users)){
      $this->user = new User();
      $this->user->setEmail($email);
      if($request->isXmlHttpRequest()){
        return $this->renderPartial('register');
      }else{
        return "Register";
      }
      
    } else {
      $user = $users[0];
    }

    // Save useful user data in session
    $this->getUser()->setAttribute('userEmail', $user->getEmail());
    $this->getUser()->setAttribute('userId', $user->getId());

    // Save visit
    $visit = new Visit();
    $visit->setUser($user);
    $visit->setIp($_SERVER['REMOTE_ADDR']);
    $visit->save();

    return $this->renderPartial('download');
  }

  public function executeRegister(sfRequest $request)
  {
    $this->id = $request->getParameter('id');

    // Get the product
    $this->product = ProductPeer::retrieveByPK($this->id);
    $this->forward404If(empty($this->product));

    // Define new user
    $user = new User();
    $user->fromArray($request->getParameterHolder()->getAll(), BasePeer::TYPE_FIELDNAME);
    $user->setId(null);

    // If user exists with same email then update otherwise insert
    $c = new Criteria();
    $c->add(UserPeer::EMAIL, $user->getEmail());
    $users = UserPeer::doSelect($c);
    if(!empty($users)){
      $this->logMessage($users[0]->getId());
      $user->setId($users[0]->getId());
    }
    $this->logMessage($user->getId());
    $user->save();

    // Save useful user data in session
    $this->getUser()->setAttribute('userId', $user->getId());
    $this->getUser()->setAttribute('userEmail', $user->getEmail());

    // Save visit
    $visit = new Visit();
    $visit->setUser($user);
    $visit->setIp($_SERVER['REMOTE_ADDR']);
    $visit->save();

    return $this->renderPartial('download');
  }

  public function executeLoadMI(sfWebRequest $request)
  {
    // Get the user
    $user = UserPeer::retrieveByPK($this->getUser()->getAttribute('userId'));
    if (empty($user)){
        $this->redirect('/product/index');
    }else{
        return $this->renderPartial('load_mesmis_interactivo');
    }

  }
}
