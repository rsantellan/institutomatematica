<tr id="tr_alumno_contacto_<?php echo $alumnoPreparacion->getAlumno()->getId();?>" <?php if(isset($hidden)) echo "style='display:none'"?>>
  <td><?php echo $alumnoPreparacion->getAlumno()->getNombre(). ' '. $alumnoPreparacion->getAlumno()->getApellido() ?></td>
  <td><?php echo $alumnoPreparacion->getFormaContacto()->getNombre()?><?php echo ($alumnoPreparacion->getNotaContacto() != "")? "(".$alumnoPreparacion->getNotaContacto().")": "";?></td>
</tr>
