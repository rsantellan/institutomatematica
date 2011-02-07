<?php

class alumnoTable extends Doctrine_Table
{
	public function retrieveByName($name, $lastName)
	{
		$lastName = '%'.$lastName.'%';
		$name = '%'.$name.'%';
		$q = Doctrine_Query::create()
			->from('alumno a')
			->where('a.apellido LIKE ?', $lastName)
			->addWhere('a.nombre LIKE ?', $name);
		return $q->execute();
	}
	
  public function retrieveByNameNotInPreparation($name, $lastName, $preparationId)
	{
		$lastName = '%'.$lastName.'%';
		$name = '%'.$name.'%';
		$q = Doctrine_Query::create()
			->select('a.*')
			->from('alumno a')
			->where('a.apellido LIKE ?', $lastName)
			->addWhere('a.nombre LIKE ?', $name)
			->addWhere('a.id NOT IN (SELECT ap.alumno_id FROM alumnoPreparacion as ap WHERE ap.preparacion_id = ?)',$preparationId);
			//->addWhere('ap.preparacion_id = ?',$preparationId);
		return $q->execute();
	}
}
