<?php

/**
 * mdMediaAlbumContent form base class.
 *
 * @method mdMediaAlbumContent getObject() Returns the current form's model object
 *
 * @package    instituto
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasemdMediaAlbumContentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'md_media_album_id'   => new sfWidgetFormInputHidden(),
      'md_media_content_id' => new sfWidgetFormInputHidden(),
      'object_class_name'   => new sfWidgetFormInputText(),
      'priority'            => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'md_media_album_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'md_media_album_id', 'required' => false)),
      'md_media_content_id' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'md_media_content_id', 'required' => false)),
      'object_class_name'   => new sfValidatorString(array('max_length' => 128)),
      'priority'            => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('md_media_album_content[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mdMediaAlbumContent';
  }

}