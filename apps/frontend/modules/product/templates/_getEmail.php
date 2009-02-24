<?php use_helper('Javascript') ?>
<?php use_helper('Form') ?>

<?php echo javascript_tag("showDialog()") ?>

<div id="insertEmail">
  <h3><?php echo __('Acceso a recursos') ?></h3>
  <p><?php echo __('Para acceder al recurso <strong>%1%</strong> por favor escribe su dirección <strong>e-mail</strong>.', array('%1%' => $product->getTitle())) ?></p>
  <form id="emailFrm" onsubmit="if(validateEmail()) new Ajax.Updater('dialogCont', '<?php echo url_for('product/login?id=' .  $id) ?>', {asynchronous:true, evalScripts:true, parameters:Form.serialize(this)}); return false;">
      <?php echo input_tag('e-mail', '', array('onfocus' => 'clearErrors(this)')) ?>
      </ br>
      <?php echo submit_tag(__('Aceptar'), 'class="submit"') ?>
      <input type="reset" value="<?php echo __('Cancelar') ?>" onclick="closeDialog()" class="submit" />
  </form>
</div>


