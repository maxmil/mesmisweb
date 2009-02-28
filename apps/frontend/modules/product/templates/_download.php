<?php use_helper('Javascript') ?>
<?php
  if($product->getType() == ProductPeer::TYPE_MILINK) {
    echo javascript_tag("
      try{closeDialog();}catch(e){};
      document.location = '" . url_for('product/openMI') . "';
    ");
  } else {
    echo javascript_tag("
      try{closeDialog();}catch(e){};
      document.location = '" . url_for('product/download?id=' . $id) . "';
    ");
  }
?>