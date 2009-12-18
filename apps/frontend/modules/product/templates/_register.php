<?php use_helper('Javascript') ?>
<?php use_helper('Form') ?>
<?php use_helper('Object') ?>

<?php echo javascript_tag("showDialog()") ?>
<script type="text/javascript">submitted=false</script>

<div id="register">
  <h3><?php echo __('Acceso a recursos') ?></h3>
  <p><?php echo __('Parece ser la primera vez que usted accede a recursos.') ?></p>
  <p><?php echo __('Por favor rellene el siguiente formulario con sus datos.  A continuación accederá al recurso solicitado.') ?></p>
  <form id="registerFrm" onsubmit="if(validateRegister()) new Ajax.Updater('register', '<?php echo url_for('product/register?id=' .  $id) ?>', {asynchronous:true, evalScripts:true, parameters:Form.serialize(this)}); return false;">
    <?php echo object_input_hidden_tag($user, 'getEmail') ?>
    <div class="input">
      <label for="name"><?php echo __('Nombre') ?></label>
      <?php echo object_input_tag($user, 'getName', array('onfocus' => 'clearErrors(this)')) ?>
    </div>
    <div class="input">
      <label for="surname1"><?php echo __('Primer apellido') ?></label>
      <?php echo object_input_tag($user, 'getSurname1', array('onfocus' => 'clearErrors(this)')) ?>
    </div>
    <div class="input">
      <label for="surname2"><?php echo __('Segundo apellido') ?></label>
      <?php echo object_input_tag($user, 'getSurname2', array('onfocus' => 'clearErrors(this)')) ?>
    </div>
    <div class="input">
      <label for="institution"><?php echo __('Institución') ?></label>
      <?php echo object_input_tag($user, 'getInstitution', array('onfocus' => 'clearErrors(this)')) ?>
    </div>
    <div class="input">
      <?php echo checkbox_tag('accept_mail', 1, true, array('onfocus' => 'clearErrors(this)')) ?>
      <label for="accept_mail"><?php echo __('Accepto recibir comunicaciones sobre el projecto MESMIS') ?></label>
    </div>
    <div class="btns">
      <?php echo submit_tag(__('Enviar'), 'class="submit"') ?>
      <input type="reset" value="<?php echo __('Cancelar') ?>" onclick="closeDialog()" class="submit"/>
    </div>
  </form>
  <p><?php echo link_to(__('Política de privacidad'), 'static/index?content=privacypolicy') ?></p>
</div>



