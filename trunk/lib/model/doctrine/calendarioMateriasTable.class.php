<?php

class calendarioMateriasTable extends Doctrine_Table
{
	public function getAllCalendarioMateriasOfDocente($docenteId){
		$query = Doctrine_Query::create ()
				->select ( 'cm.*' )
				->from ( 'calendarioMaterias cm, preparacion p' )
				->where ( 'cm.preparacion_id = p.id')
				->andWhere('p.docente_id = ?', $docenteId);
		return $query->execute ();
	}

  public function getAllCalendarioMateriasOfPreparacion($idList = array())
  {
		$query = Doctrine_Query::create ()
				->select ( 'cm.*' )
				->from ( 'calendarioMaterias cm' )
				->whereIn ( 'cm.preparacion_id', $idList);
		return $query->execute ();  
  }
}
