<form id="alumnos_similares_form">
<h5>Alumnos con nombre parecido encontrado</h5>
<ul>
	<?php foreach($nombresAlumnos as $alumno): ?>
		<?php include_partial('detalleListaAlumnosIgualesForm', array('alumno' => $alumno)) ?>
	<?php endforeach;?>
</ul>
<h5>Alumnos con el mismo celular encontrado</h5>
<ul>
	<?php foreach($celularAlumnos as $alumno): ?>
		<?php include_partial('detalleListaAlumnosIgualesForm', array('alumno' => $alumno)) ?>
	<?php endforeach;?>
</ul>
<h5>Alumnos con el mismo telefono encontrado</h5>
<ul>
	<?php foreach($telefonoAlumnos as $alumno): ?>
		<?php include_partial('detalleListaAlumnosIgualesForm', array('alumno' => $alumno)) ?>
	<?php endforeach;?>
</ul>
<h5>Alumnos con el mismo email encontrado</h5>
<ul>
	<?php foreach($emailAlumnos as $alumno): ?>
		<?php include_partial('detalleListaAlumnosIgualesForm', array('alumno' => $alumno)) ?>
	<?php endforeach;?>
</ul>
</form>
