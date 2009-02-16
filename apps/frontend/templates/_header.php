<div id="header">
  <div id="logo"><?php echo image_tag('/images/logo.png') ?></div>
  <div id="langSelect">
    <div><a href="?culture=en" class="<?php echo ($sf_user->getCulture() == 'en') ? 'btn selected' : 'btn'?>">ENGLISH</a></div>
    <div><a href="?culture=es" class="<?php echo ($sf_user->getCulture() == 'es') ? 'btn selected' : 'btn'?>">ESPAÑOL</a></div>
  </div>
</div>