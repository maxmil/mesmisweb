<?php use_helper('Form') ?>

<?php decorate_with('layout_sidebar') ?>

<div id="comment">
  <h1><?php echo __('Opinar') ?></h1>
  <p><?php echo __('Gracias por haber probado Mesmis Interactivo, esperamos que le haya gustado.') ?></p>
	<p><?php echo __('Para poder seguir mejorandolo te agradecer&iacute;amos sus comentarios.') ?></p>
  <form id="commentFrm" action="<?php echo url_for('comment/save') ?>">
    <?php echo input_hidden_tag('email', $email) ?>
    <?php echo textarea_tag('comment') ?>
    <?php echo submit_tag(__('Enviar'), 'class="submit"') ?>
  </form>
</div>
