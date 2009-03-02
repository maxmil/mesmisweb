<div id="sidebarLinks">

  <div id="search" class="sideBarLink">
    <div class="sideBarLinkTitle"><?php echo __('<strong>Buscar</strong>') ?></div>
    <form action="http://www.google.com/cse" id="cse-search-box">
      <input type="hidden" name="cx" value="013468548330344588760:mj8_q-dw8_i" />
      <input type="hidden" name="ie" value="UTF-8" />
      <input id="searchBox" type="text" name="q" size="31" />
      <input id="searchBtn" type="submit" name="sa" value=">" class="submit" />
    </form>
    <script type="text/javascript" src="http://www.google.com/coop/cse/brand?form=cse-search-box&lang=es"></script>
  </div>

  <div class="sideBarLink">
    <div class="sideBarLinkTitle"><?php echo __('<strong>MESMIS</strong> INTERACTIVO') ?></div>
    <a href="" onclick="openMI();return false"><?php echo image_tag('logo-mesmis-interactivo.png') ?></a>
  </div>

  <?php /*
    <div class="sideBarLink">
    <div class="sideBarLinkTitle"><?php echo __('<strong>SUSTENTA</strong>') ?></div>
    <div class="sideBarLinkDescrip">Aquí va la descripción breve de SUSTENTA</div>
    <a class="readMore" href=""><?php echo __('Visitar') ?> <strong>>></strong></a>
  </div>
   */ ?>
</div>