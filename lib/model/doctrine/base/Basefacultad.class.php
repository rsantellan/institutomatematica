<?php

/**
 * Basefacultad
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $nombre
 * @property Doctrine_Collection $materia
 * 
 * @method integer             getId()      Returns the current record's "id" value
 * @method string              getNombre()  Returns the current record's "nombre" value
 * @method Doctrine_Collection getMateria() Returns the current record's "materia" collection
 * @method facultad            setId()      Sets the current record's "id" value
 * @method facultad            setNombre()  Sets the current record's "nombre" value
 * @method facultad            setMateria() Sets the current record's "materia" collection
 * 
 * @package    instituto
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class Basefacultad extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('facultad');
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
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('materia', array(
             'local' => 'id',
             'foreign' => 'facultad_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}