<?php

class encargadosTable extends Doctrine_Table
{
    public function retrieveAllMyEncargados($mdUserId)
    {
        return $this->createQuery("encargados")
                ->addWhere("encargados.md_user_responsable_id = ?", $mdUserId)
                ->execute();
    }

    public static function retrieveAllMyEncargadosIds($mdUserId)
    {
          try
          {
              $sql = "SELECT `md_user_enresponsabilidad_id`
                      FROM `encargados`
                      WHERE `md_user_responsable_id` = :mdUserId";

              $db = Doctrine_Manager::getInstance()->getConnection('doctrine')->getDbh();
              $st = $db->prepare($sql);
              $st->setFetchMode(Doctrine_Core::FETCH_ASSOC);
              $st->execute(array(":mdUserId" => $mdUserId));
              $result = $st->fetchAll();
              return $result;
          }
          catch(Exception $e)
          {
              throw new Exception("encargadosTable::retrieveAllMyEncargadosIds - " . $e->getMessage(), $e->getCode());
          }    
    }
  
    public function retrieveOne($mdUserIdResponsable, $mdUserIdEnresponsabilidad)
    {
        return $this->createQuery("encargados")
                ->addWhere("encargados.md_user_responsable_id = ?", $mdUserIdResponsable)
                ->addWhere("encargados.md_user_enresponsabilidad_id = ?", $mdUserIdEnresponsabilidad)
                ->fetchOne();
    }
}
