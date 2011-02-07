<?php include_partial("global/miniNav");?>
<h1>Evaluacions List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($evaluacions as $evaluacion): ?>
    <tr>
      <td><a href="<?php echo url_for('evaluacion/show?id='.$evaluacion->getId()) ?>"><?php echo $evaluacion->getId() ?></a></td>
      <td><?php echo $evaluacion->getNombre() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('evaluacion/new') ?>">New</a>
