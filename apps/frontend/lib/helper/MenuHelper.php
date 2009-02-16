<?php

  function is_selected($tab){
    $routing = sfContext::getInstance()->getRouting();
    $currUri = $routing->getCurrentInternalURI();
    $i1 = strpos($currUri, '/');
    $i2 = strpos($currUri, '?') ? strpos($currUri, '?') : strlen($currUri);
    $module = substr($currUri, 0, $i1);
    $action = substr($currUri, $i1 + 1, $i2 - $i1 - 1);
    $params = array();
    parse_str(substr($currUri, $i2 + 1), $params);
    //echo ($tab . $module);
    switch ($tab){
      case 'HOME':
        if ($module == 'news'){
          return true;
        }
        break;
      case 'PROJECT':
        if ($module == 'static' && $params['content'] == 'about_us'){
          return true;
        }
        break;
      case 'FRAMEWORK':
        if ($module == 'static' && $params['content'] == 'mesmis_framework'){
          return true;
        }
        break;
      case 'PRODUCT':
        if ($module == 'product'){
          return true;
        }
        break;
      case 'LINKS':
        if ($module == 'content' && $params['alias'] == 'links'){
          return true;
        }
        break;
    }
    return false;
  }

?>
