<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php echo include_partial('global/js') ?>
  </head>
  <body>
    <?php echo include_partial('global/dialog') ?>
    <div id="wrapper">
      <?php echo include_partial('global/header') ?>
      <?php echo include_partial('global/menu') ?>
      <div id="content">
        <div id="contentMiddle">
          <?php echo $sf_content ?>
        </div>
        <div id="contentBottom"></div>
      </div>
    </div>
    <?php echo include_partial('global/analytics') ?>
  </body>
</html>
