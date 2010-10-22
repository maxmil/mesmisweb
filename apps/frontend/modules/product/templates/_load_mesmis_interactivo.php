<?php

    if($culture == "en"){
        $title = "MESMIS INTERACTIVE";
        $targetNamesStr = "SHARED GRAPHICS (141Kb);APPLICATION LOADED (493Kb)";
        $culture = "en";
        $loadLangStr = "LOADING TEXTS...";
    }else{
        $title = "MESMIS INTERACTIVO";
        $targetNamesStr = "GRAFICOS COMPARTIDOS (141Kb);DE APLICACION CARGADO (493Kb)";
        $culture = "es";
        $loadLangStr = "CARGANDO TEXTOS...";
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title><?php echo $title ?></title>
  <link rel="shortcut icon" href="favicon.ico">
  <script type="text/javascript" src="../js/swfobject.js"></script>
  <style type="text/css">

    html {
      height: 100%;
      overflow: hidden;
    }

    #flashcontent {
      height: 100%;
    }

    body {
      height: 100%;
      margin: 0;
      padding: 0;
      background-color: #060;
    }

  </style>

  <script type="text/javascript">
    // <![CDATA[

    var flashvars = {
      targetURLStr: 'mesmisLibrary.swf;mesmis_interactivo.swf',
      targetNamesStr: '<?php echo $targetNamesStr ?>',
      lastURLParamsStr: 'messagesPath:intro/xml/messages_intro_<?php echo $culture ?>.xml;loadLangString:<?php echo $loadLangStr ?>',
      locale: '<?php echo $culture ?>'
    };
    var params = {
        allowFullScreen: true
    }
    swfobject.embedSWF('preloader.swf', 'flashcontent', '100%', '100%', '9', 'expressInstall.swf', flashvars, params);

    function closeApp() {
        top.close();
    }

    function openHomePage() {
        var w = window.open('<?php echo $sf_request->getRelativeUrlRoot() ?>/?culture=<?php echo $culture ?>', '_blank');
        w.focus();
    }

    // ]]>
  </script>

</head>
<body>
  <div id="flashcontent">
    <strong>La versi&oacute;n instalado de Flash Player no es adecuado. Puede actualizarlo <a href="http://www.macromedia.com/go/getflashplayer" target="blank">aqu&iacute</a>.</strong>
  </div>
</body>
</html>
