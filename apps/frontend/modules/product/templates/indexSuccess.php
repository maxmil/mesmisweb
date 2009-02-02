<?php use_helper('Javascript') ?>

<div id="register"></div>

<table>
<?php foreach($pager->getResults() as $product): ?>
  <tr>
    <td class="prPhoto"><?php echo image_tag('/uploads/'. $product->getPhotoFilename()) ?></td>
    <td class="prSum">
      <div class="prTitle">
        <?php echo link_to_remote($product->getTitle(), array(
           'update' => 'register',
           'url' => 'product/download?id=' . $product->getId(),
           'script' => 'true'
        )) ?>
      </div>
      <div class="prDescrip"><?php echo $product->getDescrip() ?></div>
    </td>
  </tr>
<?php endforeach; ?>
</table>

<?php if ($pager->haveToPaginate()): ?>
  <?php echo link_to('&laquo;', 'product/index?page='.$pager->getFirstPage()) ?>
  <?php echo link_to('&lt;', 'product/index?page='.$pager->getPreviousPage()) ?>
  <?php $links = $pager->getLinks(); foreach ($links as $page): ?>
    <?php echo ($page == $pager->getPage()) ? $page : link_to($page, 'product/index?page='.$page) ?>
    <?php if ($page != $pager->getCurrentMaxLink()): ?> - <?php endif ?>
  <?php endforeach ?>
  <?php echo link_to('&gt;', 'product/index?page='.$pager->getNextPage()) ?>
  <?php echo link_to('&raquo;', 'product/index?page='.$pager->getLastPage()) ?>
<?php endif ?>
