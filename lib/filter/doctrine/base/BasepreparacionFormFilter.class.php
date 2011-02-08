<?php

/**
 * preparacion filter form base class.
 *
 * @package    instituto
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasepreparacionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'materia_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('materia'), 'add_empty' => true)),
      'md_user_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('mdUser'), 'add_empty' => true)),
      'evaluacion_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('evaluacion'), 'add_empty' => true)),
      'periodo_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('periodo'), 'add_empty' => true)),
      'inicio'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'fin'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'costo_clase'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'costo_total'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'hora_inicio'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'hora_fin'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'materia_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('materia'), 'column' => 'id')),
      'md_user_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('mdUser'), 'column' => 'id')),
      'evaluacion_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('evaluacion'), 'column' => 'id')),
      'periodo_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('periodo'), 'column' => 'id')),
      'inicio'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'fin'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'costo_clase'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'costo_total'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'hora_inicio'   => new sfValidatorPass(array('required' => false)),
      'hora_fin'      => new sfValidatorPass(array('required' => false)),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('preparacion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'preparacion';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'materia_id'    => 'ForeignKey',
      'md_user_id'    => 'ForeignKey',
      'evaluacion_id' => 'ForeignKey',
      'periodo_id'    => 'ForeignKey',
      'inicio'        => 'Date',
      'fin'           => 'Date',
      'costo_clase'   => 'Number',
      'costo_total'   => 'Number',
      'hora_inicio'   => 'Text',
      'hora_fin'      => 'Text',
      'created_at'    => 'Date',
      'updated_at'    => 'Date',
    );
  }
}
