<?php

/**
 * preparacion form.
 *
 * @package    instituto
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class preparacionForm extends BasepreparacionForm {

    public function configure() {
        unset($this['created_at'], $this['updated_at']);


        $this->widgetSchema['inicio'] = new sfWidgetFormJQueryDate(array('culture' => 'es', 'date_widget' => new sfWidgetFormDate(array('format' => '%day% %month%
%year%'))));

        $this->widgetSchema['fin'] = new sfWidgetFormJQueryDate(array('culture' => 'es', 'date_widget' => new sfWidgetFormDate(array('format' => '%day% %month%
%year%'))));

        $minutes = array(0, 15, 30, 45);

        $this->widgetSchema['md_user_id'] =new sfWidgetFormInputHidden();

        $this->validatorSchema['md_user_id'] =new sfValidatorString();

        $this->widgetSchema['hora_inicio'] = new sfWidgetFormTime(array(
                    'minutes' => array_combine($minutes, $minutes),
                    'can_be_empty' => false,
                    'format' => '%minute% : %hour%',
                    'label' => 'Hora de inicio (min / mes)'
                ));

        $this->widgetSchema['hora_fin'] = new sfWidgetFormTime(array(
                    'minutes' => array_combine($minutes, $minutes),
                    'can_be_empty' => false,
                    'format' => '%minute% : %hour%',
                    'label' => 'Hora de fin (min / mes)'
                ));

        $this->validatorSchema['hora_inicio'] = new sfValidatorTime();

        $this->validatorSchema['hora_fin'] = new sfValidatorTime();
    }

}
