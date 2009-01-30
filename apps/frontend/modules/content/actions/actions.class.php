<?php

/**
 * Generate content pages defined in datasource.
 *
 * @package    mesmisweb
 * @subpackage content
 * @author     Max Pimm (mail at alwayssunny.com)
 */
class contentActions extends sfActions {

 /**
  * Retreives content from the database based on its alias
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request) {

    $this->alias = $this->getRequestParameter("alias");

    $c = new Criteria();
    $c->add(ContentPeer::STATE, ContentPeer::STATE_PUBLISHED);
    $c->add(ContentPeer::ALIAS, $this->alias);
    $contentList = ContentPeer::doSelect($c);

    $this->forward404If(empty($contentList));

    $this->content = $contentList[0];
  }

}
