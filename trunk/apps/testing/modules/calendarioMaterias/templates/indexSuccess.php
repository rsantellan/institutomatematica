<?php use_javascript('jquery.simpletip-1.3.1.pack.js');?>
<?php use_javascript('manageCalendario.js');?>
<h1>Calendario materiass List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Day</th>
      <th>Desde</th>
      <th>Hasta</th>
      <th>Docente</th>
      <th>Materia</th>
      <th>Periodo</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($calendario_materiass as $calendario_materias): ?>
    <tr>
      <td><a href="<?php echo url_for('calendarioMaterias/show?id='.$calendario_materias->getId()) ?>"><?php echo $calendario_materias->getId() ?></a></td>
      <td><?php echo $calendario_materias->getDay() ?></td>
      <td><?php echo $calendario_materias->getFormattedTime() ?></td>
      <td> <?php echo $calendario_materias->calculatedFinishTime()?> </td>
      <td><?php echo $calendario_materias->getPreparacion()->getDocente()->getNombre() ?></td>
      <td><?php echo $calendario_materias->getPreparacion()->calculatePeriodo() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('calendarioMaterias/new') ?>">New</a>
  
  <hr/>
    <h2>Buscar por docente y fechas</h2>
    <form id="form_filters" action="<?php echo url_for('calendarioMaterias/ejecutarFiltro');?>" onsubmit="return executeFilterByAjax();">
    <?php echo $myFilter['docente_id']->renderRow(); ?>
    <br/>
    <?php echo $myFilter['periodo']->render(); ?>
    <br/>
    <?php echo $myFilter->renderHiddenFields();?>
    <input type="submit" value="buscar" />
    </form>
  <hr/>


<div id="table_data_body"></div> 
<?php //include_partial('showCalendar', array('calendario_materiass' => $calendario_materiass)); ?>
