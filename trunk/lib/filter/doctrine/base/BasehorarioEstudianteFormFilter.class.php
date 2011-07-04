<?php

/**
 * horarioEstudiante filter form base class.
 *
 * @package    instituto
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasehorarioEstudianteFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'alumno_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('alumno'), 'add_empty' => true)),
      'horario_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('calendarioMaterias'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'alumno_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('alumno'), 'column' => 'id')),
      'horario_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('calendarioMaterias'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('horario_estudiante_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'horarioEstudiante';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'alumno_id'  => 'ForeignKey',
      'horario_id' => 'ForeignKey',
    );
  }
}
