<?php use_javascript('manageShowPreparacion.js') ?>

<div id="dialog-message" title="Información del alumno" style="display: none;">
	<p>
		Info
	</p>
</div>

<div id="new_alumno_form" title="Crear un alumno" style="display: none;">
	<?php include_partial('alumno/listForm', array('alumnoForm' => $alumnoForm) )?>

</div>

<div id="alumno_preparacion_form" title="Agregar alumno">

</div>

<div id="confirmar_sacar_alumno" title="Esta seguro" style="display: none;">
	<p>
		Estas seguro de querer sacar el alumno?
	</p>
</div>

<div id="alumnos_parecidos" title="No sera alguno de estos?" style="display: none">

</div>
<a href="<?php echo url_for('preparacion/edit?id='.$preparacion->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('preparacion/index') ?>">List</a>

<hr/>
<input type="hidden" id="preparacion_id" value="<?php echo $preparacion->getId()?>"/>
<table>
  <tbody>
    <tr>
      <th>Materia:</th>
      <td><?php echo $preparacion->getMateria()->getNombre() ?></td>
    </tr>
    <tr>
      <th>Docente:</th>
      <td><?php echo $preparacion->getDocente()->getNombre() ?></td>
    </tr>
    <tr>
      <th>Evaluacion:</th>
      <td><?php echo $preparacion->getEvaluacion()->getNombre() ?></td>
    </tr>
    <tr>
      <th>Periodo:</th>
      <td><?php echo $preparacion->getPeriodo() ?></td>
    </tr>
  </tbody>
</table>

<hr />
<h4>Alumnos que asisten a la preparacion </h4>
<table id="tabla_main_alumno_preparacion" <?php if(count($preparacion->getAlumnoPreparacion()) == 0) echo "style:none";?>>
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Celular</th>
      <th>Telefono</th>
      <th>Forma de contacto</th>
    </tr>
  </thead>
  <tbody id="tabla_alumno_preparacion">
  <?php foreach($preparacion->getAlumnoPreparacion() as $alumnoPreparacion): ?>
			<?php include_partial('preparacion/tableRowAlumnoPreparacion', array('alumnoPreparacion'=>$alumnoPreparacion)); ?>
  <?php endforeach; ?>
  </tbody>
</table>
<hr />
  <h4>Busque un alumno por nombre, apellido o ingrese uno nuevo</h4>
  <p>
  
  Nombre:
<input type='text' id='text_buscar_nombre' />   
  Apellido: 
<input type='text' id='text_buscar_apellido' /> 
<input type="button" id='button_buscar_apellido' value='Buscar' urlToGo="<?php echo url_for('alumno/traerAlumnos')?>" /> 
<br/>
<input type="button" value="Insertar alumno" onclick="showNewAlumnoDialog()"/>
  </p>
<ul id="alumnos_search_list">
</ul>  
<hr/>

<input type="hidden" id="alumno_preparacion_form_url" value="<?php echo url_for('preparacion/getAlumnoPreparacionForm')?>"/>






