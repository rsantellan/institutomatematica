<?php

/**
 * mailing actions.
 *
 * @package    instituto
 * @subpackage mailing
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mailingActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->mailings = Doctrine::getTable('mailing')
      ->createQuery('a')->orderBy("created_at DESC")
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->mailing = Doctrine::getTable('mailing')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->mailing);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new mailingForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new mailingForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($mailing = Doctrine::getTable('mailing')->find(array($request->getParameter('id'))), sprintf('Object mailing does not exist (%s).', $request->getParameter('id')));
    $this->form = new mailingForm($mailing);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($mailing = Doctrine::getTable('mailing')->find(array($request->getParameter('id'))), sprintf('Object mailing does not exist (%s).', $request->getParameter('id')));
    $this->form = new mailingForm($mailing);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($mailing = Doctrine::getTable('mailing')->find(array($request->getParameter('id'))), sprintf('Object mailing does not exist (%s).', $request->getParameter('id')));
    $mailing->delete();

    $this->redirect('mailing/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $mailing = $form->save();

      $this->redirect('mailing/edit?id='.$mailing->getId());
    }
  }
  
  public function executeSendMailing(sfWebRequest $request)
  {
      $ids = $request->getParameter("sendIds");
      $id = $request->getParameter("id");
      $list = explode('|',$ids);
      $sender_list = array();
      unset($list[0]);
      foreach($list as $key => $val)
      {
        if (!array_key_exists($val,$sender_list))
        {
          $sender_list[$val] = $val;
        }
      }
      $mailing = Doctrine::getTable('mailing')->find($id);
      $body = $this->getPartial('mailing/mailBody', array('mailing'=>$mailing));
      foreach($sender_list as $alumnoId)
      {
          $alumno = Doctrine::getTable('alumno')->find($alumnoId);
          mdMailHandler::sendSwiftMail("rsantellan@gmail.com", $alumno->getEmail(), "Nuevos cursos", $body, true, "rsantellan@gmail.com");
      }
      
      
      return $this->renderText(mdBasicFunction::basic_json_response(true, array()));
  }
}
