<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('preparacion/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<ul class="preparacion_form_ul">
  <li>
        <?php echo $form['materia_id']->renderLabel();?>
        <?php echo $form['materia_id']->render(array('id'=>'materias'));?>
        <?php echo $form['materia_id']->renderError();?>
  </li>
  <li>
        <?php echo $form['md_user_id']->renderLabel();?>
        <?php echo $form['md_user_id']->render();?>
        <?php echo $form['md_user_id']->renderError();?>
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
  <li style="margin-top: 10px;">
        <?php echo $form->renderHiddenFields() ?>
        <?php echo $form->renderGlobalErrors() ?>
        <input type="submit" value="Guardar"/>
  </li>
<?php if (!$form->getObject()->isNew()): ?>
  <li style="margin-top: 20px;">
        <?php echo link_to('Delete', 'preparacion/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Esta seguro de querer eliminar la preparacion?')) ?>
  </li>
<?php endif; ?>  
  <li id="form_errors">
  
  </li>
</ul>
</form>
