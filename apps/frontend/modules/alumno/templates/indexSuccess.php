<h1>Alumnos List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Telefono</th>
      <th>Celular</th> 
      <th>Direccion</th>
      <th>Email</th>
      <th>Sexo</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($alumnos as $alumno): ?>
    <tr>
      <td><a href="<?php echo url_for('alumno/show?id='.$alumno->getId()) ?>"><?php echo $alumno->getId() ?></a></td>
      <td><?php echo $alumno->getNombre() ?></td>
      <td><?php echo $alumno->getApellido() ?></td>
      <td><?php echo $alumno->getTelefono() ?></td>
      <td><?php echo $alumno->getCelular() ?></td>
      <td><?php echo $alumno->getDireccion() ?></td>
      <td><?php echo $alumno->getEmail() ?></td>
      <td><?php echo $alumno->getSexo() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('alumno/new') ?>">New</a>



