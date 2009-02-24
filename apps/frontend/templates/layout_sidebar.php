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
    <div id="wrapper">
      <?php echo include_partial('global/header') ?>
      <?php echo include_partial('global/menu') ?>
      <div id="content">
        <div id="contentMiddle">
          <div id="sideBarRight"><?php include_partial('global/sidebar_links') ?></div>
          <div id="contentLeft">
            <div id="contentPane"><?php echo $sf_content ?></div>
            <div id="sponsors">
              <span><?php echo __('Copresentado por') ?></span>
              <div id="sponsorLogos"><?php echo image_tag('sponsors.gif') ?></div>
            </div>
          </div>
        </div>
        <div id="contentBottom"></div>
      </div>
    </div>
  </body>
</html>

