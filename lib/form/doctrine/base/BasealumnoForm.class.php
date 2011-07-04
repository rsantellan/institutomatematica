<?php

/**
 * alumno form base class.
 *
 * @method alumno getObject() Returns the current form's model object
 *
 * @package    instituto
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasealumnoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'nombre'     => new sfWidgetFormInputText(),
      'apellido'   => new sfWidgetFormInputText(),
      'telefono'   => new sfWidgetFormInputText(),
      'celular'    => new sfWidgetFormInputText(),
      'direccion'  => new sfWidgetFormInputText(),
      'email'      => new sfWidgetFormInputText(),
      'sexo'       => new sfWidgetFormChoice(array('choices' => array('M' => 'M', 'F' => 'F'))),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nombre'     => new sfValidatorString(array('max_length' => 128)),
      'apellido'   => new sfValidatorString(array('max_length' => 255)),
      'telefono'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'celular'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'direccion'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'sexo'       => new sfValidatorChoice(array('choices' => array(0 => 'M', 1 => 'F'))),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('alumno[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'alumno';
  }

}
