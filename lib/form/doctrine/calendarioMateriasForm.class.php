<?php

/**
 * calendarioMaterias form.
 *
 * @package    instituto
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class calendarioMateriasForm extends BasecalendarioMateriasForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at']);
    $this->widgetSchema['hour'] = new sfWidgetFormSelect(array('choices' => calendarioMaterias::$hours));
    $this->widgetSchema['minutes'] = new sfWidgetFormSelect(array('choices' => calendarioMaterias::$minutes));
  }
}
