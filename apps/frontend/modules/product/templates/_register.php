<?php use_helper('Javascript') ?>
<?php use_helper('Form') ?>
<?php use_helper('Object') ?>

<?php echo form_remote_tag(array(
    'update'  => 'register',
    'url'     => 'product/register?id=' . $id,
    'script'  => 'true'
)) ?>
  <?php echo object_input_hidden_tag($user, 'getEmail') ?>
  Para poder descargar contenidos usted tiene que estar registrado en nuestros sistemas. Por favor rellene el siguiente formulario para registrarse. A continuación empezará la descarga solicitada.
  <div>
    <label for="<?php echo __('Nombre') ?>"><?php echo __('Nombre') ?></label>
    <?php echo object_input_tag($user, 'getName') ?>
  </div>
  <div>
    <label for="<?php echo __('Primer apellido') ?>"><?php echo __('Primer apellido') ?></label>
    <?php echo object_input_tag($user, 'getSurname1') ?>
  </div>
  <div>
    <label for="<?php echo __('Segundo apellido') ?>"><?php echo __('Segundo apellido') ?></label>
    <?php echo object_input_tag($user, 'getSurname2') ?>
  </div>
  <div>
    <label for="<?php echo __('Institución') ?>"><?php echo __('Institución') ?></label>
    <?php echo object_input_tag($user, 'getInstitution') ?>
  </div>
  <?php echo submit_tag('Enviar') ?>
</form>

