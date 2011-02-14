<?php

/**
 * preparacion actions.
 *
 * @package    instituto
 * @subpackage preparacion
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class preparacionActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->preparacions = Doctrine::getTable('preparacion')
      ->createQuery('a')
      ->execute();

  }

  public function executeShow(sfWebRequest $request)
  {
    $this->preparacion = Doctrine::getTable('preparacion')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->preparacion);
    $this->alumnoForm = new alumnoForm();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new preparacionForm();

    $this->facultades = Doctrine::getTable('facultad')->findAll();

  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new preparacionForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($preparacion = Doctrine::getTable('preparacion')->find(array($request->getParameter('id'))), sprintf('Object preparacion does not exist (%s).', $request->getParameter('id')));
    $this->form = new preparacionForm($preparacion);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($preparacion = Doctrine::getTable('preparacion')->find(array($request->getParameter('id'))), sprintf('Object preparacion does not exist (%s).', $request->getParameter('id')));
    $this->form = new preparacionForm($preparacion);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($preparacion = Doctrine::getTable('preparacion')->find(array($request->getParameter('id'))), sprintf('Object preparacion does not exist (%s).', $request->getParameter('id')));
    $preparacion->delete();

    $this->redirect('preparacion/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $preparacion = $form->save();

      $this->redirect('preparacion/show?id='.$preparacion->getId());
    }
  }
  
  public function executeSaveAjax(sfWebRequest $request)
  {
		$this->forward404Unless($request->isMethod(sfRequest::POST));
		
    $form = new preparacionForm();

    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    $salida = array();
    if ($form->isValid())
    {
			$salida ['result'] = 1;
      $preparacion = $form->save();
      $salida ['body'] = "OK";
		}
		else
		{
			$salida ['result'] = 0;
			$salida ['body'] = $form->getFormattedErrors();
		}
		
	  
		
		return $this->renderText(json_encode($salida));
  }
  
  public function executeTraerMaterias(sfWebRequest $request)
  {
		$salida = array();
		$listaMaterias = Doctrine::getTable('materia')->findBy('facultad_id',$request->getParameter('facultadId'));
		$list = array();
		foreach($listaMaterias as $materia){
			$aux = array();
			$aux['id'] = $materia->getId();
			$aux['name'] = $materia->getNombre();
			array_push($list, $aux);
		}
		$salida ['result'] = 1;
		$salida ['list'] = $list;
		return $this->renderText(json_encode($salida));
  }
  
  public function executeGetAlumnoPreparacionForm(sfWebRequest $request)
  {
		$salida = array();
		$preparacion = Doctrine::getTable('preparacion')->find($request->getParameter('preparacionId'));
		$alumno = Doctrine::getTable('alumno')->find($request->getParameter('alumnoId'));
		$formasContactos = Doctrine::getTable('formaContacto')->findAll();
		$salida ['result'] = 1;
		if(!$alumno){
			$salida ['body'] = "No se ingreso ningun alumno";
		}else{
			$salida ['body'] = $this->getPartial('preparacion/alumnoPreparacionForm', array('preparacion'=>$preparacion,'alumno'=>$alumno, 'formaContacto'=>$formasContactos));
		}
		return $this->renderText(json_encode($salida));		
	}
	
	public function executeSaveAlumnoEnPreparacion(sfWebRequest $request)
	{
		$preparacion = Doctrine::getTable('preparacion')->find($request->getParameter('preparacion_id'));
		$alumno = Doctrine::getTable('alumno')->find($request->getParameter('alumno_id'));
		$formasContacto = Doctrine::getTable('formaContacto')->find($request->getParameter('forma_contacto'));
		$alumnoPreparacion = new alumnoPreparacion();
		$alumnoPreparacion->setAlumno($alumno);
		$alumnoPreparacion->setPreparacion($preparacion);
		$alumnoPreparacion->setFormaContacto($formasContacto);
		$resultado = 0;
		$alumnoId = $request->getParameter('alumno_id');
		try
		{
			$resultado = 1;
			$alumnoPreparacion->save();
			$body = $this->getPartial('preparacion/tableRowAlumnoPreparacion', array('alumnoPreparacion'=>$alumnoPreparacion));
		}
		catch(Exception $e)
		{
			$resultado = 0;
			$body = "Ups... Hubo un error...<br/><br/> <strong>Posiblemente el alumno ya existe en la preparacion!!</strong>";
		}

		$salida = array();
		$salida ['result'] = $resultado;
		$salida ['body'] = $body;
		$salida ['alumnoId'] = $alumnoId;
		return $this->renderText(json_encode($salida));
	}
	
	public function executeQuitarAlumno(sfWebRequest $request)
	{
		$alumnoId =	$request->getParameter('alumnoId');
		$preparacionId = $request->getParameter('preparacionId');
		$alumnoPreparacion = Doctrine::getTable('alumnoPreparacion')->retrieveByAlumnoIdAndPreparacionId($alumnoId, $preparacionId);
		$alumnoPreparacion->delete();
		$salida ['result'] = 1;
		$salida ['body'] = "ok";
		return $this->renderText(json_encode($salida));
	}	
}