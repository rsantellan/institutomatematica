<?php

/**
 * formaContacto actions.
 *
 * @package    instituto
 * @subpackage formaContacto
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class formaContactoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->forma_contactos = Doctrine::getTable('formaContacto')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->forma_contacto = Doctrine::getTable('formaContacto')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->forma_contacto);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new formaContactoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new formaContactoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($forma_contacto = Doctrine::getTable('formaContacto')->find(array($request->getParameter('id'))), sprintf('Object forma_contacto does not exist (%s).', $request->getParameter('id')));
    $this->form = new formaContactoForm($forma_contacto);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($forma_contacto = Doctrine::getTable('formaContacto')->find(array($request->getParameter('id'))), sprintf('Object forma_contacto does not exist (%s).', $request->getParameter('id')));
    $this->form = new formaContactoForm($forma_contacto);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($forma_contacto = Doctrine::getTable('formaContacto')->find(array($request->getParameter('id'))), sprintf('Object forma_contacto does not exist (%s).', $request->getParameter('id')));
    $forma_contacto->delete();

    $this->redirect('formaContacto/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $forma_contacto = $form->save();

      $this->redirect('formaContacto/edit?id='.$forma_contacto->getId());
    }
  }
}
