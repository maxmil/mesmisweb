<?php use_helper('Date', 'News') ?>
<?php decorate_with('layout_sidebar') ?>

<div id="news">
  <?php include_partial('navBar', array('pager' => $pager)); ?>
  <?php foreach($pager->getResults() as $newsItem): ?>
    <div class="ni">
      <div class="title">
        <div class="niCreatedAt"><?php echo format_date($newsItem->getCreatedAt(), 'dd/MM/yyyy')  ?></div>
        <?php echo link_to('<h2>' . $newsItem->getTitle() . '</h2>', 'news/view?id=' . $newsItem->getId()) ?>
      </div>
      <div class="separator"></div>
      <div class="niPhoto"><?php echo image_tag('/uploads/'. $newsItem->getPhotoFilename()) ?></div>
      <div class="niContent" style="margin-left:210px">
        <?php echo news_summary($newsItem) ?>
      </div>
    </div>
  <?php endforeach; ?>
  <div id="navBarBtm"><?php include_partial('navBar', array('pager' => $pager)); ?></div>
</div>
