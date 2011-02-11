<?php use_javascript('manageShowPreparacion.js') ?>
<?php    
  use_helper('mdAsset');
  
  use_plugin_stylesheet('mastodontePlugin', '../js/fancybox/jquery.fancybox-1.3.1.css');
  use_plugin_javascript('mastodontePlugin','fancybox/jquery.fancybox-1.3.1.pack.js','last');
?>
<?php use_plugin_javascript('mastodontePlugin','AjaxLoader.js','last'); ?>
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
<a href="<?php echo url_for('preparacion/index') ?>"><?php echo plugin_image_tag('mastodontePlugin','iconos/left.png', array('alt'=>'Lista', 'style'=> "border: 0px !important;"));?></a>

<input type="hidden" id="preparacion_id" value="<?php echo $preparacion->getId()?>"/>

  <table class="preparacion_basic_info_table">
    <tbody>
      <tr>
        <th>Materia:</th>
        <td><?php echo $preparacion->getMateria()->getNombre() ?><a href="<?php echo url_for('preparacion/edit?id='.$preparacion->getId()) ?>"><?php echo plugin_image_tag('mastodontePlugin','iconos/edit.png', array('alt'=>'Editar'));?></a></td>
      </tr>
      <tr>
        <th>Docente:</th>
        <td><?php echo $preparacion->getMdUser()->getEmail() ?></td>
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

<table id="tabla_main_alumno_preparacion_telefonos" class="simple_table simple_table_with_borders" style="display: none">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Telefono</th>
    </tr>
  </thead>
  <tbody id="tabla_alumno_preparacion_telefono">
  <?php foreach($preparacion->getAlumnoPreparacion() as $alumnoPreparacion): ?>
    <?php include_partial('preparacion/tableRowAlumnoPreparacionTelefono', array('alumnoPreparacion'=>$alumnoPreparacion)); ?>
  <?php endforeach; ?>
  </tbody>
</table>

<table id="tabla_main_alumno_preparacion_emails" class="simple_table simple_table_with_borders" style="display: none;">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Email</th>
    </tr>
  </thead>
  <tbody id="tabla_alumno_preparacion_email">
  <?php foreach($preparacion->getAlumnoPreparacion() as $alumnoPreparacion): ?>
    <?php include_partial('preparacion/tableRowAlumnoPreparacionEmail', array('alumnoPreparacion'=>$alumnoPreparacion)); ?>
  <?php endforeach; ?>
  </tbody>
</table>

<table id="tabla_main_alumno_preparacion_contacto" class="simple_table simple_table_with_borders" style="display: none;">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Forma de contacto</th>
    </tr>
  </thead>
  <tbody id="tabla_alumno_preparacion_contacto">
  <?php foreach($preparacion->getAlumnoPreparacion() as $alumnoPreparacion): ?>
    <?php include_partial('preparacion/tableRowAlumnoPreparacionContacto', array('alumnoPreparacion'=>$alumnoPreparacion)); ?>
  <?php endforeach; ?>
  </tbody>
</table>

<p class="show_preparacion_mostrar_title">

    <a id="link_mostrar_tabla_telefonos" title="Telefono del grupo" href="#tabla_main_alumno_preparacion_telefonos">Telefonos del grupo</a>,
    <a id="link_mostrar_tabla_email" title="Emails del grupo" href="#tabla_main_alumno_preparacion_emails">Emails del grupo</a>
    <a id="link_mostrar_tabla_contactos" title="Emails del grupo" href="#tabla_main_alumno_preparacion_contacto">Forma de contacto del grupo</a>
    
</p>

<table id="tabla_main_alumno_preparacion" class="simple_table" style="width: 100%;">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Celular</th>
      <th>Quitar</th>
      <th>Pagos</th>
    </tr>
  </thead>
  <tbody id="tabla_alumno_preparacion">
  <?php foreach($preparacion->getAlumnoPreparacion() as $alumnoPreparacion): ?>
			<?php include_partial('preparacion/tableRowAlumnoPreparacion', array('alumnoPreparacion'=>$alumnoPreparacion)); ?>
  <?php endforeach; ?>
  </tbody>
</table>
<span class="alumno_search_box">
  <h4>Busque un alumno por nombre, apellido o ingrese uno nuevo</h4>
  <p>
    Nombre:
    <input type='text' id='text_buscar_nombre' />   
    Apellido: 
    <input type='text' id='text_buscar_apellido' /> 
    <input type="button" id='button_buscar_apellido' value='Buscar' urlToGo="<?php echo url_for('alumno/traerAlumnos')?>" /> 
    <br/>
    <input type="button" value="Insertar alumno" onclick="showNewAlumnoDialog('<?php echo url_for("alumno/checkAlumno");?>')"/>
  </p>
  <ul id="alumnos_search_list">
  </ul>  
  <input type="hidden" id="alumno_preparacion_form_url" value="<?php echo url_for('preparacion/getAlumnoPreparacionForm')?>"/>
  <div id="pagos_form_container" title="Pagos del alumno" style="display:none">
  </div>
</span>



