<?php

class alumnoPreparacionTable extends Doctrine_Table {

    function retrieveByAlumnoIdAndPreparacionId($alumnoId, $preparacionId) {
        $query = Doctrine_Query::create ()
                        ->select('ap.*')
                        ->from('alumnoPreparacion ap')
                        ->where('ap.alumno_id = ?', $alumnoId)
                        ->addWhere('ap.preparacion_id = ?', $preparacionId);
        return $query->fetchOne();
    }


  public static function retrieveAllPaymentsOfPreparation($preparacionId)
  {
        try
        {
            $sql = "SELECT `pago` , `pago_completo`
                    FROM `alumno_preparacion`
                    WHERE `preparacion_id` = :idPreparacion";

            $db = Doctrine_Manager::getInstance()->getConnection('doctrine')->getDbh();
            $st = $db->prepare($sql);
            $st->setFetchMode(Doctrine_Core::FETCH_ASSOC);
            $st->execute(array(":idPreparacion" => $preparacionId));
            $result = $st->fetchAll();
            return $result;
        }
        catch(Exception $e)
        {
            throw new Exception("mdContentRelationTable::retrieveIfObjectsHasRelations - " . $e->getMessage(), $e->getCode());
        }    
  }
}
