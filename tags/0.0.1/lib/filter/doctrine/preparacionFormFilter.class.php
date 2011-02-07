<?php

/**
 * preparacion filter form.
 *
 * @package    instituto
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class preparacionFormFilter extends BasepreparacionFormFilter
{
  public function configure()
  {
    unset($this['updated_at'], $this['created_at'], $this['materia_id'], $this['evaluacion_id']);
    $this->widgetSchema['docente_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('docente'), 'add_empty' => false));
    $this->widgetSchema['periodo'] = new sfWidgetFormFilterDate(array(
        'from_date' => new sfWidgetFormJQueryDate(array('culture'=>'es', 'date_widget' => new sfWidgetFormDate(array('format' => '%day% %month%  
%year%')) )),
        'to_date' => new sfWidgetFormJQueryDate(array('culture'=>'es', 'date_widget' => new sfWidgetFormDate(array('format' => '%day% %month%  
%year%')) )),
        'with_empty' => false,
        'template' => '<table><tr><td>Desde</td><td>%from_date%</td></tr><tr><td>Hasta</td><td>%to_date%</td></tr></table>'
    ));

    $this->validatorSchema['periodo'] = new sfValidatorDateRange(
                                        array(
                                          'required' => false, 
                                          'from_date' => new sfValidatorDate(
                                                          array(
                                                            'required' => false
                                                                )
                                                          ), 
                                          'to_date' => new sfValidatorDateTime(
                                                          array(
                                                            'required' => false
                                                          )
                                                        )
                                            )
                                        );
  }
}
