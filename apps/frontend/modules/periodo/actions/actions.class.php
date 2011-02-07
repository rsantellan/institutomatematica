<?php

/**
 * periodo actions.
 *
 * @package    instituto
 * @subpackage periodo
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class periodoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->periodos = Doctrine::getTable('periodo')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->periodo = Doctrine::getTable('periodo')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->periodo);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new periodoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new periodoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($periodo = Doctrine::getTable('periodo')->find(array($request->getParameter('id'))), sprintf('Object periodo does not exist (%s).', $request->getParameter('id')));
    $this->form = new periodoForm($periodo);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($periodo = Doctrine::getTable('periodo')->find(array($request->getParameter('id'))), sprintf('Object periodo does not exist (%s).', $request->getParameter('id')));
    $this->form = new periodoForm($periodo);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($periodo = Doctrine::getTable('periodo')->find(array($request->getParameter('id'))), sprintf('Object periodo does not exist (%s).', $request->getParameter('id')));
    $periodo->delete();

    $this->redirect('periodo/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $periodo = $form->save();

      $this->redirect('periodo/edit?id='.$periodo->getId());
    }
  }
}
