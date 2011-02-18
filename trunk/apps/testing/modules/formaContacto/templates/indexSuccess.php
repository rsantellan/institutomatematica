<?php include_partial("global/miniNav");?>
<h1>Forma contactos List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($forma_contactos as $forma_contacto): ?>
    <tr>
      <td><a href="<?php echo url_for('formaContacto/show?id='.$forma_contacto->getId()) ?>"><?php echo $forma_contacto->getId() ?></a></td>
      <td><?php echo $forma_contacto->getNombre() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('formaContacto/new') ?>">New</a>
