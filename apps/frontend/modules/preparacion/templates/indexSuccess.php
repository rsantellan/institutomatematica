<h1>Preparacions List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Materia</th>
      <th>Docente</th>
      <th>Evaluacion</th>
      <th>Periodo</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($preparacions as $preparacion): ?>
    <tr>
      <td><a href="<?php echo url_for('preparacion/show?id='.$preparacion->getId()) ?>"><?php echo $preparacion->getId() ?></a></td>
      <td><?php echo $preparacion->getMateria()->getNombre() ?></td>
      <td><?php echo $preparacion->getDocente()->getNombre()?></td>
      <td><?php echo $preparacion->getEvaluacion()->getNombre() ?></td>
      <td><?php echo $preparacion->getPeriodo() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('preparacion/new') ?>">New</a>
