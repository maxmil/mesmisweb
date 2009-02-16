<?php

  function news_summary($newsItem){
    if(strlen($newsItem->getBody()) <= 600){
      return $newsItem->getBody();
    }else{
      $out = substr($newsItem->getBody(), 0, 600) . '...';
      $out .= '<div class="niReadMore">' . link_to(__('Leer más >>'), 'news/view?id=' . $newsItem->getId()) . '</div>';
      return $out;
    }
  }

?>
