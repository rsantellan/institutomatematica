<?php foreach($listaPeriodos as $periodo):?>
    <h1><?php echo $periodo->getNombre()?></h1>
    <input type='checkbox' onclick="checkAll(this)" value="0"/> Seleccionar todos
    <div class="checkbox_container">
    
    <?php
        $listadoAlumnos = alumno::retrieveAllAlumnosQueEstuvieronEnElperiodo($periodo->getId());
        foreach($listadoAlumnos as $alumno):
            include_partial("alumno/alumnoListadoRow", array("alumno" => $alumno));
        endforeach;
    ?>
    </div>
<?php endforeach;?>

    <h1>Alumnos que no pertencen a ninguna preparacion</h1>
    <input type='checkbox' onclick="checkAll(this)" value="0"/> Seleccionar todos
    <div class="checkbox_container">
        <?php
        $listadoAlumnos = alumno::retrieveAllAlumnosQueNoTienenPeriodo();
        foreach($listadoAlumnos as $alumno):
            include_partial("alumno/alumnoListadoRow", array("alumno" => $alumno)); 
        endforeach;
    ?>
    </div>
