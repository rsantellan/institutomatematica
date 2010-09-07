<form action="<?php echo url_for('alumno/addAlumnoAjax')?>" onsubmit="return false" id="form_alumno">
	<ul>
		<li><?php echo $alumnoForm['nombre']->renderLabel();?> <?php echo $alumnoForm['nombre']->render();?><?php echo $alumnoForm['nombre']->renderError();?></li>
		<li><?php echo $alumnoForm['apellido']->renderLabel();?> <?php echo $alumnoForm['apellido']->render();?><?php echo $alumnoForm['apellido']->renderError();?></li>
		<li><?php echo $alumnoForm['telefono']->renderLabel();?> <?php echo $alumnoForm['telefono']->render();?><?php echo $alumnoForm['telefono']->renderError();?></li>
		<li><?php echo $alumnoForm['celular']->renderLabel();?> <?php echo $alumnoForm['celular']->render();?><?php echo $alumnoForm['celular']->renderError();?></li>
		<li><?php echo $alumnoForm['direccion']->renderLabel();?> <?php echo $alumnoForm['direccion']->render();?><?php echo $alumnoForm['direccion']->renderError();?></li>
		<li><?php echo $alumnoForm['email']->renderLabel();?> <?php echo $alumnoForm['email']->render();?><?php echo $alumnoForm['email']->renderError();?></li>
		<li><?php echo $alumnoForm['sexo']->renderLabel();?> <?php echo $alumnoForm['sexo']->render();?><?php echo $alumnoForm['sexo']->renderError();?></li>
		<li><?php echo $alumnoForm->renderHiddenFields()?></li>
	</ul>
</form>
