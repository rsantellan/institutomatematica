<form action="<?php echo url_for("preparacion/proccessPagosForm");?>" method="POST" id='pagos_complete_form' name="<?php echo $form->getName();?>">
<?php echo $form->renderHiddenFields();?>
<?php echo $form['pago']->renderRow();?>
<?php echo $form['pago_completo']->renderRow();?>
<div class="clear"></div>
<br/>
<?php echo $form['monto_pago']->renderRow();?>
<div class="clear"></div>
</form>
