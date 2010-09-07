        <div id="mininav">
            <ul>
                <li><a href="<?php echo url_for('facultad/index')?>" >Facultades</a></li>
                <li><a href="<?php echo url_for('docente/index')?>">Docentes</a></li>
                <li><a href="<?php echo url_for('evaluacion/index')?>" class="active">Evaluacion</a></li>
                <li><a href="<?php echo url_for('materia/index')?>">Materia</a></li>
                <li><a href="<?php echo url_for('formaContacto/index')?>">Forma de contacto</a></li>
            </ul>
        </div>
<h1>Evaluacions List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($evaluacions as $evaluacion): ?>
    <tr>
      <td><a href="<?php echo url_for('evaluacion/show?id='.$evaluacion->getId()) ?>"><?php echo $evaluacion->getId() ?></a></td>
      <td><?php echo $evaluacion->getNombre() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('evaluacion/new') ?>">New</a>
