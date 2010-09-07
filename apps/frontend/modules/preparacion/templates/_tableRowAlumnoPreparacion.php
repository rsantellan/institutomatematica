<tr id="tr_alumno_<?php echo $alumnoPreparacion->getAlumno()->getId()?>">
	<td><a href="<?php echo url_for('alumno/showSimpleAlumno?id='.$alumnoPreparacion->getAlumno()->getId()) ?>" onclick="return showAlumno(this)"><?php echo $alumnoPreparacion->getAlumno()->getNombre(). ' '. $alumnoPreparacion->getAlumno()->getApellido() ?></a></td>
	<td><?php echo $alumnoPreparacion->getAlumno()->getCelular() ?></td>
	<td><?php echo $alumnoPreparacion->getAlumno()->getTelefono()?></td>
	<td><?php echo $alumnoPreparacion->getFormaContacto()->getNombre() ?></td>
	<td><a href="<?php echo url_for('preparacion/quitarAlumno')?>" onclick="return removeAlumnoFromPreparacion(this, <?php echo $alumnoPreparacion->getAlumno()->getId()?>,<?php echo $alumnoPreparacion->getPreparacion()->getId()?>)">Quitar</a></td>
</tr>
