<?php

/**
 * mdMediaAlbumContent filter form base class.
 *
 * @package    instituto
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasemdMediaAlbumContentFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'object_class_name'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'priority'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'object_class_name'   => new sfValidatorPass(array('required' => false)),
      'priority'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('md_media_album_content_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mdMediaAlbumContent';
  }

  public function getFields()
  {
    return array(
      'md_media_album_id'   => 'Number',
      'md_media_content_id' => 'Number',
      'object_class_name'   => 'Text',
      'priority'            => 'Number',
    );
  }
}
