<tr id="tr_alumno_<?php echo $alumnoPreparacion->getAlumnoId()?>" <?php if(isset($hidden)) echo "style='display:none'"?>>
	<td><a href="<?php echo url_for('alumno/showSimpleAlumno?id='.$alumnoPreparacion->getAlumnoId()) ?>" onclick="return showAlumno(this)"><?php echo $alumnoPreparacion->getAlumno()->getNombre(). ' '. $alumnoPreparacion->getAlumno()->getApellido() ?></a></td>
	<td><?php echo $alumnoPreparacion->getAlumno()->getCelular() ?></td>
	<td><?php echo $alumnoPreparacion->getFormaContacto()->getNombre()?><?php echo ($alumnoPreparacion->getNotaContacto() != "")? "(".$alumnoPreparacion->getNotaContacto().")": "";?></td>
	<td><a href="<?php echo url_for('preparacion/quitarAlumno')?>" onclick="return removeAlumnoFromPreparacion(this, <?php echo $alumnoPreparacion->getAlumnoId()?>,<?php echo $alumnoPreparacion->getPreparacion()->getId()?>)">Quitar</a></td>
  <td>
    <?php $id = $alumnoPreparacion->getAlumnoId()?>
    <?php $url = url_for('preparacion/bringPagosForm');?>
    <?php echo image_tag($alumnoPreparacion->retrievePaymentStatusInColor().'_flag.png', array('id'=>'payment_image_'.$id,'onclick' => 'changePaymentStatus("'.$url.'",'.$id.')'));?>  
  </td>
</tr>
