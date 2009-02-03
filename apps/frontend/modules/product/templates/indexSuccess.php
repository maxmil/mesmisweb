<?php use_helper('Javascript') ?>

<script type="text/javascript">
  //<![CDATA[

  String.prototype.trim = function() {
    return this.replace(/^\s+|\s+$/g,"");
  }

  function addError(field, msg){
      clearErrors(field);
      Element.insert(field.parentNode, '<div class="error">' + msg + '</div>');
      Element.addClassName(field, 'error');
  }

  function validateEmail() {
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if(reg.test($F('email')) == false) {
      addError($('email'), '<?php echo __('* El e-mail introducido no es válido') ?>');
      return false;
    }
    return true;
  }

  function validateRegister(){
    var errors;
    if($F('name').trim().length == 0) {
      addError($('name'), '* <?php echo __('Campo obligatorio') ?>');
      errors = true;
    }
    if($F('surname1').trim().length == 0) {
      addError($('surname1'), '* <?php echo __('Campo obligatorio') ?>');errors = true;
    }
    if($F('institution').trim().length == 0) {
      addError($('institution'), '* <?php echo __('Campo obligatorio') ?>');errors = true;
    }
    return !errors;
  }

  function clearErrors(field){
    Element.removeClassName(field, 'error');
    Element.select(field.parentNode, '.error').each(function(e){Element.remove(e)});
  }

  function showDialog(){
    $('overlay').style.display = 'block';
    $('dialogWrapper').style.display = 'block';
  }

  function closeDialog(){
    $('overlay').style.display = 'none';
    $('dialogWrapper').style.display = 'none';
    $('dialogCont').innerHTML = '';
  }
  
  //]]>
</script>

<div id="overlay"></div>
<div id="dialogWrapper">
  <div id="dialog">
      <div class="top"></div>
      <div id="dialogCont" class="middle"></div>
      <div class="bottom"></div>
  </div>
</div>

<table>
<?php foreach($pager->getResults() as $product): ?>
  <tr>
    <td class="prPhoto"><?php echo image_tag('/uploads/'. $product->getPhotoFilename()) ?></td>
    <td class="prSum">
      <div class="prTitle">
        <?php echo link_to_remote($product->getTitle(), array(
           'update' => 'dialogCont',
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
