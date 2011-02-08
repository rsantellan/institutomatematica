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
    <?php foreach ($preparacions as $preparacion): ?>
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

  <a href="<?php echo url_for('preparacion/new') ?>">New</a>
