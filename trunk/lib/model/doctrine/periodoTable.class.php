<?php

class periodoTable extends Doctrine_Table
{
  public function retrieveAllPeriodosByDate($desc = true, $isQuery = false)
  {
        $query = $this->createQuery("prep");
        if($desc)
        {
          $query->orderBy("prep.created_at DESC");
        }
        else
        {
          $query->orderBy("prep.created_at ASC");
        }
        if($isQuery) return $query;
        return $query->execute();
  }
}
