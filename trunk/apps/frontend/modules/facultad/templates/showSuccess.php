<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $facultad->getId() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $facultad->getNombre() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $facultad->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $facultad->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('facultad/edit?id='.$facultad->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('facultad/index') ?>">List</a>
