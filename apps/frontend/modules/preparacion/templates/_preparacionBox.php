<div class="preparaciones_small_container" <?php if(isset($hidden)) echo 'style="display:none"';?> >
    <div class="simple_rounded">
        <a href="<?php echo url_for('preparacion/show?id='.$preparacion->getId()) ?>"><?php echo $preparacion->getMateria()->getNombre() ?></a>
        <div class="clear"></div>
        <strong><?php echo __('preparacion_profesor');?></strong><br/><?php echo $preparacion->getMdUser()->getEmail()?>
        <div class="clear"></div>
        <strong><?php echo __('preparacion_evaluacion');?></strong><?php echo $preparacion->getEvaluacion()->getNombre() ?>
        <div class="clear"></div>
        <strong><?php echo __('preparacion_periodo');?></strong><?php echo $preparacion->getPeriodo() ?>
        <div class="clear"></div>
        <strong><?php echo __('preparacion_horario');?></strong><?php echo $preparacion->retrieveStartHourTime() ?> - <?php echo $preparacion->retrieveFinishHourTime() ?>
        <div class="clear"></div>
        <strong><?php echo __('preparacion_estado pagos');?></strong>
          <a class="link_hidden_payment" href="#hidden_payment_numbers_<?php echo $preparacion->getId()?>">
          <?php echo image_tag($preparacion->retrieveGlobalPaymentStatus().'_ball.png');?>
          </a>
    </div>
    <div style="display:none">
        <div id="hidden_payment_numbers_<?php echo $preparacion->getId()?>" class="hidden_payment_fancy">
          <?php $estados = $preparacion->retrivePaymentsNumbers();?>
          Gente que pago parcialmente: <strong><?php echo $estados['pago'];?></strong>
          <div class="clear"></div>
          Gente que pago totalmente: <strong><?php echo $estados['pagoCompleto'];?></strong>
          <div class="clear"></div>
          Gente que no pago: <strong><?php echo $estados['noPagos'];?></strong>
          <div class="clear"></div>
        </div>
    </div>
  </div>
