<?php use_helper('Javascript') ?>

<script type="text/javascript">
  //<![CDATA[

  String.prototype.trim = function() {
    return this.replace(/^\s+|\s+$/g,"");
  }

  function validateEmail() {
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if(reg.test($F('email')) == false) {
      Element.insert($('email').parentNode, '<div class="error"><?php echo __('El e-mail introducido no es válido') ?></div>');
      return false;
    }
    return true;
  }

  function validateRegister(){
    var errors;
    if($F('name').trim().length == 0) {
      clearErrors($('name'));
      Element.insert($('name').parentNode, '<div class="error">* Campo obligatorio</div>');
      errors = true;
    }
    if($F('surname1').trim().length == 0) {
      clearErrors($('surname1'));
      Element.insert($('surname1').parentNode, '<div class="error">* Campo obligatorio</div>');
      errors = true;
    }
    if($F('institution').trim().length == 0) {
      clearErrors($('institution'));
      Element.insert($('institution').parentNode, '<div class="error">* Campo obligatorio</div>');
      errors = true;
    }
    return !errors;
  }

  function clearErrors(field){
    Element.select(field.parentNode, '.error').each(function(e){Element.remove(e)})
  }
  
  //]]>
</script>

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
