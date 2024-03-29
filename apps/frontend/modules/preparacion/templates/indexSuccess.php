<?php    
  use_helper('mdAsset');
  
  use_plugin_stylesheet('mastodontePlugin', '../js/fancybox/jquery.fancybox-1.3.1.css');
  use_plugin_javascript('mastodontePlugin','fancybox/jquery.fancybox-1.3.1.pack.js','last');
?>
<?php use_javascript('managePreparacion.js', 'last') ?>
<div class="periodos_container">
  <?php $index = 0; ?>
  <?php $openDic = false; ?>
  <?php foreach($listaPeriodos as $periodo): ?>
    <a class="periodo_link" href="<?php echo url_for('@preparacion?periodoId='.$periodo->getId());?>" >
      <?php echo $periodo->getNombre();?>
    </a>
      <?php 
        $index++;
       if($index == 3):
          $openDic = true;
      ?>
        <br/>
        <a href="javascript:void(0)" onclick="$('#hidden_links_containers').slideToggle('slow');">Mostrar todos los periodos</a>
        <div id="hidden_links_containers" style="display:none">
      <?php endif;?>    
  <?php endforeach;?>
  <?php 
       if($openDic):
      ?>
        </div>
      <?php endif;?>      
</div>
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
          <a href="<?php echo url_for('@preparacion?page=' . $pager->getPreviousPage().'&periodoId='.$periodoId);?>"><?php echo plugin_image_tag('mastodontePlugin','iconos/prev.png');?></a>
          <?php $objectsCount = count($pager->getLinks()) ?>
          <?php $objectsIndex = 0 ?>
          <?php foreach ($pager->getLinks() as $page): ?>
            <?php if ($page == $pager->getPage()): ?>
                  <a class="current no_image"><?php echo $page ?></a>
            <?php else: ?>
                  <a class="no_image" href="<?php echo url_for('@preparacion?page=' . $page .'&periodoId='.$periodoId) ?>"><?php echo $page ?></a>
            <?php endif; ?>
          <?php endforeach; ?>
          <a href="<?php echo url_for('@preparacion?page=' . $pager->getNextPage().'&periodoId='.$periodoId);?>"><?php echo plugin_image_tag('mastodontePlugin','iconos/next.png');?></a>
      </div>
  <?php endif; ?>
  <hr/>
  <a id="link_agregar_preparacion" class="" href="<?php echo url_for('preparacion/new') ?>">Agregar preparacion</a>
</div>
