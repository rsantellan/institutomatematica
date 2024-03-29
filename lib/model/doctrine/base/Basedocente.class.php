<?php

/**
 * Basedocente
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $nombre
 * 
 * @method integer getId()     Returns the current record's "id" value
 * @method string  getNombre() Returns the current record's "nombre" value
 * @method docente setId()     Sets the current record's "id" value
 * @method docente setNombre() Sets the current record's "nombre" value
 * 
 * @package    instituto
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class Basedocente extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('docente');
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
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}