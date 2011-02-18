<?php foreach($listaPeriodos as $periodo):?>
    <h1 style="color:green"><?php echo $periodo->getNombre()?></h1>
    <?php
        $listadoMaterias = preparacion::retrieveAllMateriasOfPeriodo($periodo->getId());
        foreach($listadoMaterias as $materiaId):
            $materia = materia::retrieveMateria($materiaId['id']);
         ?>
        <h4 style="color:blue"><?php echo $materia->getNombre();?></h4>
        <input type='checkbox' onclick="checkAll(this)" value="0" /> <strong>Seleccionar todos</strong>
        <div class="checkbox_container">
         <?php
            foreach(alumnoPreparacion::retrieveAllAlumnosByMateriaAndPeriodo($materiaId['id'], $periodo->getId()) as $alumnoPreparacion):
                include_partial("alumno/alumnoListadoRow", array("alumno" => $alumnoPreparacion->getAlumno()));
            endforeach;
            ?>
        </div>
        <?php
        endforeach;

    ?>
    
    <hr/>
<?php endforeach;?>
    
    <h1 style="color:green">Alumnos que no pertencen a ninguna preparacion</h1>
    <input id="check_sin_preparacion" type='checkbox' onclick="checkAll(this)" value="0"/>  <strong>Seleccionar todos</strong>
    <div class="checkbox_container">
        <?php
        $listadoAlumnos = alumno::retrieveAllAlumnosQueNoTienenPeriodo();
        foreach($listadoAlumnos as $alumno):
            include_partial("alumno/alumnoListadoRow", array("alumno" => $alumno)); 
        endforeach;
    ?>
    </div>
