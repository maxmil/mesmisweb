<?php use_helper('Menu') ?>

<div id="menu">
  <div id="menuPhoto"><?php echo image_tag('menu_photo_' . rand(0, 9). '.jpg', 'id="menuPhoto"') ?></div>
  <div id="menuBar">
    <?php if(is_selected('HOME')): ?>
      <div class="link selected"><?php echo link_to(__('<span class="highlight">Inicio</span>'), 'news/index') ?></div>
    <?php else: ?>
      <div class="link"><?php echo link_to(__('<span class="highlight">Inicio</span>'), 'news/index') ?></div>
    <?php endif; ?>
    <?php if(!is_selected('HOME') && !is_selected('PROJECT')): ?>
      <div class="menuSeparator">|</div>
    <?php endif; ?>
    <?php if(is_selected('PROJECT')): ?>
      <div class="link selected"><?php echo link_to(__('El proyecto <span class="highlight">Mesmis</span>'), 'static/index?content=about_us') ?></div>
    <?php else: ?>
      <div class="link"><?php echo link_to(__('El proyecto <span class="highlight">Mesmis</span>'), 'static/index?content=about_us') ?></div>
    <?php endif; ?>
    <?php if(!is_selected('PROJECT') && !is_selected('FRAMEWORK')): ?>
      <div class="menuSeparator">|</div>
    <?php endif; ?>
    <?php if(is_selected('FRAMEWORK')): ?>
      <div class="link selected"><?php echo link_to(__('El marco <span class="highlight">Mesmis</span>'), 'static/index?content=mesmis_framework') ?></div>
    <?php else: ?>
      <div class="link"><?php echo link_to(__('El marco <span class="highlight">Mesmis</span>'), 'static/index?content=mesmis_framework') ?></div>
    <?php endif; ?>
    <?php if(!is_selected('FRAMEWORK') && !is_selected('PRODUCT')): ?>
      <div class="menuSeparator">|</div>
    <?php endif; ?>
    <?php if(is_selected('PRODUCT')): ?>
      <div class="link selected"><?php echo link_to(__('<span class="highlight">Recursos</span>'), 'product/index') ?></div>
    <?php else: ?>
      <div class="link"><?php echo link_to(__('<span class="highlight">Recursos</span>'), 'product/index') ?></div>
    <?php endif; ?>
    <?php if(!is_selected('PRODUCT') && !is_selected('LINKS')): ?>
      <div class="menuSeparator">|</div>
    <?php endif; ?>
    <?php if(is_selected('LINKS')): ?>
      <div class="link selected"><?php echo link_to(__('<span class="highlight">Páginas</span> relacionadas'), 'content/index?alias=links') ?></div>
    <?php else: ?>
      <div class="link"><?php echo link_to(__('<span class="highlight">Páginas</span> relacionadas'), 'content/index?alias=links') ?></div>
      <div class="menuSeparator">|</div>
    <?php endif; ?>
    <div class="link"><a href="mailto:giraac@gira.org.mx"><?php echo __('<span class="highlight">Contactar</span>') ?></a></div>
  </div>
</div>