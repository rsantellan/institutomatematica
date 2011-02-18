<?php

class preparacionTable extends Doctrine_Table
{
    public function retrieveAllPreparacionesByDate($isQuery = false, $mdUserId = null)
    {
        $query = $this->createQuery("prep");
        $query->orderBy("prep.created_at DESC");
        if($isQuery) return $query;
        return $query->execute();
    }
    
    public function addFilterByPeriodo($query, $periodoId)
    {
      if(is_null($query))
      {
        throw new Exception("Query must not be null", 159);
      }
      if ($query->getType() == Doctrine_Query_Abstract::SELECT)
        $query->select($query->getRootAlias() . '.*');
        
      $query->addWhere($query->getRootAlias() .".periodo_id = ?", $periodoId);
      
      return $query;  
    }
    
    public function addFilterByMdUsers($query, $mdUserIdList)
    {
      if(is_null($query))
      {
        throw new Exception("Query must not be null", 159);
      }
      if ($query->getType() == Doctrine_Query_Abstract::SELECT)
        $query->select($query->getRootAlias() . '.*');
      $query->whereIn($query->getRootAlias() .".md_user_id", $mdUserIdList);  
      //$query->addWhere($query->getRootAlias() .".periodo_id = ?", $periodoId);
      
      return $query;        
    }

  public function retrieveAllMateriasFromPeriodo($periodoId)
  {
        try
        {
            $sql = "select distinct(materia_id) as id
                    FROM preparacion WHERE periodo_id = :periodoId";

            $db = Doctrine_Manager::getInstance()->getConnection('doctrine')->getDbh();
            $st = $db->prepare($sql);
            $st->setFetchMode(Doctrine_Core::FETCH_ASSOC);
            $st->execute(array(":periodoId" => $periodoId));
            $result = $st->fetchAll();
            return $result;
        }
        catch(Exception $e)
        {
            throw new Exception("mdContentRelationTable::retrieveIfObjectsHasRelations - " . $e->getMessage(), $e->getCode());
        }
  }
}
