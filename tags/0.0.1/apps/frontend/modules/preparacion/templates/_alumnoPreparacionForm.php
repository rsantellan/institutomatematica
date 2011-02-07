<form action="<?php echo url_for('preparacion/saveAlumnoEnPreparacion')?>" id="new_alumno_preparacion_form" onsubmit="return false">
<label>Agregar a:</label> 
<br />
<strong><?php echo $alumno->getNombre() . " ". $alumno->getApellido() ?></strong>
<input type="hidden" id="alumno_id" name="alumno_id" value="<?php echo $alumno->getId() ?>"/>
<input type="hidden" id="preparacion_id" name="preparacion_id" value="<?php echo $preparacion->getId() ?>"/>

<br />
<label>Que se contacto por: </label>
<br/>
  <select id="forma_contacto" name="forma_contacto">
    <?php foreach($formaContacto as $contacto):?>
      <option value="<?php echo $contacto->getId() ?>"> <?php echo $contacto->getNombre() ?> </option>
    <?php endforeach;?>
  </select>
</form>
