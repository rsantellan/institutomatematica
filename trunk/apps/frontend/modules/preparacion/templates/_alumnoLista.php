<li id="alumno_li_<?php echo $alumno->getId() ?>">
	<strong>Nombre:</strong><a href='/alumno/showSimpleAlumno?id=<?php echo $alumno->getId() ?>'onclick='return showAlumno(this)'> <?php echo $alumno->getNombre()." ".$alumno->getApellido() ?> </a>
	<strong>Celular:</strong> <?php echo $alumno->getCelular() ?>   
	<strong>Email:</strong> <?php echo $alumno->getEmail()?>
	<input type='button' value='Agregar' onclick ='agregarAlumnoAPreparacion(<?php echo $alumno->getId() ?>)' style="font-size: 14px;" />
</li>
