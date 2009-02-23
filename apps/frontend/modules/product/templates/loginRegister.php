<?php use_helper('Javascript') ?>
<?php use_helper('Form') ?>
<?php use_helper('Object') ?>

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

  function validateRegister(){
    var errors;
    if($F('name').trim().length == 0) {
      addError($('name'), '* <?php echo __('Campo obligatorio') ?>');
      errors = true;
    }
    if($F('surname1').trim().length == 0) {
      addError($('surname1'), '* <?php echo __('Campo obligatorio') ?>');
      errors = true;
    }
    if($F('institution').trim().length == 0) {
      addError($('institution'), '* <?php echo __('Campo obligatorio') ?>');
      errors = true;
    }
    return !errors;
  }

  function clearErrors(field){
    Element.removeClassName(field, 'error');
    Element.select(field.parentNode, '.error').each(function(e){Element.remove(e)});
  }

  //]]>
</script>

<div id="products">
  <h1><?php echo __('Descarga de recursos') ?></h1>
  <p>Parece ser la primera vez que usted descarga recursos.</p>
  <p>Por favor rellene el siguiente formulario con sus datos.  A continuación empezará su descarga.</p>
  <form id="registerFrm" action="<?php echo url_for('product/register?id=' .  $id) ?>" onsubmit="return validateRegister();">
    <?php echo object_input_hidden_tag($user, 'getEmail') ?>
    <div class="input">
      <label for="<?php echo __('Nombre') ?>"><?php echo __('Nombre') ?></label>
      <?php echo object_input_tag($user, 'getName', array('onfocus' => 'clearErrors(this)')) ?>
    </div>
    <div class="input">
      <label for="<?php echo __('Primer apellido') ?>"><?php echo __('Primer apellido') ?></label>
      <?php echo object_input_tag($user, 'getSurname1', array('onfocus' => 'clearErrors(this)')) ?>
    </div>
    <div class="input">
      <label for="<?php echo __('Segundo apellido') ?>"><?php echo __('Segundo apellido') ?></label>
      <?php echo object_input_tag($user, 'getSurname2', array('onfocus' => 'clearErrors(this)')) ?>
    </div>
    <div class="input">
      <label for="<?php echo __('Institución') ?>"><?php echo __('Institución') ?></label>
      <?php echo object_input_tag($user, 'getInstitution', array('onfocus' => 'clearErrors(this)')) ?>
    </div>
    <div class="btns">
      <?php echo submit_tag('Enviar', 'class="submit"') ?>
      <input type="reset" value="<?php echo __('Cancelar') ?>" onclick="history.go(-2)" class="submit"/>
    </div>
  </form>
</div>


