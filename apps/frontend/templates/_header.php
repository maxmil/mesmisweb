<div id="header">
  <div id="logo"><?php echo image_tag('/images/logo.png') ?></div>
  <div id="langSelect">
    <div><a href="#" onclick="alert('We are working on an English version of the site but it is not yet finished. Please try again soon');return false" class="<?php echo ($sf_user->getCulture() == 'en') ? 'btn selected' : 'btn'?>">ENGLISH</a></div>
    <div><a href="?culture=es" class="<?php echo ($sf_user->getCulture() == 'es') ? 'btn selected' : 'btn'?>">ESPAÑOL</a></div>
  </div>
</div>