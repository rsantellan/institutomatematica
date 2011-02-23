<?php

/**
 * BasecalendarioMaterias
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property enum $day
 * @property integer $hour
 * @property integer $minutes
 * @property integer $preparacion_id
 * @property integer $duration
 * @property preparacion $preparacion
 * @property Doctrine_Collection $horarioEstudiante
 * 
 * @method integer             getId()                Returns the current record's "id" value
 * @method enum                getDay()               Returns the current record's "day" value
 * @method integer             getHour()              Returns the current record's "hour" value
 * @method integer             getMinutes()           Returns the current record's "minutes" value
 * @method integer             getPreparacionId()     Returns the current record's "preparacion_id" value
 * @method integer             getDuration()          Returns the current record's "duration" value
 * @method preparacion         getPreparacion()       Returns the current record's "preparacion" value
 * @method Doctrine_Collection getHorarioEstudiante() Returns the current record's "horarioEstudiante" collection
 * @method calendarioMaterias  setId()                Sets the current record's "id" value
 * @method calendarioMaterias  setDay()               Sets the current record's "day" value
 * @method calendarioMaterias  setHour()              Sets the current record's "hour" value
 * @method calendarioMaterias  setMinutes()           Sets the current record's "minutes" value
 * @method calendarioMaterias  setPreparacionId()     Sets the current record's "preparacion_id" value
 * @method calendarioMaterias  setDuration()          Sets the current record's "duration" value
 * @method calendarioMaterias  setPreparacion()       Sets the current record's "preparacion" value
 * @method calendarioMaterias  setHorarioEstudiante() Sets the current record's "horarioEstudiante" collection
 * 
 * @package    instituto
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BasecalendarioMaterias extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('calendario_materias');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('day', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'lunes',
              1 => 'martes',
              2 => 'miercoles',
              3 => 'jueves',
              4 => 'viernes',
              5 => 'sabado',
              6 => 'domingo',
             ),
             ));
        $this->hasColumn('hour', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => '4',
             ));
        $this->hasColumn('minutes', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => '4',
             ));
        $this->hasColumn('preparacion_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => '4',
             ));
        $this->hasColumn('duration', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => '4',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('preparacion', array(
             'local' => 'preparacion_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('horarioEstudiante', array(
             'local' => 'id',
             'foreign' => 'horario_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}