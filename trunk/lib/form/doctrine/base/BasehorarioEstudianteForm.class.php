<?php

/**
 * horarioEstudiante form base class.
 *
 * @method horarioEstudiante getObject() Returns the current form's model object
 *
 * @package    instituto
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasehorarioEstudianteForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'alumno_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('alumno'), 'add_empty' => false)),
      'horario_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('calendarioMaterias'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'alumno_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('alumno'))),
      'horario_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('calendarioMaterias'))),
    ));

    $this->widgetSchema->setNameFormat('horario_estudiante[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'horarioEstudiante';
  }

}
