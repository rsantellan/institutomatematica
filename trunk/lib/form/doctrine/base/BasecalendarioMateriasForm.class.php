<?php

/**
 * calendarioMaterias form base class.
 *
 * @method calendarioMaterias getObject() Returns the current form's model object
 *
 * @package    instituto
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasecalendarioMateriasForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'day'            => new sfWidgetFormChoice(array('choices' => array('lunes' => 'lunes', 'martes' => 'martes', 'miercoles' => 'miercoles', 'jueves' => 'jueves', 'viernes' => 'viernes', 'sabado' => 'sabado', 'domingo' => 'domingo'))),
      'hour'           => new sfWidgetFormInputText(),
      'minutes'        => new sfWidgetFormInputText(),
      'preparacion_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('preparacion'), 'add_empty' => false)),
      'duration'       => new sfWidgetFormInputText(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'day'            => new sfValidatorChoice(array('choices' => array(0 => 'lunes', 1 => 'martes', 2 => 'miercoles', 3 => 'jueves', 4 => 'viernes', 5 => 'sabado', 6 => 'domingo'), 'required' => false)),
      'hour'           => new sfValidatorInteger(),
      'minutes'        => new sfValidatorInteger(),
      'preparacion_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('preparacion'))),
      'duration'       => new sfValidatorInteger(),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('calendario_materias[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'calendarioMaterias';
  }

}
