<h1>Edit Preparacion</h1>

<?php include_partial('form', array('form' => $form)) ?>

<script type="text/javascript">

$(document).ready(function(){
  $(".preparacion_form_ul li input:submit").button();
  $(".preparacion_form_ul li a").button();
});

</script>
