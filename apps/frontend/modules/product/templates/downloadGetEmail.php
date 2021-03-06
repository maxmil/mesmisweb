<?php use_helper('Javascript') ?>
<?php use_helper('Form') ?>

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

  function clearErrors(field){
    Element.removeClassName(field, 'error');
    Element.select(field.parentNode, '.error').each(function(e){Element.remove(e)});
  }

  //]]>
</script>

<div id="main">
  <div id="insertEmail">
    <h1><?php echo __('Acceso a recursos') ?></h1>
    <div class="separator"></div>
    <p><?php echo __('Para acceder al recurso <strong>%1%</strong> por favor escribe su dirección <strong>e-mail</strong>.', array('%1%' => $product->getTitle())) ?></p>
    <form id="emailFrm" action="<?php echo url_for('product/login?id=' .  $id) ?>" onsubmit=" return validateEmail()">
      <?php echo input_tag('e-mail', '', array('onfocus' => 'clearErrors(this)')) ?>
      </ br>
      <?php echo submit_tag(__('Aceptar'), 'class="submit"') ?>
      <input type="reset" value="<?php echo __('Cancelar') ?>" onclick="if(window.opener){window.close()}else{history.go(-1)}" class="submit" />
    </form>
    <br />
    <p><?php echo link_to(__('Política de privacidad'), 'static/index?content=privacypolicy') ?></p>
  </div>
</div>




