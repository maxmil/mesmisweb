<?php

/**
 * news actions.
 *
 * @package    mesmisweb
 * @subpackage news
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class newsActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $c = new Criteria();
    $c->add(NewsItemPeer::STATE, NewsItemPeer::STATE_PUBLISHED);
    $c->addDescendingOrderByColumn(NewsItemPeer::PRIORITY);
    $pager = new sfPropelPager('NewsItem', 5);
    $pager->setCriteria($c);
    $pager->setPage($this->getRequestParameter('page', 1));
    $pager->init();
    $this->pager = $pager;
    //$this->newsItems = NewsItemPeer::doSelect($c);
    //$this->forward('default', 'module');
  }

  public function executeView(sfWebRequest $request)
  {
    $id = $request->getParameter("id");

    $this->newsItem = NewsItemPeer::retrieveByPK($id);

    $this->forward404If(empty($this->newsItem));
    $this->forward404If($this->newsItem->getState() != NewsItemPeer::STATE_PUBLISHED);
  }
}
