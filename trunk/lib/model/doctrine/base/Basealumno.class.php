<?php

/**
 * Basealumno
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $nombre
 * @property string $apellido
 * @property string $telefono
 * @property string $celular
 * @property string $direccion
 * @property string $email
 * @property enum $sexo
 * @property Doctrine_Collection $alumnoPreparacion
 * @property Doctrine_Collection $horarioEstudiante
 * 
 * @method integer             getId()                Returns the current record's "id" value
 * @method string              getNombre()            Returns the current record's "nombre" value
 * @method string              getApellido()          Returns the current record's "apellido" value
 * @method string              getTelefono()          Returns the current record's "telefono" value
 * @method string              getCelular()           Returns the current record's "celular" value
 * @method string              getDireccion()         Returns the current record's "direccion" value
 * @method string              getEmail()             Returns the current record's "email" value
 * @method enum                getSexo()              Returns the current record's "sexo" value
 * @method Doctrine_Collection getAlumnoPreparacion() Returns the current record's "alumnoPreparacion" collection
 * @method Doctrine_Collection getHorarioEstudiante() Returns the current record's "horarioEstudiante" collection
 * @method alumno              setId()                Sets the current record's "id" value
 * @method alumno              setNombre()            Sets the current record's "nombre" value
 * @method alumno              setApellido()          Sets the current record's "apellido" value
 * @method alumno              setTelefono()          Sets the current record's "telefono" value
 * @method alumno              setCelular()           Sets the current record's "celular" value
 * @method alumno              setDireccion()         Sets the current record's "direccion" value
 * @method alumno              setEmail()             Sets the current record's "email" value
 * @method alumno              setSexo()              Sets the current record's "sexo" value
 * @method alumno              setAlumnoPreparacion() Sets the current record's "alumnoPreparacion" collection
 * @method alumno              setHorarioEstudiante() Sets the current record's "horarioEstudiante" collection
 * 
 * @package    instituto
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class Basealumno extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('alumno');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('nombre', 'string', 128, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '128',
             ));
        $this->hasColumn('apellido', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '255',
             ));
        $this->hasColumn('telefono', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('celular', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('direccion', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('email', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('sexo', 'enum', 2, array(
             'type' => 'enum',
             'length' => 2,
             'values' => 
             array(
              0 => 'M',
              1 => 'F',
             ),
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('alumnoPreparacion', array(
             'local' => 'id',
             'foreign' => 'alumno_id'));

        $this->hasMany('horarioEstudiante', array(
             'local' => 'id',
             'foreign' => 'alumno_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}