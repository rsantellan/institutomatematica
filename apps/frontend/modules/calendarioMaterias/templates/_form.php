<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('calendarioMaterias/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('calendarioMaterias/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'calendarioMaterias/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['day']->renderLabel() ?></th>
        <td>
          <?php echo $form['day']->renderError() ?>
          <?php echo $form['day'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['hour']->renderLabel() ?></th>
        <td>
          <?php echo $form['hour']->renderError() ?>
          <?php echo $form['hour'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['minutes']->renderLabel() ?></th>
        <td>
          <?php echo $form['minutes']->renderError() ?>
          <?php echo $form['minutes'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['preparacion_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['preparacion_id']->renderError() ?>
          <?php echo $form['preparacion_id'] ?>
        </td>
      </tr>

      <tr>
        <th><?php echo $form['duration']->renderLabel() ?></th>
        <td>
          <?php echo $form['duration']->renderError() ?>
          <?php echo $form['duration'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
