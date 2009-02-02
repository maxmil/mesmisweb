<?php use_helper('Javascript') ?>
<?php use_helper('Form') ?>

<?php echo form_remote_tag(array(
    'update'  => 'register',
    'url'     => 'product/login?id=' .  $id,
    'script'  => 'true'
)) ?>
  <label for="item"><?php echo __('Por favor inserte su e-mail') ?></label>
  <?php echo input_tag('email') ?>
  <?php echo submit_tag('Enviar') ?>
</form>
