<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php echo javascript_include_tag('swfobject') ?>

    <style type="text/css">
      html, body, div, iframe { margin:0; padding:0; height:100%; }
      iframe { display:block; width:100%; border:none; }
      #sfWebDebug{ height: auto; top: 600px; z-index: 1000}
    </style>
  </head>
  <body onload="window.onunload=function(){try{opener.closeMI('<?php echo $sf_user->getAttribute('userEmail') ?>')}catch(e){}}">
  <div>
    <iframe src="<?php echo $sf_request->getRelativeUrlRoot() ?>/mi/mesmis-interactivo" height="100%" width="100%"></iframe>
  </div>
 </body>
</html>
