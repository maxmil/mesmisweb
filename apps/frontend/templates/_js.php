<script type="text/javascript">
  //<![CDATA[

  function openMI(){
    <?php if($sf_user->getCulture() == 'en'): ?>
      alert('We are working on an english translation but it is not yet finished. Please try again soon');
      //alert('We have so far only translated one of the four modules that comprise mesmis-interactivo.\n\n\"NEGOTIATED DESIGN OF SUSTAINABLE PRODUCTION SYSTEMS AMONG SOCIAL AGENTS WITH CONFLICTING INTERESTS\". Unfortunately this is not available on line.\n\n For more information please contact agroecologia@gira.org.mx')
      //window.open('http://200.23.34.9/sustentabilidad/');
    <?php else: ?>
      var t = 0;
      var l = 0;
      var w = window.screen.availWidth-10;
      var h = window.screen.availHeight-40;
      var mi = window.open('<?php echo $sf_request->getRelativeUrlRoot() ?>/mesmis-interactivo', 'mi', 'top='+t+',left='+l+',width='+w+',height='+h+',menubar=0,location=0,resizable=1,scrollbars=0,status=0');
      mi.focus();
    <?php endif; ?>
  }

  function closeMI(id){
    window.location = '<?php echo url_for('comment/init') ?>?email=' + id;
  }

  //]]>
</script>