<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $materia->getId() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $materia->getNombre() ?></td>
    </tr>
    <tr>
      <th>Facultad:</th>
      <td><?php echo $materia->getFacultadId() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $materia->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $materia->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('materia/edit?id='.$materia->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('materia/index') ?>">List</a>
