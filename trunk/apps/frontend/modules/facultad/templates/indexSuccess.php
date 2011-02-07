<?php include_partial("global/miniNav");?>
<h1>Facultads List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($facultads as $facultad): ?>
    <tr>
      <td><a href="<?php echo url_for('facultad/show?id='.$facultad->getId()) ?>"><?php echo $facultad->getId() ?></a></td>
      <td><?php echo $facultad->getNombre() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('facultad/new') ?>">New</a>
