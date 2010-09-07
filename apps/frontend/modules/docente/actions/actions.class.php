<?php

/**
 * docente actions.
 *
 * @package    instituto
 * @subpackage docente
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class docenteActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->docentes = Doctrine::getTable('docente')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->docente = Doctrine::getTable('docente')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->docente);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new docenteForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new docenteForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($docente = Doctrine::getTable('docente')->find(array($request->getParameter('id'))), sprintf('Object docente does not exist (%s).', $request->getParameter('id')));
    $this->form = new docenteForm($docente);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($docente = Doctrine::getTable('docente')->find(array($request->getParameter('id'))), sprintf('Object docente does not exist (%s).', $request->getParameter('id')));
    $this->form = new docenteForm($docente);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($docente = Doctrine::getTable('docente')->find(array($request->getParameter('id'))), sprintf('Object docente does not exist (%s).', $request->getParameter('id')));
    $docente->delete();

    $this->redirect('docente/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $docente = $form->save();

      $this->redirect('docente/edit?id='.$docente->getId());
    }
  }
}
