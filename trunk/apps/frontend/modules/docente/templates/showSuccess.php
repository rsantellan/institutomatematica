<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $docente->getId() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $docente->getNombre() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $docente->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $docente->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('docente/edit?id='.$docente->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('docente/index') ?>">List</a>
