<table id="calendar_table" class="one-column-emphasis">
    <colgroup>
    <col class="oce-first" />
  </colgroup>
	<!-- Table header -->
		<thead>
			<tr>
        <th scope="col">Horarios</th>
        <?php foreach(calendarioMaterias::$days as $key => $day):?>
				<th scope="col" id="<?php echo $key?>"><?php echo $day ?></th>
        <?php endforeach; ?>
			</tr>
		</thead>

	<!-- Table footer -->

		<tfoot>
	        <tr>
            <?php foreach(calendarioMaterias::$days as $key => $day):?>
	              <td> - </td>
            <?php endforeach; ?>    
	        </tr>
		</tfoot>

	<!-- Table body -->

		<tbody>
      <?php foreach(calendarioMaterias::$hours as $key => $hour):?>
        <?php foreach(calendarioMaterias::$minutes as $key => $minute):?>
        <tr>
          <td><?php echo $hour.":".$minute?></td>
          <?php foreach(calendarioMaterias::$days as $key => $day):?>
          <td id="<?php echo $day.'_'.$hour.'_'.$minute?>" class="data"></td>
          <?php endforeach; ?>
        </tr>
        <?php endforeach;?>
      <?php endforeach;?>
		</tbody>

</table>

<?php use_helper('JavascriptBase'); ?>

<?php foreach ($calendario_materiass as $calendario_materias): ?>
<?php javascript_tag("
  color('".$calendario_materias->getFormattedTime()."','".$calendario_materias->calculatedFinishTime()."','".$calendario_materias->getPreparacion()->getMateria()->getNombre()."','".$calendario_materias->getPreparacion()->getDocente()->getNombre()."');
");?>
<?php endforeach; ?>
<?php javascript_tag("
  removeEmptyRows();
");?>
