        <div id="mininav">
            <ul>
                <li><a href="<?php echo url_for('facultad/index')?>" >Facultades</a></li>
                <li><a href="<?php echo url_for('docente/index')?>">Docentes</a></li>
                <li><a href="<?php echo url_for('evaluacion/index')?>" >Evaluacion</a></li>
                <li><a href="<?php echo url_for('materia/index')?>" class="active">Materia</a></li>
                <li><a href="<?php echo url_for('formaContacto/index')?>">Forma de contacto</a></li>
            </ul>
        </div>
<h1>Materias List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Facultad</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($materias as $materia): ?>
    <tr>
      <td><a href="<?php echo url_for('materia/show?id='.$materia->getId()) ?>"><?php echo $materia->getId() ?></a></td>
      <td><?php echo $materia->getNombre() ?></td>
      <td><?php echo $materia->getFacultad()->getNombre() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('materia/new') ?>">New</a>
