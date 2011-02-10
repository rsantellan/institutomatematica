<?php    
  use_helper('mdAsset');
  
  use_plugin_stylesheet('mastodontePlugin', '../js/fancybox/jquery.fancybox-1.3.1.css');
  use_plugin_javascript('mastodontePlugin','fancybox/jquery.fancybox-1.3.1.pack.js','last');
?>
<?php use_javascript('managePreparacion.js', 'last') ?>
<h1>Preparacions List</h1>
<div class="clear"></div>
  
<div class="clear"></div>
  <?php foreach($pager->getResults() as $preparacion): ?>
  <div class="simple_rounded">
      <a href="<?php echo url_for('preparacion/show?id='.$preparacion->getId()) ?>"><?php echo $preparacion->getMateria()->getNombre() ?></a>
      <div class="clear"></div>
      <strong><?php echo __('preparacion_profesor');?></strong><br/><?php echo $preparacion->getMdUser()->getEmail()?>
      <div class="clear"></div>
      <strong><?php echo __('preparacion_evaluacion');?></strong><?php echo $preparacion->getEvaluacion()->getNombre() ?>
      <div class="clear"></div>
      <strong><?php echo __('preparacion_periodo');?></strong><?php echo $preparacion->getPeriodo() ?>
      <div class="clear"></div>
      <strong><?php echo __('preparacion_horario');?></strong><?php echo $preparacion->retrieveStartHourTime() ?> - <?php echo $preparacion->retrieveFinishHourTime() ?>
      <div class="clear"></div>
      <strong><?php echo __('preparacion_estado pagos');?></strong>
        <?php echo image_tag($preparacion->retrieveGlobalPaymentStatus().'_ball.png');?>
  </div>
  <?php endforeach; ?>
<div class="clear"></div>
<?php if ($pager->haveToPaginate()): ?>
   <div id="md_pager">
        <?php echo link_to('<', 'preparacion/index?page=' . $pager->getPreviousPage()) ?>
        <?php $objectsCount = count($pager->getLinks()) ?>
        <?php $objectsIndex = 0 ?>
        <?php foreach ($pager->getLinks() as $page): ?>
        <?php if ($page == $pager->getPage()): ?>
                    <a class="current"><?php echo $page ?></a>
        <?php else: ?>
                        <a href="<?php echo url_for('preparacion/index?page=' . $page) ?>"><?php echo $page ?></a>
        <?php endif; ?>
        <?php
            if ($objectsIndex < $objectsCount - 1) {
                echo " | ";
                $objectsIndex++;
            }
        ?>
        <?php endforeach; ?>
        <?php echo link_to('>', 'preparacion/index?page=' . $pager->getNextPage()) ?>
    </div>
<?php endif; ?>

<a id="link_agregar_preparacion" class="" href="<?php echo url_for('preparacion/new') ?>">Agregar preparacion</a>
