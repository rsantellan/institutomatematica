<?php

/**
 * materia actions.
 *
 * @package    instituto
 * @subpackage materia
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class materiaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->materias = Doctrine::getTable('materia')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->materia = Doctrine::getTable('materia')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->materia);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new materiaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new materiaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($materia = Doctrine::getTable('materia')->find(array($request->getParameter('id'))), sprintf('Object materia does not exist (%s).', $request->getParameter('id')));
    $this->form = new materiaForm($materia);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($materia = Doctrine::getTable('materia')->find(array($request->getParameter('id'))), sprintf('Object materia does not exist (%s).', $request->getParameter('id')));
    $this->form = new materiaForm($materia);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($materia = Doctrine::getTable('materia')->find(array($request->getParameter('id'))), sprintf('Object materia does not exist (%s).', $request->getParameter('id')));
    $materia->delete();

    $this->redirect('materia/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $materia = $form->save();

      $this->redirect('materia/edit?id='.$materia->getId());
    }
  }
}
