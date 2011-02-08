<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('preparacion/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>

  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          &nbsp;<a href="<?php echo url_for('preparacion/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'preparacion/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <tr>
        <th><?php ////echo $form['materia_id']->renderLabel();?></th>
        <td><?php //echo $form['materia_id']->render(array('id'=>'materias'));?></td>
        <td><?php //echo $form['materia_id']->renderError();?></td>
      </tr>
      <tr>
        <?php //echo $form['md_user_id']->renderLabel();?>
        <?php //echo $form['md_user_id']->render();?>
        <?php //echo $form['md_user_id']->renderError();?>
      </tr>
      <tr>
        <?php //echo $form['evaluacion_id']->renderLabel();?>
        <?php //echo $form['evaluacion_id']->render();?>
        <?php //echo $form['evaluacion_id']->renderError();?>
      </tr>
      <tr>
        <?php //echo $form['periodo_id']->renderLabel();?>
        <?php //echo $form['periodo_id']->render();?>
        <?php //echo $form['periodo_id']->renderError();?>
      </tr>
      <tr>
        <?php //echo $form['inicio']->renderLabel();?>
        <?php //echo $form['inicio']->render();?>
        <?php //echo $form['inicio']->renderError();?>
      </tr>
      <tr>
        <?php //echo $form['fin']->renderLabel();?>
        <?php //echo $form['fin']->render();?>
        <?php //echo $form['fin']->renderError();?>
      </tr>
      <tr>
        <?php //echo $form['hora_inicio']->renderLabel();?>
        <?php //echo $form['hora_inicio']->render();?>
        <?php //echo $form['hora_inicio']->renderError();?>
      </tr>
      <tr>
        <?php //echo $form['hora_fin']->renderLabel();?>
        <?php //echo $form['hora_fin']->render();?>
        <?php //echo $form['hora_fin']->renderError();?>
      </tr>
      <tr>
        <?php //echo $form['costo_clase']->renderLabel();?>
        <?php //echo $form['costo_clase']->render();?>
        <?php //echo $form['costo_clase']->renderError();?>
      </tr>
      <tr>
        <?php //echo $form['costo_total']->renderLabel();?>
        <?php //echo $form['costo_total']->render();?>
        <?php //echo $form['costo_total']->renderError();?>
      </tr>
      <tr>
        <td><?php //echo $form->renderHiddenFields() ?> </td>
        <td><?php //echo $form->renderGlobalErrors() ?> </td>
      </tr>
      <?php //echo $form ?>
    </tbody>
  </table>
</form>

<form action="<?php echo url_for('preparacion/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<ul>
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
  <li>
        <?php echo $form->renderHiddenFields() ?>
        <?php echo $form->renderGlobalErrors() ?>
        <input type="submit" value="Guardar"/>
  </li>
  <li id="form_errors">
  
  </li>
</ul>
</form>
