<form action="<?php echo url_for('preparacion/saveAlumnoEnPreparacion')?>" id="new_alumno_preparacion_form" onsubmit="return false">
<label>Agregar a:</label> 
<br />
<strong><?php echo $alumno->getNombre() . " ". $alumno->getApellido() ?></strong>
<input type="hidden" id="alumno_id" name="alumno_id" value="<?php echo $alumno->getId() ?>"/>
<input type="hidden" id="preparacion_id" name="preparacion_id" value="<?php echo $preparacion->getId() ?>"/>

<br />
<label>Que se contacto por: </label>
<br/>
  <select id="forma_contacto" name="forma_contacto" onchange="showContactNote()"> 
    <?php foreach($formaContacto as $contacto):?>
      <option value="<?php echo $contacto->getId() ?>" hasnote="<?php echo $contacto->getTieneNota() ?>" > <?php echo $contacto->getNombre() ?> </option>
    <?php endforeach;?>
  </select>
  <div id="forma_contacto_note_div" style="display: none">
    <input type="hidden" value="0" id="forma_contacto_has_note" name="forma_contacto_has_note"/>
    
    <label for="forma_contacto_note">Nota:</label>
    <div class="clear"></div>
    <textarea id="forma_contacto_note" name="forma_contacto_note"></textarea>
  </div>
</form>
