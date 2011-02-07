<?php

/**
 * evaluacion actions.
 *
 * @package    instituto
 * @subpackage evaluacion
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class evaluacionActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->evaluacions = Doctrine::getTable('evaluacion')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->evaluacion = Doctrine::getTable('evaluacion')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->evaluacion);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new evaluacionForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new evaluacionForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($evaluacion = Doctrine::getTable('evaluacion')->find(array($request->getParameter('id'))), sprintf('Object evaluacion does not exist (%s).', $request->getParameter('id')));
    $this->form = new evaluacionForm($evaluacion);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($evaluacion = Doctrine::getTable('evaluacion')->find(array($request->getParameter('id'))), sprintf('Object evaluacion does not exist (%s).', $request->getParameter('id')));
    $this->form = new evaluacionForm($evaluacion);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($evaluacion = Doctrine::getTable('evaluacion')->find(array($request->getParameter('id'))), sprintf('Object evaluacion does not exist (%s).', $request->getParameter('id')));
    $evaluacion->delete();

    $this->redirect('evaluacion/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $evaluacion = $form->save();

      $this->redirect('evaluacion/edit?id='.$evaluacion->getId());
    }
  }
}
