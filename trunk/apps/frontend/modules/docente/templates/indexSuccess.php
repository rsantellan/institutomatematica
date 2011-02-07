<?php include_partial("global/miniNav");?>
<h1>Docentes List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($docentes as $docente): ?>
    <tr>
      <td><a href="<?php echo url_for('docente/show?id='.$docente->getId()) ?>"><?php echo $docente->getId() ?></a></td>
      <td><?php echo $docente->getNombre() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('docente/new') ?>">New</a>
