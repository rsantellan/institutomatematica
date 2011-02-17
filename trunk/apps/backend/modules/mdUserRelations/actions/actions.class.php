<?php

/**
 * default actions.
 *
 * @package    todotermas
 * @subpackage default
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mdUserRelationsActions extends sfActions
{

    public function executeChangeEncargadoRelation($request) {
        $checked = $request->getParameter("checked");
        $encargadoId = $request->getParameter("encargadoId");
        $id = $request->getParameter("id");
        if($checked == "true")
        {
            $encargado = Doctrine::getTable("encargados")->retrieveOne($id, $encargadoId);
            if($encargado)
            {
                $encargado->delete();
            }
            $encargado = new encargados();
            $encargado->setMdUserResponsableId($id);
            $encargado->setMdUserEnresponsabilidadId($encargadoId);
            $encargado->save();
        }
        else
        {
            $encargado = Doctrine::getTable("encargados")->retrieveOne($id, $encargadoId);
            if($encargado)
            {
                $encargado->delete();
            }
        }
        return $this->renderText(mdBasicFunction::basic_json_response(true, array()));
    }
}
