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
    $query = Doctrine::getTable('preparacion')
      ->retrieveAllPreparacionesByDate(true);
    $this->pager = new sfDoctrinePager ( 'preparacion', 6 );

    $this->pager->setQuery ( $query );
    //$this->pager->setResultArray($list);
    $this->pager->setPage($this->getRequestParameter('page',1));
    $this->pager->init();

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

                $forma_contacto_has_note = $request->getParameter('forma_contacto_has_note');
                $forma_contacto_note = $request->getParameter('forma_contacto_note');
		$preparacion = Doctrine::getTable('preparacion')->find($request->getParameter('preparacion_id'));
		$alumno = Doctrine::getTable('alumno')->find($request->getParameter('alumno_id'));
		$formasContacto = Doctrine::getTable('formaContacto')->find($request->getParameter('forma_contacto'));
		$alumnoPreparacion = new alumnoPreparacion();
		$alumnoPreparacion->setAlumno($alumno);
		$alumnoPreparacion->setPreparacion($preparacion);
		$alumnoPreparacion->setFormaContacto($formasContacto);
                if($forma_contacto_has_note === "1")
                {
                  $alumnoPreparacion->setNotaContacto($forma_contacto_note);
                }
		$resultado = 0;
		$alumnoId = $request->getParameter('alumno_id');
                $salida = array();
		try
		{
                    $resultado = 1;
                    $alumnoPreparacion->save();
                    $body = $this->getPartial('preparacion/tableRowAlumnoPreparacion', array('alumnoPreparacion'=>$alumnoPreparacion, 'hidden' => true));
                    $bodyTelefono = $this->getPartial('preparacion/tableRowAlumnoPreparacionTelefono', array('alumnoPreparacion'=>$alumnoPreparacion, 'hidden' => true));
                    $bodyEmail = $this->getPartial('preparacion/tableRowAlumnoPreparacionEmail', array('alumnoPreparacion'=>$alumnoPreparacion, 'hidden' => true));
                    $bodyContacto = $this->getPartial('preparacion/tableRowAlumnoPreparacionContacto', array('alumnoPreparacion'=>$alumnoPreparacion, 'hidden' => true));
                    $salida ['bodyTelefono'] = $bodyTelefono;
                    $salida ['bodyEmail'] = $bodyEmail;
                    $salida ['bodyContacto'] = $bodyContacto;
                }
		catch(Exception $e)
		{
                    $resultado = 0;
                    $body = "Ups... Hubo un error...<br/><br/> <strong>Posiblemente el alumno ya existe en la preparacion!!</strong>";
                    return $this->renderText(mdBasicFunction::basic_json_response(false, array('body'=>$body)));
		}

		
		$salida ['result'] = $resultado;
		$salida ['body'] = $body;
		$salida ['alumnoId'] = $alumnoId;
		return $this->renderText(mdBasicFunction::basic_json_response(true, $salida));
	}
	
	public function executeQuitarAlumno(sfWebRequest $request)
	{
		$alumnoId =	$request->getParameter('alumnoId');
		$preparacionId = $request->getParameter('preparacionId');
		$alumnoPreparacion = Doctrine::getTable('alumnoPreparacion')->retrieveByAlumnoIdAndPreparacionId($alumnoId, $preparacionId);
		$alumnoPreparacion->delete();
		return $this->renderText(mdBasicFunction::basic_json_response(true, array()));
	}
  
  public function executeBringPagosForm(sfWebRequest $request)
	{
    $alumnoId =	$request->getParameter('alumnoId');
		$preparacionId = $request->getParameter('preparacionId');
		$alumnoPreparacion = Doctrine::getTable('alumnoPreparacion')->retrieveByAlumnoIdAndPreparacionId($alumnoId, $preparacionId);    
    $form = new alumnoPreparacionPagosForm($alumnoPreparacion);
    $body = $this->getPartial('preparacion/pagosForm', array('form'=>$form));
    
    return $this->renderText(mdBasicFunction::basic_json_response(true, array('body'=>$body)));
  }
  
  public function executeProccessPagosForm(sfWebRequest $request)
	{
    $form = new alumnoPreparacionPagosForm();
    $parameters = $request->getParameter($form->getName());
    
    $alumnoId =	$parameters['alumno_id'];
		$preparacionId = $parameters['preparacion_id'];
		$alumnoPreparacion = Doctrine::getTable('alumnoPreparacion')->retrieveByAlumnoIdAndPreparacionId($alumnoId, $preparacionId);        
    $form = new alumnoPreparacionPagosForm($alumnoPreparacion);
    $form->bind($parameters);
    if($form->isValid())
    {
        $object = $form->save();
        $image = "/images/".$object->retrievePaymentStatusInColor()."_flag.png";
        return $this->renderText(mdBasicFunction::basic_json_response(true, array('alumnoId'=>$alumnoId, 'image'=>$image )));
    }
    else
    {
      
    }
    return $this->renderText(mdBasicFunction::basic_json_response(false, array()));
  }
}
