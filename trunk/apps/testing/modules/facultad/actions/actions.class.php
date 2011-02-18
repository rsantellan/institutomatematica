<?php

/**
 * facultad actions.
 *
 * @package    instituto
 * @subpackage facultad
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class facultadActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->facultads = Doctrine::getTable('facultad')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->facultad = Doctrine::getTable('facultad')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->facultad);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new facultadForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new facultadForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($facultad = Doctrine::getTable('facultad')->find(array($request->getParameter('id'))), sprintf('Object facultad does not exist (%s).', $request->getParameter('id')));
    $this->form = new facultadForm($facultad);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($facultad = Doctrine::getTable('facultad')->find(array($request->getParameter('id'))), sprintf('Object facultad does not exist (%s).', $request->getParameter('id')));
    $this->form = new facultadForm($facultad);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($facultad = Doctrine::getTable('facultad')->find(array($request->getParameter('id'))), sprintf('Object facultad does not exist (%s).', $request->getParameter('id')));
    $facultad->delete();

    $this->redirect('facultad/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $facultad = $form->save();

      $this->redirect('facultad/edit?id='.$facultad->getId());
    }
  }
}
