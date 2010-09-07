        <div id="mininav">
            <ul>
                <li><a href="<?php echo url_for('facultad/index')?>" >Facultades</a></li>
                <li><a href="<?php echo url_for('docente/index')?>" class="active">Docentes</a></li>
                <li><a href="<?php echo url_for('evaluacion/index')?>">Evaluacion</a></li>
                <li><a href="<?php echo url_for('materia/index')?>">Materia</a></li>
                <li><a href="<?php echo url_for('formaContacto/index')?>">Forma de contacto</a></li>
            </ul>
        </div>
<h1>Docentes List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($docentes as $docente): ?>
    <tr>
      <td><a href="<?php echo url_for('docente/show?id='.$docente->getId()) ?>"><?php echo $docente->getId() ?></a></td>
      <td><?php echo $docente->getNombre() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('docente/new') ?>">New</a>
