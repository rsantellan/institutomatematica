<?php

/**
 * mdContentRelation filter form base class.
 *
 * @package    instituto
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasemdContentRelationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'object_class_name'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'profile_name'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'object_class_name'    => new sfValidatorPass(array('required' => false)),
      'profile_name'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('md_content_relation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mdContentRelation';
  }

  public function getFields()
  {
    return array(
      'md_content_id_first'  => 'Number',
      'md_content_id_second' => 'Number',
      'object_class_name'    => 'Text',
      'profile_name'         => 'Text',
    );
  }
}
