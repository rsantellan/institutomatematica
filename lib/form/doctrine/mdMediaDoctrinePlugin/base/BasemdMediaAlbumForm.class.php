<?php

/**
 * mdMediaAlbum form base class.
 *
 * @method mdMediaAlbum getObject() Returns the current form's model object
 *
 * @package    instituto
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasemdMediaAlbumForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'md_media_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('mdMedia'), 'add_empty' => true)),
      'title'               => new sfWidgetFormInputText(),
      'description'         => new sfWidgetFormInputText(),
      'type'                => new sfWidgetFormChoice(array('choices' => array('Image' => 'Image', 'Video' => 'Video', 'File' => 'File', 'Mixed' => 'Mixed'))),
      'deleteAllowed'       => new sfWidgetFormInputText(),
      'md_media_content_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('mdMediaContent'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'md_media_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('mdMedia'), 'required' => false)),
      'title'               => new sfValidatorString(array('max_length' => 64)),
      'description'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'type'                => new sfValidatorChoice(array('choices' => array('Image' => 'Image', 'Video' => 'Video', 'File' => 'File', 'Mixed' => 'Mixed'), 'required' => false)),
      'deleteAllowed'       => new sfValidatorPass(),
      'md_media_content_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('mdMediaContent'), 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'mdMediaAlbum', 'column' => array('md_media_id', 'title')))
    );

    $this->widgetSchema->setNameFormat('md_media_album[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mdMediaAlbum';
  }

}
