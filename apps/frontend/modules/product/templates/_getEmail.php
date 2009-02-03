<?php use_helper('Javascript') ?>
<?php use_helper('Form') ?>

<?php echo javascript_tag("showDialog()") ?>

<div id="insertEmail">
  <h3><?php echo __('Descarga de productos') ?></h3>
  <p>Para la descarga de productos se requiere registración.</p>
  <p>Por favor escribe su dirección <strong>e-mail</strong>.</p>
  <form id="emailFrm" onsubmit="if(validateEmail()) new Ajax.Updater('dialogCont', '<?php echo url_for('product/login?id=' .  $id) ?>', {asynchronous:true, evalScripts:true, parameters:Form.serialize(this)}); return false;">
    <?php echo input_tag('email', '', array('onfocus' => 'clearErrors(this)')) ?>
    </ br>
    <?php echo submit_tag('Aceptar') ?>
    <input type="reset" value="<?php echo __('Cancelar') ?>" onclick="closeDialog()" />
  </form>
</div>


