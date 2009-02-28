<?php if ($pager->haveToPaginate()): ?>
  <div class="navBar">
    <?php if ($pager->getPreviousPage() < $pager->getPage()) echo link_to(__('<< Anterior'), 'product/index?page=' . $pager->getPreviousPage(), 'class="btn light"') ?>
    <?php if ($pager->getNextPage() > $pager->getPage()) echo link_to(__('Siguiente >>'), 'product/index?page=' . $pager->getNextPage(), 'class="btn"') ?>
  </div>
<?php endif; ?>