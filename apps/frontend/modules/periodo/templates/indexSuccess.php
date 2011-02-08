<?php include_partial("global/miniNav");?>
<?php //use_helper("Date");?>
<h1>Periodos List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Inicio</th>
      <th>Fin</th>
      <th>Nombre</th>
      <th>Activo</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($periodos as $periodo): ?>
    <tr>
      <td><a href="<?php echo url_for('periodo/show?id='.$periodo->getId()) ?>"><?php echo $periodo->getId() ?></a></td>
      <td><?php echo format_date($periodo->getInicio(), 'Y') ?></td>
      <td><?php echo format_date($periodo->getFin(), 'Y')?></td>
      <td><?php echo $periodo->getNombre() ?></td>
      <td><?php echo ($periodo->getActivo())? "Si" : "No"; ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('periodo/new') ?>">New</a>
