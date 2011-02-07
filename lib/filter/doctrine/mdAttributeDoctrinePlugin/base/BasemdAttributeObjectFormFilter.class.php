<?php

/**
 * mdAttributeObject filter form base class.
 *
 * @package    instituto
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasemdAttributeObjectFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'object_id'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'object_class_name'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'md_attribute_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('mdAttribute'), 'add_empty' => true)),
      'md_attribute_value_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('mdAttributeValue'), 'add_empty' => true)),
      'md_profile_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('mdProfile'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'object_id'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'object_class_name'     => new sfValidatorPass(array('required' => false)),
      'md_attribute_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('mdAttribute'), 'column' => 'id')),
      'md_attribute_value_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('mdAttributeValue'), 'column' => 'id')),
      'md_profile_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('mdProfile'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('md_attribute_object_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mdAttributeObject';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'object_id'             => 'Number',
      'object_class_name'     => 'Text',
      'md_attribute_id'       => 'ForeignKey',
      'md_attribute_value_id' => 'ForeignKey',
      'md_profile_id'         => 'ForeignKey',
    );
  }
}
