<div class='new_preparacion_container'>
<h1>Nueva Preparacion</h1>

  <label>Seleccione una facultad: </label>
  <select id="facultades" onchange="bringSubjects();" urlToGo="<?php echo url_for('preparacion/traerMaterias')?>">
    <option value="0" selected="selected"> - </option>
    <?php foreach($facultades as $facultad):?>
      <option value="<?php echo $facultad->getId() ?>"> <?php echo $facultad->getNombre() ?> </option>
    <?php endforeach;?>
  </select>

<?php //include_partial('form', array('form' => $form)) ?>
<form action="<?php echo url_for('preparacion/saveAjax')?>" onsubmit="return false;" id="new_preparacion" method="POST">
<ul class="no_bullets">
  <li>
        <?php echo $form['materia_id']->renderLabel();?>
        <?php echo $form['materia_id']->render(array('id'=>'materias'));?>
        <?php echo $form['materia_id']->renderError();?>
  </li>
  <li>
        <?php echo $form['md_user_id']->renderLabel();?>
        <?php //echo $form['md_user_id']->render();?>
        <?php echo $form['md_user_id']->renderError();?>
      <select id="md_user_fake_id" onchange="changeMdUserId()" name="preparacion[md_user_id]">
          <option value="<?php echo $sf_user->getMdUserId();?>" ><?php echo $sf_user->getMdPassport()->getMdUser()->__toString();?></option>
          <?php foreach($userOptions as $user): ?>
            <option value="<?php echo $user->getMdUserEnresponsabilidadId();?>"><?php echo $user->getMdUserEnresponsabilidad()->__toString();?></option>
          <?php endforeach;?>
      </select>

  </li>
  <li>
        <?php echo $form['evaluacion_id']->renderLabel();?>
        <?php echo $form['evaluacion_id']->render();?>
        <?php echo $form['evaluacion_id']->renderError();?>
  </li>
  <li>
        <?php echo $form['periodo_id']->renderLabel();?>
        <?php echo $form['periodo_id']->render();?>
        <?php echo $form['periodo_id']->renderError();?>
  </li>
  <li>
        <?php echo $form['inicio']->renderLabel();?>
        <?php echo $form['inicio']->render();?>
        <?php echo $form['inicio']->renderError();?>
  </li>
  <li>
        <?php echo $form['fin']->renderLabel();?>
        <?php echo $form['fin']->render();?>
        <?php echo $form['fin']->renderError();?>
  </li>
  <li>
        <?php echo $form['hora_inicio']->renderLabel();?>
        <?php echo $form['hora_inicio']->render();?>
        <?php echo $form['hora_inicio']->renderError();?>
  </li>
  <li>
        <?php echo $form['hora_fin']->renderLabel();?>
        <?php echo $form['hora_fin']->render();?>
        <?php echo $form['hora_fin']->renderError();?>
  </li>
  <li>
        <?php echo $form['costo_clase']->renderLabel();?>
        <?php echo $form['costo_clase']->render();?>
        <?php echo $form['costo_clase']->renderError();?>
  </li>
  <li>
        <?php echo $form['costo_total']->renderLabel();?>
        <?php echo $form['costo_total']->render();?>
        <?php echo $form['costo_total']->renderError();?>
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
<a href="javascript:void(0)" onclick="$.fancybox.close();"><?php echo image_tag('../mastodontePlugin/images/iconos/delete.png', array('alt'=>'Cerrar'));?></a>
<?php if (!$form->getObject()->isNew()): ?>
  &nbsp;
  <?php echo link_to('Delete', 'preparacion/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
<?php endif; ?>
</div>
