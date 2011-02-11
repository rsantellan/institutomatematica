<?php    
  use_helper('mdAsset');
  
  use_plugin_stylesheet('mastodontePlugin', '../js/fancybox/jquery.fancybox-1.3.1.css');
  use_plugin_javascript('mastodontePlugin','fancybox/jquery.fancybox-1.3.1.pack.js','last');
?>
<?php use_javascript('managePreparacion.js', 'last') ?>
<h1>Preparacions List</h1>
<div class="clear"></div>
  
<div class="clear"></div>
  <div id="preparaciones_big_container">
  <?php foreach($pager->getResults() as $preparacion): ?>
      <?php include_partial("preparacion/preparacionBox", array("preparacion" => $preparacion));?>
  <?php endforeach; ?>
  </div>
<div class="clear"></div>
<div class="controls">
  <?php if ($pager->haveToPaginate()): ?>
     <div id="md_pager">
          <a href="<?php echo url_for('@preparacion?page=' . $pager->getPreviousPage());?>"><?php echo plugin_image_tag('mastodontePlugin','iconos/prev.png');?></a>
          <?php $objectsCount = count($pager->getLinks()) ?>
          <?php $objectsIndex = 0 ?>
          <?php foreach ($pager->getLinks() as $page): ?>
            <?php if ($page == $pager->getPage()): ?>
                  <a class="current no_image"><?php echo $page ?></a>
            <?php else: ?>
                  <a class="no_image" href="<?php echo url_for('@preparacion?page=' . $page) ?>"><?php echo $page ?></a>
            <?php endif; ?>
          <?php endforeach; ?>
          <a href="<?php echo url_for('@preparacion?page=' . $pager->getNextPage());?>"><?php echo plugin_image_tag('mastodontePlugin','iconos/next.png');?></a>
      </div>
  <?php endif; ?>
  <hr/>
  <a id="link_agregar_preparacion" class="" href="<?php echo url_for('preparacion/new') ?>">Agregar preparacion</a>
</div>
