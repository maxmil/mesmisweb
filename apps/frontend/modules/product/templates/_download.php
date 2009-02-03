<?php use_helper('Javascript') ?>
<?php echo javascript_tag("
    closeDialog();
    document.location = '" . url_for('product/download?id=' . $id) . "';
 ")?>