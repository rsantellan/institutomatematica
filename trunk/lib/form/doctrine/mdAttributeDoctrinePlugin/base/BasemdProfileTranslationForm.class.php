<?php

/**
 * mdProfileTranslation form base class.
 *
 * @method mdProfileTranslation getObject() Returns the current form's model object
 *
 * @package    instituto
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasemdProfileTranslationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'display' => new sfWidgetFormInputText(),
      'lang'    => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'display' => new sfValidatorString(array('max_length' => 100)),
      'lang'    => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'lang', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('md_profile_translation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mdProfileTranslation';
  }

}
