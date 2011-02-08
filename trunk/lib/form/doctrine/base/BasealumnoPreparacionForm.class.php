<?php

/**
 * alumnoPreparacion form base class.
 *
 * @method alumnoPreparacion getObject() Returns the current form's model object
 *
 * @package    instituto
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasealumnoPreparacionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'alumno_id'         => new sfWidgetFormInputHidden(),
      'preparacion_id'    => new sfWidgetFormInputHidden(),
      'forma_contacto_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('formaContacto'), 'add_empty' => false)),
      'nota_contacto'     => new sfWidgetFormInputText(),
      'pago'              => new sfWidgetFormInputCheckbox(),
      'pago_completo'     => new sfWidgetFormInputCheckbox(),
      'monto_pago'        => new sfWidgetFormInputText(),
      'resultado'         => new sfWidgetFormChoice(array('choices' => array('desconocido' => 'desconocido', 'abandono' => 'abandono', 'perdio' => 'perdio', 'salvo' => 'salvo'))),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'alumno_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'alumno_id', 'required' => false)),
      'preparacion_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'preparacion_id', 'required' => false)),
      'forma_contacto_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('formaContacto'))),
      'nota_contacto'     => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'pago'              => new sfValidatorBoolean(array('required' => false)),
      'pago_completo'     => new sfValidatorBoolean(array('required' => false)),
      'monto_pago'        => new sfValidatorInteger(array('required' => false)),
      'resultado'         => new sfValidatorChoice(array('choices' => array('desconocido' => 'desconocido', 'abandono' => 'abandono', 'perdio' => 'perdio', 'salvo' => 'salvo'), 'required' => false)),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('alumno_preparacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'alumnoPreparacion';
  }

}
