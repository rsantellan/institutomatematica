<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $forma_contacto->getId() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $forma_contacto->getNombre() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $forma_contacto->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $forma_contacto->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('formaContacto/edit?id='.$forma_contacto->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('formaContacto/index') ?>">List</a>
