<?php use_helper('Javascript') ?>
<?php use_helper('Form') ?>

<form id="emailFrm" onsubmit="if(validateEmail()) new Ajax.Updater('register', '<?php echo url_for('product/login?id=' .  $id) ?>', {asynchronous:true, evalScripts:true, parameters:Form.serialize(this)}); return false;">
  <label for="item"><?php echo __('Por favor inserte su e-mail') ?></label>
  <?php echo input_tag('email', '', array('onfocus' => 'clearErrors(this)')) ?>
  <?php echo submit_tag('Enviar') ?>
</form>


