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

<div id="products">
  <?php foreach($pager->getResults() as $product): ?>
    <div class="pr">
      <h2>
        <?php echo link_to_remote($product->getTitle(), array(
           'update' => 'dialogCont',
           'url' => 'product/download?id=' . $product->getId(),
           'script' => 'true'
        )) ?>
      </h2>
      <div class="separator"></div>
      <?php if($product->getPhotoFilename() != null && $product->getPhotoFilename() != ''): ?>
        <div class="prPhotoCont"><div class="prPhoto"><?php echo image_tag('/uploads/'. $product->getPhotoFilename()) ?></div></div>
      <?php endif; ?>
      <div class="prContent">
        <?php echo $product->getDescrip() ?>
      </div>
    </div>
  <?php endforeach; ?>
</div>
<div style="clear:both"></div>