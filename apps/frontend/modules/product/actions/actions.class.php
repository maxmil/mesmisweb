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
    $c->add(ProductPeer::STATE, ProductPeer::STATE_PUBLISHED);
    $c->addDescendingOrderByColumn(ProductPeer::UPDATED_AT);
    $pager = new sfPropelPager('Product', 5);
    $pager->setCriteria($c);
    $pager->setPage($this->getRequestParameter('page', 1));
    $pager->init();
    $this->pager = $pager;
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
      return $this->renderPartial('getEmail');
    }

    // If this is ajax request then just return download partial
    if($request->isXmlHttpRequest()){
      return $this->renderPartial('download');
    }

    // Save the download
    $download = new Download();
    $download->setProduct($this->product);
    $download->setUser($user);
    $download->setCulture($this->getUser()->getCulture());
    $download->save();

    // Stream the file or forward to url
    $fileName = $this->product->getAttachFilename();
    if(!empty($fileName)){

      $filePath = sfConfig::get('sf_data_dir') . DIRECTORY_SEPARATOR . 'products' . DIRECTORY_SEPARATOR . $fileName;
      
      $response = $this->getResponse();
      $response->setContentType($this->product->getMimeType());
      $response->setHttpHeader('Content-Disposition', 'attachment; filename='. $fileName);
      $response->setHttpHeader('Content-Length', filesize($filePath));
      $response->sendHttpHeaders();
      
      readfile($filePath);

      return sfView::NONE;

    } else {

      // If partial with this name exists then render else redirect to url
      $partial = $this->getContext()->getModuleDirectory() . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . '_' . $this->product->getUrl() . '.php';
      if (is_readable($partial)) {
         return $this->renderPartial($this->product->getUrl());
      } else {
         return $this->redirect($this->product->getUrl());
      }
    }
  }

  public function executeLogin(sfWebRequest $request)
  {

    $this->id = $request->getParameter('id');
    $email = $request->getParameter('email');

    // Check that user is registered
    $c = new Criteria();
    $c->add(UserPeer::EMAIL, $email);
    $users = UserPeer::doSelect($c);

    // If user not registered then return the registration form
    if (empty($users)){
      $this->user = new User();
      $this->user->setEmail($email);
      return $this->renderPartial('register');
    } else {
      $user = $users[0];
    }

    // Save useful user data in session
    $this->getUser()->setAttribute('userEmail', $user->getEmail());
    $this->getUser()->setAttribute('userId', $user->getId());

    // Save visit
    $visit = new Visit();
    $visit->setUser($user);
    $visit->setIp($request->getRemoteAddress());
    $visit->save();

    return $this->renderPartial('download');
  }

  public function executeRegister(sfRequest $request)
  {
    $this->id = $request->getParameter('id');

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
    $visit->setIp($request->getRemoteAddress());
    $visit->save();

    return $this->renderPartial('download');
  }
}
