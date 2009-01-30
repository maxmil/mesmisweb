<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
  </head>
  <body>
    <div id="language">
      <a href="?culture=en">English</a>
      <a href="?culture=es">Español</a>
    </div>
    <div><?php include_partial('global/mainMenu') ?></div>

    <?php echo $sf_content ?>
  </body>
</html>
