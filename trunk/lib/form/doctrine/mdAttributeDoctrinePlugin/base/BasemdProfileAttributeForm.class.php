<?php

/**
 * mdProfileAttribute form base class.
 *
 * @method mdProfileAttribute getObject() Returns the current form's model object
 *
 * @package    instituto
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasemdProfileAttributeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'md_attribute_id' => new sfWidgetFormInputHidden(),
      'md_profile_id'   => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'md_attribute_id' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'md_attribute_id', 'required' => false)),
      'md_profile_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'md_profile_id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('md_profile_attribute[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mdProfileAttribute';
  }

}
