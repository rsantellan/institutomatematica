        <div id="mininav">
            <ul>
                <li><a href="<?php echo url_for('facultad/index')?>" class="active">Facultades</a></li>
                <li><a href="<?php echo url_for('docente/index')?>">Docentes</a></li>
                <li><a href="<?php echo url_for('evaluacion/index')?>">Evaluacion</a></li>
                <li><a href="<?php echo url_for('materia/index')?>">Materia</a></li>
                <li><a href="<?php echo url_for('formaContacto/index')?>">Forma de contacto</a></li>
            </ul>
        </div>
<h1>Facultads List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($facultads as $facultad): ?>
    <tr>
      <td><a href="<?php echo url_for('facultad/show?id='.$facultad->getId()) ?>"><?php echo $facultad->getId() ?></a></td>
      <td><?php echo $facultad->getNombre() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('facultad/new') ?>">New</a>
