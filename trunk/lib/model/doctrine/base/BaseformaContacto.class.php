<?php

/**
 * BaseformaContacto
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $nombre
 * @property string $nota
 * @property integer $tiene_nota
 * @property Doctrine_Collection $alumnoPreparacion
 * 
 * @method integer             getId()                Returns the current record's "id" value
 * @method string              getNombre()            Returns the current record's "nombre" value
 * @method string              getNota()              Returns the current record's "nota" value
 * @method integer             getTieneNota()         Returns the current record's "tiene_nota" value
 * @method Doctrine_Collection getAlumnoPreparacion() Returns the current record's "alumnoPreparacion" collection
 * @method formaContacto       setId()                Sets the current record's "id" value
 * @method formaContacto       setNombre()            Sets the current record's "nombre" value
 * @method formaContacto       setNota()              Sets the current record's "nota" value
 * @method formaContacto       setTieneNota()         Sets the current record's "tiene_nota" value
 * @method formaContacto       setAlumnoPreparacion() Sets the current record's "alumnoPreparacion" collection
 * 
 * @package    instituto
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseformaContacto extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('forma_contacto');
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
        $this->hasColumn('nota', 'string', 128, array(
             'type' => 'string',
             'length' => '128',
             ));
        $this->hasColumn('tiene_nota', 'integer', 1, array(
             'type' => 'integer',
             'default' => '0',
             'notnull' => true,
             'length' => '1',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('alumnoPreparacion', array(
             'local' => 'id',
             'foreign' => 'forma_contacto_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}