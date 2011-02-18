<?php

/**
 * alumnoPreparacion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    instituto
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
class alumnoPreparacion extends BasealumnoPreparacion
{
  const TODOPAGO = 2;
  const MEDIOPAGO = 1;
  const SINPAGO = 0;
  public function retrievePaymentStatusInColor()
  {
    if($this->getPagoCompleto()) return 'green';
    if($this->getPago()) return 'yellow';
    return 'red';
  }

  public function hasPay()
  {
    if($this->getPagoCompleto()) return self::TODOPAGO;
    if($this->getPago()) return self::MEDIOPAGO;
    return self::SINPAGO;

  }

  public static function retrieveAllAlumnosByMateriaAndPeriodo($materiaId, $periodoId)
  {
      return Doctrine::getTable("alumnoPreparacion")->retrieveAllAlumnosByMateriaAndPeriodo($materiaId, $periodoId);
  }
}
