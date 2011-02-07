<?php

/**
 * preparacion form base class.
 *
 * @method preparacion getObject() Returns the current form's model object
 *
 * @package    instituto
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasepreparacionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'materia_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('materia'), 'add_empty' => false)),
      'docente_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('docente'), 'add_empty' => false)),
      'evaluacion_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('evaluacion'), 'add_empty' => false)),
      'periodo'       => new sfWidgetFormDateTime(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'materia_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('materia'))),
      'docente_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('docente'))),
      'evaluacion_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('evaluacion'))),
      'periodo'       => new sfValidatorDateTime(),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('preparacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'preparacion';
  }

}
