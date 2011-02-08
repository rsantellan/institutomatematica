<?php

/**
 * alumnoPreparacion form.
 *
 * @package    instituto
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class alumnoPreparacionPagosForm extends BasealumnoPreparacionForm
{
  public function configure()
  {
    unset(
      $this['nota_contacto'],
      $this['forma_contacto_id'],
      $this['resultado'],
      $this['resultado'],
      $this['created_at'],
      $this['updated_at']
    );
  }
}
