<?php use_helper('Menu') ?>

<div id="menu">
  <?php echo image_tag('menu_photo_1.jpg', 'id="menuPhoto"') ?>
  <div id="menuBar">
    <?php if(is_selected('HOME')): ?>
      <span class="link selected"><?php echo link_to(__('<span class="highlight">Inicio</span>'), 'news/index') ?></span>
    <?php else: ?>
      <span class="link"><?php echo link_to(__('<span class="highlight">Inicio</span>'), 'news/index') ?></span>
    <?php endif; ?>
    <?php if(!is_selected('HOME') && !is_selected('PROJECT')): ?>
      <span class="menuSeparator">|</span>
    <?php endif; ?>
    <?php if(is_selected('PROJECT')): ?>
      <span class="link selected"><?php echo link_to(__('El proyecto <span class="highlight">Mesmis</span>'), 'static/index?content=about_us') ?></span>
    <?php else: ?>
      <span class="link"><?php echo link_to(__('El proyecto <span class="highlight">Mesmis</span>'), 'static/index?content=about_us') ?></span>
    <?php endif; ?>
    <?php if(!is_selected('PROJECT') && !is_selected('FRAMEWORK')): ?>
      <span class="menuSeparator">|</span>
    <?php endif; ?>
    <?php if(is_selected('FRAMEWORK')): ?>
      <span class="link selected"><?php echo link_to(__('El marco <span class="highlight">Mesmis</span>'), 'static/index?content=mesmis_framework') ?></span>
    <?php else: ?>
      <span class="link"><?php echo link_to(__('El marco <span class="highlight">Mesmis</span>'), 'static/index?content=mesmis_framework') ?></span>
    <?php endif; ?>
    <?php if(!is_selected('FRAMEWORK') && !is_selected('PRODUCT')): ?>
      <span class="menuSeparator">|</span>
    <?php endif; ?>
    <?php if(is_selected('PRODUCT')): ?>
      <span class="link selected"><?php echo link_to(__('<span class="highlight">Recursos</span>'), 'product/index') ?></span>
    <?php else: ?>
      <span class="link"><?php echo link_to(__('<span class="highlight">Recursos</span>'), 'product/index') ?></span>
    <?php endif; ?>
    <?php if(!is_selected('PRODUCT') && !is_selected('LINKS')): ?>
      <span class="menuSeparator">|</span>
    <?php endif; ?>
    <?php if(is_selected('LINKS')): ?>
      <span class="link selected"><?php echo link_to(__('<span class="highlight">Páginas</span> relacionadas'), 'content/index?alias=links') ?></span>
    <?php else: ?>
      <span class="link"><?php echo link_to(__('<span class="highlight">Páginas</span> relacionadas'), 'content/index?alias=links') ?></span>
    <?php endif; ?>
  </div>
</div>