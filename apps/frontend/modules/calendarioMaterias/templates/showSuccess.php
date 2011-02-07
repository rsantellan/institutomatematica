<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $calendario_materias->getId() ?></td>
    </tr>
    <tr>
      <th>Day:</th>
      <td><?php echo $calendario_materias->getDay() ?></td>
    </tr>
    <tr>
      <th>Hour:</th>
      <td><?php echo $calendario_materias->getHour() ?></td>
    </tr>
    <tr>
      <th>Minutes:</th>
      <td><?php echo $calendario_materias->getMinutes() ?></td>
    </tr>
    <tr>
      <th>Docente:</th>
      <td><?php echo $calendario_materias->getDocenteId() ?></td>
    </tr>
    <tr>
      <th>Materia:</th>
      <td><?php echo $calendario_materias->getMateriaId() ?></td>
    </tr>
    <tr>
      <th>Duration:</th>
      <td><?php echo $calendario_materias->getDuration() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $calendario_materias->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $calendario_materias->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('calendarioMaterias/edit?id='.$calendario_materias->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('calendarioMaterias/index') ?>">List</a>
