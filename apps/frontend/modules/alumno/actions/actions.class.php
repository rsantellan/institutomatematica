<?php

/**
 * alumno actions.
 *
 * @package    instituto
 * @subpackage alumno
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class alumnoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->alumnos = Doctrine::getTable('alumno')
      ->createQuery('a')
      ->execute();

  }

  public function executeShow(sfWebRequest $request)
  {
    $this->alumno = Doctrine::getTable('alumno')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->alumno);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new alumnoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new alumnoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($alumno = Doctrine::getTable('alumno')->find(array($request->getParameter('id'))), sprintf('Object alumno does not exist (%s).', $request->getParameter('id')));
    $this->form = new alumnoForm($alumno);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($alumno = Doctrine::getTable('alumno')->find(array($request->getParameter('id'))), sprintf('Object alumno does not exist (%s).', $request->getParameter('id')));
    $this->form = new alumnoForm($alumno);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($alumno = Doctrine::getTable('alumno')->find(array($request->getParameter('id'))), sprintf('Object alumno does not exist (%s).', $request->getParameter('id')));
    $alumno->delete();

    $this->redirect('alumno/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $alumno = $form->save();

      $this->redirect('alumno/edit?id='.$alumno->getId());
    }
  }



  public function executeTraerAlumnos(sfWebRequest $request){
        $salida = array();
        $listaAlumnos =  Doctrine::getTable('alumno')->retrieveByNameNotInPreparation($request->getParameter('nombre'), $request->getParameter('apellido'), $request->getParameter('preparacionId'));
        $list = array();
        foreach($listaAlumnos as $alumno){
          $aux = array();
          $aux['id'] = $alumno->getId();
          $aux['name'] = $alumno->getNombre();
					$aux['lastName']=$alumno->getApellido();
					$aux['email'] = $alumno->getEmail();
					$aux['celular'] = $alumno->getCelular();
					$aux['body'] = $this->getPartial('preparacion/alumnoLista', array('alumno'=>$alumno));
          array_push($list, $aux);
        }
        $salida ['result'] = 1;
        $salida ['list'] = $list;
        return $this->renderText(json_encode($salida));    
  }
  
  public function executeShowSimpleAlumno(sfWebRequest $request)
  {
		$this->forward404Unless($alumno = Doctrine::getTable('alumno')->find(array($request->getParameter('id'))), sprintf('Object alumno does not exist (%s).', $request->getParameter('id')));
		$body = $this->getPartial('basicShow', array('alumno'=>$alumno));
		$salida = array();
		$salida ['result'] = 1;
		$salida ['body'] = $body;
		return $this->renderText(json_encode($salida));  		
		
	}
	
	public function executeAddAlumnoAjax(sfWebRequest $request)
	{
		$form = new alumnoForm();
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		$salida = array();
		$result = 0;
		$id = 0;
    if ($form->isValid())
    {
      $alumno = $form->save();
      $result = 1;
      $id = $alumno->getId();
      $body = $this->getPartial('alumno/listForm', array('alumnoForm' => new alumnoForm()) );
		}
		else
		{
			$body = $this->getPartial('alumno/listForm', array('alumnoForm' => $form) );
		}					

		
		$salida ['result'] = $result;
		$salida ['body'] = $body;
		$salida ['id'] = $id;
		return $this->renderText(json_encode($salida)); 
	}
	
	public function executeCheckAlumno(sfWebRequest $request)
	{
		$parameters = $request->getPostParameters();
		$nombre = $parameters['alumno']['nombre'];
		$apellido = $parameters['alumno']['apellido'];
		$telefono = $parameters['alumno']['telefono'];
		$celular = $parameters['alumno']['celular'];
		$direccion = $parameters['alumno']['direccion'];
		$email = $parameters['alumno']['email'];
		
		$telefonoAlumnos = Doctrine::getTable('alumno')->findBy('telefono',$telefono);
		$celularAlumnos = Doctrine::getTable('alumno')->findBy('celular',$celular);
		$direccionAlumnos = Doctrine::getTable('alumno')->findBy('direccion',$direccion);
		$emailAlumnos = Doctrine::getTable('alumno')->findBy('email',$email);
		$nombresAlumnos = Doctrine::getTable('alumno')->retrieveByName($nombre, $apellido);
		$salida = array();
		$result = 0;
		if(count($telefonoAlumnos) > 0 || count($celularAlumnos) > 0 || count($direccionAlumnos) > 0 || count($emailAlumnos) > 0 || count($nombresAlumnos) > 0)
		{
			$body = $this->getPartial('alumno/listaAlumnosIgualesForm', array('telefonoAlumnos' => $telefonoAlumnos, 'celularAlumnos' => $celularAlumnos, 'direccionAlumnos' => $direccionAlumnos, 'emailAlumnos' => $emailAlumnos, 'nombresAlumnos' => $nombresAlumnos));
			$result = 0;
		}
		else
		{
			$result = 1;
			$body = 'ok';
		}
		$salida ['result'] = $result;
		$salida ['body'] = $body;	
		return $this->renderText(json_encode($salida)); 
	}
		
}
