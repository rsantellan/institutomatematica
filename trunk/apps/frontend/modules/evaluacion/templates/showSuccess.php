<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $evaluacion->getId() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $evaluacion->getNombre() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $evaluacion->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $evaluacion->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('evaluacion/edit?id='.$evaluacion->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('evaluacion/index') ?>">List</a>
