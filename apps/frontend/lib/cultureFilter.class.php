<?php

class cultureFilter extends sfFilter
{
  public function execute($filterChain)
  {
    $culture = $this->getContext()->getRequest()->getParameter('culture');
    if (!empty($culture)){
      $user = $this->getContext()->getUser();
      $user->setCulture($culture);
    }

    $filterChain->execute();
  }
}


?>
