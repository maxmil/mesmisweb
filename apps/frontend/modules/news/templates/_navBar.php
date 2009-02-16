<?php if ($pager->haveToPaginate()): ?>
  <div class="navBar">
    <?php if ($pager->getPreviousPage() < $pager->getPage()) echo link_to(__('<< Noticias más recentes'), 'news/index?page=' . $pager->getPreviousPage(), 'class="btn light"') ?>
    <?php if ($pager->getNextPage() > $pager->getPage()) echo link_to(__('Noticias anteriores >>'), 'news/index?page=' . $pager->getNextPage(), 'class="btn"') ?>
  </div>
<?php endif; ?>