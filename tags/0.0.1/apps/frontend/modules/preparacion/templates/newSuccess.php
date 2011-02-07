<?php use_javascript('managePreparacion.js') ?>
<h1>New Preparacion</h1>

  <label>Seleccione una facultad: </label>
  <select id="facultades" onchange="bringSubjects();" urlToGo="<?php echo url_for('preparacion/traerMaterias')?>">
    <option value="0" selected="selected"> - </option>
    <?php foreach($facultades as $facultad):?>
      <option value="<?php echo $facultad->getId() ?>"> <?php echo $facultad->getNombre() ?> </option>
    <?php endforeach;?>
  </select>

<?php //include_partial('form', array('form' => $form)) ?>
<form action="<?php echo url_for('preparacion/saveAjax')?>" onsubmit="return false;" id="new_preparacion" method="POST">
<ul>
  <li>
        <?php echo $form['materia_id']->renderLabel();?>
        <?php echo $form['materia_id']->render(array('id'=>'materias'));?>
        <?php echo $form['materia_id']->renderError();?>
  </li>
  <li>
        <?php echo $form['docente_id']->renderLabel();?>
        <?php echo $form['docente_id']->render();?>
        <?php echo $form['materia_id']->renderError();?>    
  </li>
  <li>
        <?php echo $form['evaluacion_id']->renderLabel();?>
        <?php echo $form['evaluacion_id']->render();?>
        <?php echo $form['materia_id']->renderError();?>
  </li>
  <li>
        <?php echo $form['periodo']->renderLabel();?>
        <?php echo $form['periodo']->render();?>
        <?php echo $form['materia_id']->renderError();?>
  </li>
  <li>
        <?php echo $form->renderHiddenFields() ?>
        <?php echo $form->renderGlobalErrors() ?>
        <input type="submit" value="Guardar" onclick="sendFormData()"/>
  </li>
  <li id="form_errors">
  
  </li>
</ul>
</form>

<a href="<?php echo url_for('preparacion/index') ?>">Back to list</a>
<?php if (!$form->getObject()->isNew()): ?>
  &nbsp;
  <?php echo link_to('Delete', 'preparacion/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
<?php endif; ?>
