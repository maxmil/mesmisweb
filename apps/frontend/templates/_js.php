<script type="text/javascript">
  //<![CDATA[

  function openMI(){
      var t = 0;
      var l = 0;
      var w = window.screen.availWidth-10;
      var h = window.screen.availHeight-40;
      <?php if($sf_user->getCulture() == 'en'): ?>
        var mi = window.open('<?php echo $sf_request->getRelativeUrlRoot() ?>/mesmis-interactive', 'mi', 'top='+t+',left='+l+',width='+w+',height='+h+',menubar=0,location=0,resizable=1,scrollbars=0,status=0');
      <?php else: ?>
        var mi = window.open('<?php echo $sf_request->getRelativeUrlRoot() ?>/mesmis-interactivo', 'mi', 'top='+t+',left='+l+',width='+w+',height='+h+',menubar=0,location=0,resizable=1,scrollbars=0,status=0');
      <?php endif; ?>
      mi.focus();
  }

  function closeMI(id){
    window.location = '<?php echo url_for('comment/init') ?>?email=' + id;
  }

  //]]>
</script>