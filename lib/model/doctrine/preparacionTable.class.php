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
}
