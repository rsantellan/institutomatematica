<?php

/**
 * mdMediaVideo filter form base class.
 *
 * @package    instituto
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasemdMediaVideoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'filename'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'duration'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'type'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description' => new sfWidgetFormFilterInput(),
      'path'        => new sfWidgetFormFilterInput(),
      'avatar'      => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'        => new sfValidatorPass(array('required' => false)),
      'filename'    => new sfValidatorPass(array('required' => false)),
      'duration'    => new sfValidatorPass(array('required' => false)),
      'type'        => new sfValidatorPass(array('required' => false)),
      'description' => new sfValidatorPass(array('required' => false)),
      'path'        => new sfValidatorPass(array('required' => false)),
      'avatar'      => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('md_media_video_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mdMediaVideo';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'name'        => 'Text',
      'filename'    => 'Text',
      'duration'    => 'Text',
      'type'        => 'Text',
      'description' => 'Text',
      'path'        => 'Text',
      'avatar'      => 'Text',
    );
  }
}
