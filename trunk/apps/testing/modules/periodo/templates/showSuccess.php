<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $periodo->getId() ?></td>
    </tr>
    <tr>
      <th>Inicio:</th>
      <td><?php echo $periodo->getInicio() ?></td>
    </tr>
    <tr>
      <th>Fin:</th>
      <td><?php echo $periodo->getFin() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $periodo->getNombre() ?></td>
    </tr>
    <tr>
      <th>Activo:</th>
      <td><?php echo $periodo->getActivo() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $periodo->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $periodo->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('periodo/edit?id='.$periodo->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('periodo/index') ?>">List</a>
