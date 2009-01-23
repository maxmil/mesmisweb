<?php use_helper('Date') ?>

<table>
<?php foreach($pager->getResults() as $newsItem): ?>
  <tr>
    <td class="niPhoto"><?php echo image_tag('/uploads/'. $newsItem->getPhotoFilename()) ?></td>
    <td class="niSum">
      <div class="niCreatedAt"><?php echo format_date($newsItem->getCreatedAt(), 'dd/MM/yyyy')  ?></div>
      <div class="niTitle"><?php echo $newsItem->getTitle() ?></div>
      <div class="niDescrip"><?php echo $newsItem->getBody() ?></div>
    </td>
  </tr>
<?php endforeach; ?>
</table>

<?php if ($pager->haveToPaginate()): ?>
  <?php echo link_to('&laquo;', 'news/index?page='.$pager->getFirstPage()) ?>
  <?php echo link_to('&lt;', 'news/index?page='.$pager->getPreviousPage()) ?>
  <?php $links = $pager->getLinks(); foreach ($links as $page): ?>
    <?php echo ($page == $pager->getPage()) ? $page : link_to($page, 'news/index?page='.$page) ?>
    <?php if ($page != $pager->getCurrentMaxLink()): ?> - <?php endif ?>
  <?php endforeach ?>
  <?php echo link_to('&gt;', 'news/index?page='.$pager->getNextPage()) ?>
  <?php echo link_to('&raquo;', 'news/index?page='.$pager->getLastPage()) ?>
<?php endif ?>
