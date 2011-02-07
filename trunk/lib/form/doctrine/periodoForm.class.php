<?php

/**
 * periodo form.
 *
 * @package    instituto
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class periodoForm extends BaseperiodoForm {

    public function configure() {
        unset($this['created_at'], $this['updated_at']);
        $this->widgetSchema['inicio'] = new sfWidgetFormJQueryDate(array('culture' => 'es', 'date_widget' => new sfWidgetFormDate(array('format' => '%day% %month%
%year%'))));
    
        $this->widgetSchema['fin'] = new sfWidgetFormJQueryDate(array('culture' => 'es', 'date_widget' => new sfWidgetFormDate(array('format' => '%day% %month%
%year%'))));
    }
}
