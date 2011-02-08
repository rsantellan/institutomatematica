<?php

/**
 * alumnoPreparacion filter form base class.
 *
 * @package    instituto
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasealumnoPreparacionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'forma_contacto_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('formaContacto'), 'add_empty' => true)),
      'nota_contacto'     => new sfWidgetFormFilterInput(),
      'pago'              => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'pago_completo'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'monto_pago'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'resultado'         => new sfWidgetFormChoice(array('choices' => array('' => '', 'desconocido' => 'desconocido', 'abandono' => 'abandono', 'perdio' => 'perdio', 'salvo' => 'salvo'))),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'forma_contacto_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('formaContacto'), 'column' => 'id')),
      'nota_contacto'     => new sfValidatorPass(array('required' => false)),
      'pago'              => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'pago_completo'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'monto_pago'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'resultado'         => new sfValidatorChoice(array('required' => false, 'choices' => array('desconocido' => 'desconocido', 'abandono' => 'abandono', 'perdio' => 'perdio', 'salvo' => 'salvo'))),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('alumno_preparacion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'alumnoPreparacion';
  }

  public function getFields()
  {
    return array(
      'alumno_id'         => 'Number',
      'preparacion_id'    => 'Number',
      'forma_contacto_id' => 'ForeignKey',
      'nota_contacto'     => 'Text',
      'pago'              => 'Boolean',
      'pago_completo'     => 'Boolean',
      'monto_pago'        => 'Number',
      'resultado'         => 'Enum',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
    );
  }
}
