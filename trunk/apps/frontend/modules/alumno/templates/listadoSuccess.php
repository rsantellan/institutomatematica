<?php foreach($listaPeriodos as $periodo):?>
    <h1><?php echo $periodo->getNombre()?></h1>
    <?php
        $listadoAlumnos = alumno::retrieveAllAlumnosQueEstuvieronEnElperiodo($periodo->getId());
        foreach($listadoAlumnos as $alumno):
            include_partial("alumno/alumnoListadoRow", array("alumno" => $alumno));
        endforeach;
    ?>
<?php endforeach;?>

    <h1>Alumnos que no pertencen a ninguna preparacion</h1>
        <?php
        $listadoAlumnos = alumno::retrieveAllAlumnosQueNoTienenPeriodo();
        foreach($listadoAlumnos as $alumno):
            include_partial("alumno/alumnoListadoRow", array("alumno" => $alumno)); 
        endforeach;
    ?>