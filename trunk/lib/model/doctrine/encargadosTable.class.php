<?php

class encargadosTable extends Doctrine_Table
{
    public function retrieveAllMyEncargados($mdUserId)
    {
        return $this->createQuery("encargados")
                ->addWhere("encargados.md_user_responsable_id = ?", $mdUserId)
                ->execute();
    }

    public function retrieveOne($mdUserIdResponsable, $mdUserIdEnresponsabilidad)
    {
        return $this->createQuery("encargados")
                ->addWhere("encargados.md_user_responsable_id = ?", $mdUserIdResponsable)
                ->addWhere("encargados.md_user_enresponsabilidad_id = ?", $mdUserIdEnresponsabilidad)
                ->fetchOne();
    }
}
