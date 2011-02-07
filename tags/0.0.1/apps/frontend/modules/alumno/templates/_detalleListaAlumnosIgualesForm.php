<li>
	<input type='radio' value='<?php echo $alumno->getId() ?>' name="alumnoSeleccionado" name="alumnoSeleccionado_<?php echo $alumno->getId() ?>"/>
	<strong>Nombre:</strong><?php echo $alumno->getNombre()." ".$alumno->getApellido() ?>
	<strong>Email:</strong> <?php echo $alumno->getEmail()?>
	<br />
	<strong>Celular:</strong> <?php echo $alumno->getCelular() ?>   
	<strong>Telefono:</strong> <?php echo $alumno->getTelefono() ?>
</li>
