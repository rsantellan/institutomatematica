<?php

class mdUserRelationsComponents extends sfComponents {

    public function executeBringUserRelations(sfWebRequest $request) {
        $this->userList = Doctrine::getTable("mdUser")->findAll();
        $this->encargados = Doctrine::getTable("encargados")->retrieveAllMyEncargados($this->id);
    }

}
