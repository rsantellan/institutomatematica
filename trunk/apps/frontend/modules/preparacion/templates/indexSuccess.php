<h1>Preparacions List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Materia</th>
      <th>Docente</th>
      <th>Evaluacion</th>
      <th>Periodo</th>
      <th>Costo por clase</th>
      <th>Costo completo</th>
      <th>Hora de inicio</th>
      <th>Hora de fin</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($pager->getResults() as $preparacion): ?>
    <tr>
      <td><a href="<?php echo url_for('preparacion/show?id='.$preparacion->getId()) ?>"><?php echo $preparacion->getId() ?></a></td>
      <td><?php echo $preparacion->getMateria()->getNombre() ?></td>
      <td><?php echo $preparacion->getMdUser()->getEmail()?></td>
      <td><?php echo $preparacion->getEvaluacion()->getNombre() ?></td>
      <td><?php echo $preparacion->getPeriodo() ?></td>
      <td><?php echo $preparacion->getCostoClase() ?></td>
      <td><?php echo $preparacion->getCostoTotal() ?></td>
      <td><?php echo $preparacion->retrieveStartHourTime() ?></td>
      <td><?php echo $preparacion->retrieveFinishHourTime() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<div class="clear"></div>
  <a href="<?php echo url_for('preparacion/new') ?>">New</a>
<div class="clear"></div>
  <?php foreach($pager->getResults() as $preparacion): ?>
  <div class="preparacion_container">
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
      <strong><?php echo __('preparacion_estado pagos');?></strong><?php echo $preparacion->retrieveGlobalPaymentStatus();?>
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