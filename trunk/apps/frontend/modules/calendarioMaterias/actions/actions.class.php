<?php

/**
 * calendarioMaterias actions.
 *
 * @package    instituto
 * @subpackage calendarioMaterias
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class calendarioMateriasActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->calendario_materiass = array();/*Doctrine::getTable('calendarioMaterias')
      ->createQuery('a')
      ->execute();
    */
    $this->docentes = Doctrine::getTable('docente')
      ->createQuery('a')
      ->execute();
      
    $this->myFilter = new preparacionFormFilter();
  }

	public function executeTraerCalendario(sfWebRequest $request)
  {
		$docenteId = $request->getPostParameter('docenteId');
		$calendario_materiass = Doctrine::getTable('calendarioMaterias')->getAllCalendarioMateriasOfDocente($docenteId);
		$salida = array();
		$list = array();
		foreach ($calendario_materiass as $calendario_materias){
			$aux = array();
			$aux['place'] = $calendario_materias->getFormattedTime();
			$aux['finish'] = $calendario_materias->calculatedFinishTime();
			$aux['materia'] = $calendario_materias->getPreparacion()->getMateria()->getNombre();
			$aux['docente'] = $calendario_materias->getPreparacion()->getDocente()->getNombre();
			array_push($list, $aux);
		}
		$salida ['result'] = 1;
		$salida ['list'] = $list;
		if(count($calendario_materiass) == 0){
			$salida['body'] = "No hay horarios";
		}else{
				$salida ['body'] = $this->getPartial('showCalendar', array('calendario_materiass' => $calendario_materiass));
		}
		
		return $this->renderText(json_encode($salida));
		
	}
	
  public function executeEjecutarFiltro(sfWebRequest $request)
  {
		$salida = array();    

    $params = $request->getPostParameter('preparacion_filters');
    $this->myFilter = new preparacionFormFilter();
    $this->myFilter->bind($params);
    $idList = array();
    array_push($idList, 0);
    if($this->myFilter->isValid()){
      
      $this->search = $this->myFilter->buildQuery($this->myFilter->getValues());
      $this->search->setHydrationMode(Doctrine_Core::HYDRATE_NONE);
      $data = $this->search->execute();
      foreach($data as $dato){
        array_push($idList, $dato[0]);
      }
    }
    
    $calendario_materiass = Doctrine::getTable('calendarioMaterias')->getAllCalendarioMateriasOfPreparacion($idList);
    $list = array();
		foreach ($calendario_materiass as $calendario_materias){
			$aux = array();
			$aux['place'] = $calendario_materias->getFormattedTime();
			$aux['finish'] = $calendario_materias->calculatedFinishTime();
			$aux['materia'] = $calendario_materias->getPreparacion()->getMateria()->getNombre();
			$aux['docente'] = $calendario_materias->getPreparacion()->getDocente()->getNombre();
			array_push($list, $aux);
		}
		$salida ['result'] = 1;
		$salida ['list'] = $list;
		if(count($calendario_materiass) == 0){
			$salida['body'] = "No hay horarios";
		}else{
				$salida ['body'] = $this->getPartial('showCalendar', array('calendario_materiass' => $calendario_materiass));
		}
    return $this->renderText(json_encode($salida));
  }


  public function executeShow(sfWebRequest $request)
  {
    $this->calendario_materias = Doctrine::getTable('calendarioMaterias')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->calendario_materias);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new calendarioMateriasForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new calendarioMateriasForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($calendario_materias = Doctrine::getTable('calendarioMaterias')->find(array($request->getParameter('id'))), sprintf('Object calendario_materias does not exist (%s).', $request->getParameter('id')));
    $this->form = new calendarioMateriasForm($calendario_materias);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($calendario_materias = Doctrine::getTable('calendarioMaterias')->find(array($request->getParameter('id'))), sprintf('Object calendario_materias does not exist (%s).', $request->getParameter('id')));
    $this->form = new calendarioMateriasForm($calendario_materias);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($calendario_materias = Doctrine::getTable('calendarioMaterias')->find(array($request->getParameter('id'))), sprintf('Object calendario_materias does not exist (%s).', $request->getParameter('id')));
    $calendario_materias->delete();

    $this->redirect('calendarioMaterias/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {

    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $calendario_materias = $form->save();

      $this->redirect('calendarioMaterias/edit?id='.$calendario_materias->getId());
    }
  }
}
