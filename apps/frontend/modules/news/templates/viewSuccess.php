<?php use_helper('Date') ?>

<div id="news">
  <div class="navBar"><a href="#" onclick="history.go(-1);return false;" class="btn"><?php echo __('<< Other stories') ?></a></div>
  <div class="ni">
    <div class="title">
      <div class="niCreatedAt"><?php echo format_date($newsItem->getCreatedAt(), 'dd/MM/yyyy')  ?></div>
      <?php echo link_to('<h2>' . $newsItem->getTitle() . '</h2>', 'news/view?id=' . $newsItem->getId()) ?>
    </div>
    <div class="separator"></div>
    <div class="niPhoto"><?php echo image_tag('/uploads/'. $newsItem->getPhotoFilename()) ?></div>
    <div class="niContent">
      <?php echo $newsItem->getBody() ?>
    </div>
  </div>
  <div id="navBarBtm" class="navBar"><a href="#" onclick="history.go(-1);return false;" class="btn"><?php echo __('<< Other stories') ?></a></div>
</div>