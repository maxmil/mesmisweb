<?php

/**
 * comment actions.
 *
 */
class commentActions extends sfActions
{
 /**
  * Initializes a comment
  *
  * @param sfRequest $request A request object
  */
  public function executeInit(sfWebRequest $request)
  {
    //get users email
    $this->email = $request->getParameter('email');
  }

  public function executeSave(sfWebRequest $request)
  {
    //get user by email
    $email = $request->getParameter("email");
    $c = new Criteria();
    $c->add(UserPeer::EMAIL, $email);
    $users = UserPeer::doSelect($c);

    //if no user found then throw error
    $this->forward404If(empty($users));

    //save comment
    $comment = new Comment();
    $comment->setUser($users[0]);
    $comment->setComment($request->getParameter("comment"));
    $comment->save();
  }
}
