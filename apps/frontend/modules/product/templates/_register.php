<?php use_helper('Javascript') ?>
<?php use_helper('Form') ?>
<?php use_helper('Object') ?>

<?php echo javascript_tag("showDialog()") ?>

<div id="register">
  <h3><?php echo __('Descarga de productos') ?></h3>
  <p>Parece ser la primera vez que usted descarga productos.</p>
  <p>Por favor rellene el siguiente formulario con sus datos.  A continuación empezará su descarga.</p>
  <form id="emailFrm" onsubmit="if(validateRegister()) new Ajax.Updater('register', '<?php echo url_for('product/register?id=' .  $id) ?>', {asynchronous:true, evalScripts:true, parameters:Form.serialize(this)}); return false;">
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
      <?php echo submit_tag('Enviar') ?>
      <input type="reset" value="<?php echo __('Cancelar') ?>" onclick="closeDialog()" />
    </div>
  </form>
</div>


