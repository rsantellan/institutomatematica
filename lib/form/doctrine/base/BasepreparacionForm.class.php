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
      'md_user_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('mdUser'), 'add_empty' => false)),
      'evaluacion_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('evaluacion'), 'add_empty' => false)),
      'periodo_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('periodo'), 'add_empty' => false)),
      'inicio'        => new sfWidgetFormDateTime(),
      'fin'           => new sfWidgetFormDateTime(),
      'costo_clase'   => new sfWidgetFormInputText(),
      'costo_total'   => new sfWidgetFormInputText(),
      'hora_inicio'   => new sfWidgetFormInputText(),
      'hora_fin'      => new sfWidgetFormDateTime(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'materia_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('materia'))),
      'md_user_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('mdUser'))),
      'evaluacion_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('evaluacion'))),
      'periodo_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('periodo'))),
      'inicio'        => new sfValidatorDateTime(),
      'fin'           => new sfValidatorDateTime(),
      'costo_clase'   => new sfValidatorInteger(array('required' => false)),
      'costo_total'   => new sfValidatorInteger(array('required' => false)),
      'hora_inicio'   => new sfValidatorString(array('max_length' => 64)),
      'hora_fin'      => new sfValidatorDateTime(),
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
