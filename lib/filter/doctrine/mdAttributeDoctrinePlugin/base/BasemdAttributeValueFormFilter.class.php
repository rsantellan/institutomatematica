<?php

/**
 * mdAttributeValue filter form base class.
 *
 * @package    instituto
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasemdAttributeValueFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'md_attribute_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('mdAttribute'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'md_attribute_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('mdAttribute'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('md_attribute_value_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mdAttributeValue';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'md_attribute_id' => 'ForeignKey',
    );
  }
}
