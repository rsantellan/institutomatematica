<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $alumno->getId() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $alumno->getNombre() ?></td>
    </tr>
    <tr>
      <th>Apellido:</th>
      <td><?php echo $alumno->getApellido() ?></td>
    </tr>
    <tr>
      <th>Telefono:</th>
      <td><?php echo $alumno->getTelefono() ?></td>
    </tr>
    <tr>
      <th>Direccion:</th>
      <td><?php echo $alumno->getDireccion() ?></td>
    </tr>
    <tr>
      <th>Email:</th>
      <td><?php echo $alumno->getEmail() ?></td>
    </tr>
    <tr>
      <th>Sexo:</th>
      <td><?php echo $alumno->getSexo() ?></td>
    </tr>

  </tbody>
</table>

<hr />

<a href="<?php echo url_for('alumno/edit?id='.$alumno->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('alumno/index') ?>">List</a>
