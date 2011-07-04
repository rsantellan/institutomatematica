<?php

/**
 * calendarioMaterias filter form base class.
 *
 * @package    instituto
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasecalendarioMateriasFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'day'            => new sfWidgetFormChoice(array('choices' => array('' => '', 'lunes' => 'lunes', 'martes' => 'martes', 'miercoles' => 'miercoles', 'jueves' => 'jueves', 'viernes' => 'viernes', 'sabado' => 'sabado', 'domingo' => 'domingo'))),
      'hour'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'minutes'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'preparacion_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('preparacion'), 'add_empty' => true)),
      'duration'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'day'            => new sfValidatorChoice(array('required' => false, 'choices' => array('lunes' => 'lunes', 'martes' => 'martes', 'miercoles' => 'miercoles', 'jueves' => 'jueves', 'viernes' => 'viernes', 'sabado' => 'sabado', 'domingo' => 'domingo'))),
      'hour'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'minutes'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'preparacion_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('preparacion'), 'column' => 'id')),
      'duration'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('calendario_materias_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'calendarioMaterias';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'day'            => 'Enum',
      'hour'           => 'Number',
      'minutes'        => 'Number',
      'preparacion_id' => 'ForeignKey',
      'duration'       => 'Number',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
    );
  }
}
