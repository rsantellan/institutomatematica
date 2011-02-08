<tr id="tr_alumno_telefono_<?php echo $alumnoPreparacion->getAlumno()->getId();?>" <?php if(isset($hidden)) echo "style='display:none'"?>>
  <td><?php echo $alumnoPreparacion->getAlumno()->getNombre(). ' '. $alumnoPreparacion->getAlumno()->getApellido() ?></td>
  <td><?php echo $alumnoPreparacion->getAlumno()->getTelefono() ?></td>
</tr>
