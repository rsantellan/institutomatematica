<?php

class alumnoPreparacionTable extends Doctrine_Table
{
	function retrieveByAlumnoIdAndPreparacionId($alumnoId, $preparacionId)
	{
		$query = Doctrine_Query::create ()
							->select('ap.*')
							->from('alumnoPreparacion ap')
							->where('ap.alumno_id = ?', $alumnoId)
							->addWhere('ap.preparacion_id = ?',$preparacionId);
		return $query->fetchOne();
	}
}
