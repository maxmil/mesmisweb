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

        <?php if($product->getType() == ProductPeer::TYPE_FILE): ?>
          <div class="prIcon">
          <?php echo link_to_remote(image_tag('/images/ico-'. strtolower($product->getType()) . '.png'), array(
              'update' => 'dialogCont',
              'url' => 'product/download?id=' . $product->getId(),
              'script' => 'true')) ?>
          </div>
          <h3>
           <?php echo link_to_remote($product->getTitle(), array(
              'update' => 'dialogCont',
              'url' => 'product/download?id=' . $product->getId(),
              'script' => 'true')) ?>
          </h3>
        <?php elseif($product->getType() == ProductPeer::TYPE_MILINK): ?>
          <div class="prIcon">
            <a href="" onclick="openMI('<?php echo $sf_request->getRelativeUrlRoot() ?>', '<?php echo $sf_user->getCulture() ?>');return false">
              <?php echo image_tag('/images/ico-'. strtolower($product->getType()) . '.png') ?>
            </a>
          </div>
          <h3>
            <a href="" onclick="openMI('<?php echo $sf_request->getRelativeUrlRoot() ?>', '<?php echo $sf_user->getCulture() ?>');return false">
              <?php echo $product->getTitle() ?>
            </a>
          </h3>
        <?php elseif($product->getType() == ProductPeer::TYPE_EMAIL): ?>
          <div class="prIcon">
            <a href="mailto:<?php echo $product->getResource() ?>"><?php echo image_tag('/images/ico-'. strtolower($product->getType()) . '.png') ?></a>
          </div>
          <h3><a href="mailto:<?php echo $product->getResource() ?>"><?php echo $product->getTitle() ?></a></h3>
        <?php elseif($product->getType() == ProductPeer::TYPE_URL): ?>
          <div class="prIcon">
            <?php echo link_to(image_tag('/images/ico-'. strtolower($product->getType()) . '.png'), $product->getResource(), array('target' => 'blank')) ?>
          </div>
          <h3><?php echo link_to($product->getTitle(), $product->getResource(), array('target' => 'blank')) ?></h3>
        <?php endif; ?>
      <div class="prDescrip"><?php echo $product->getDescrip() ?></div>
    </div>
  <?php endforeach; ?>
</div>