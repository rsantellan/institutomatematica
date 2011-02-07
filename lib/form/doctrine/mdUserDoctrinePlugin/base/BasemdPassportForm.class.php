<?php

/**
 * mdPassport form base class.
 *
 * @method mdPassport getObject() Returns the current form's model object
 *
 * @package    instituto
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasemdPassportForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'md_user_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('mdUser'), 'add_empty' => false)),
      'username'       => new sfWidgetFormInputText(),
      'password'       => new sfWidgetFormInputText(),
      'account_active' => new sfWidgetFormInputText(),
      'last_login'     => new sfWidgetFormDateTime(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'md_user_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('mdUser'))),
      'username'       => new sfValidatorString(array('max_length' => 128)),
      'password'       => new sfValidatorString(array('max_length' => 128)),
      'account_active' => new sfValidatorInteger(array('required' => false)),
      'last_login'     => new sfValidatorDateTime(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('md_passport[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mdPassport';
  }

}
