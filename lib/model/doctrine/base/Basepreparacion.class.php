<?php

/**
 * Basepreparacion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $materia_id
 * @property integer $md_user_id
 * @property integer $evaluacion_id
 * @property integer $periodo_id
 * @property timestamp $inicio
 * @property timestamp $fin
 * @property integer $costo_clase
 * @property integer $costo_total
 * @property string $hora_inicio
 * @property string $hora_fin
 * @property materia $materia
 * @property mdUser $mdUser
 * @property evaluacion $evaluacion
 * @property periodo $periodo
 * @property Doctrine_Collection $alumnoPreparacion
 * @property Doctrine_Collection $calendarioMaterias
 * 
 * @method integer             getId()                 Returns the current record's "id" value
 * @method integer             getMateriaId()          Returns the current record's "materia_id" value
 * @method integer             getMdUserId()           Returns the current record's "md_user_id" value
 * @method integer             getEvaluacionId()       Returns the current record's "evaluacion_id" value
 * @method integer             getPeriodoId()          Returns the current record's "periodo_id" value
 * @method timestamp           getInicio()             Returns the current record's "inicio" value
 * @method timestamp           getFin()                Returns the current record's "fin" value
 * @method integer             getCostoClase()         Returns the current record's "costo_clase" value
 * @method integer             getCostoTotal()         Returns the current record's "costo_total" value
 * @method string              getHoraInicio()         Returns the current record's "hora_inicio" value
 * @method string              getHoraFin()            Returns the current record's "hora_fin" value
 * @method materia             getMateria()            Returns the current record's "materia" value
 * @method mdUser              getMdUser()             Returns the current record's "mdUser" value
 * @method evaluacion          getEvaluacion()         Returns the current record's "evaluacion" value
 * @method periodo             getPeriodo()            Returns the current record's "periodo" value
 * @method Doctrine_Collection getAlumnoPreparacion()  Returns the current record's "alumnoPreparacion" collection
 * @method Doctrine_Collection getCalendarioMaterias() Returns the current record's "calendarioMaterias" collection
 * @method preparacion         setId()                 Sets the current record's "id" value
 * @method preparacion         setMateriaId()          Sets the current record's "materia_id" value
 * @method preparacion         setMdUserId()           Sets the current record's "md_user_id" value
 * @method preparacion         setEvaluacionId()       Sets the current record's "evaluacion_id" value
 * @method preparacion         setPeriodoId()          Sets the current record's "periodo_id" value
 * @method preparacion         setInicio()             Sets the current record's "inicio" value
 * @method preparacion         setFin()                Sets the current record's "fin" value
 * @method preparacion         setCostoClase()         Sets the current record's "costo_clase" value
 * @method preparacion         setCostoTotal()         Sets the current record's "costo_total" value
 * @method preparacion         setHoraInicio()         Sets the current record's "hora_inicio" value
 * @method preparacion         setHoraFin()            Sets the current record's "hora_fin" value
 * @method preparacion         setMateria()            Sets the current record's "materia" value
 * @method preparacion         setMdUser()             Sets the current record's "mdUser" value
 * @method preparacion         setEvaluacion()         Sets the current record's "evaluacion" value
 * @method preparacion         setPeriodo()            Sets the current record's "periodo" value
 * @method preparacion         setAlumnoPreparacion()  Sets the current record's "alumnoPreparacion" collection
 * @method preparacion         setCalendarioMaterias() Sets the current record's "calendarioMaterias" collection
 * 
 * @package    instituto
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class Basepreparacion extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('preparacion');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('materia_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => '4',
             ));
        $this->hasColumn('md_user_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => '4',
             ));
        $this->hasColumn('evaluacion_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => '4',
             ));
        $this->hasColumn('periodo_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => '4',
             ));
        $this->hasColumn('inicio', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             ));
        $this->hasColumn('fin', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             ));
        $this->hasColumn('costo_clase', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'default' => 0,
             'length' => '4',
             ));
        $this->hasColumn('costo_total', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'default' => 0,
             'length' => '4',
             ));
        $this->hasColumn('hora_inicio', 'string', 64, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '64',
             ));
        $this->hasColumn('hora_fin', 'string', 64, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '64',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('materia', array(
             'local' => 'materia_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('mdUser', array(
             'local' => 'md_user_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('evaluacion', array(
             'local' => 'evaluacion_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('periodo', array(
             'local' => 'periodo_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('alumnoPreparacion', array(
             'local' => 'id',
             'foreign' => 'preparacion_id'));

        $this->hasMany('calendarioMaterias', array(
             'local' => 'id',
             'foreign' => 'preparacion_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}