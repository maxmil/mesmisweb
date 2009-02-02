<?php use_helper('Javascript') ?>
<?php use_helper('Form') ?>
<?php use_helper('Object') ?>

<form id="emailFrm" onsubmit="if(validateRegister()) new Ajax.Updater('register', '<?php echo url_for('product/register?id=' .  $id) ?>', {asynchronous:true, evalScripts:true, parameters:Form.serialize(this)}); return false;">
  <?php echo object_input_hidden_tag($user, 'getEmail') ?>
  Para poder descargar contenidos usted tiene que estar registrado en nuestros sistemas. Por favor rellene el siguiente formulario para registrarse. A continuación empezará la descarga solicitada.
  <div>
    <label for="<?php echo __('Nombre') ?>"><?php echo __('Nombre') ?></label>
    <?php echo object_input_tag($user, 'getName', array('onfocus' => 'clearErrors(this)')) ?>
  </div>
  <div>
    <label for="<?php echo __('Primer apellido') ?>"><?php echo __('Primer apellido') ?></label>
    <?php echo object_input_tag($user, 'getSurname1', array('onfocus' => 'clearErrors(this)')) ?>
  </div>
  <div>
    <label for="<?php echo __('Segundo apellido') ?>"><?php echo __('Segundo apellido') ?></label>
    <?php echo object_input_tag($user, 'getSurname2', array('onfocus' => 'clearErrors(this)')) ?>
  </div>
  <div>
    <label for="<?php echo __('Institución') ?>"><?php echo __('Institución') ?></label>
    <?php echo object_input_tag($user, 'getInstitution', array('onfocus' => 'clearErrors(this)')) ?>
  </div>
  <?php echo submit_tag('Enviar') ?>
</form>

