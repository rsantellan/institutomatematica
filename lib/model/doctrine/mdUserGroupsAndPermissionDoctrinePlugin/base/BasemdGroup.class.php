<?php

/**
 * BasemdGroup
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property Doctrine_Collection $permissions
 * @property Doctrine_Collection $mdGroupPermission
 * @property Doctrine_Collection $mdPassportGroup
 * 
 * @method integer             getId()                Returns the current record's "id" value
 * @method string              getName()              Returns the current record's "name" value
 * @method string              getDescription()       Returns the current record's "description" value
 * @method Doctrine_Collection getPermissions()       Returns the current record's "permissions" collection
 * @method Doctrine_Collection getMdGroupPermission() Returns the current record's "mdGroupPermission" collection
 * @method Doctrine_Collection getMdPassportGroup()   Returns the current record's "mdPassportGroup" collection
 * @method mdGroup             setId()                Sets the current record's "id" value
 * @method mdGroup             setName()              Sets the current record's "name" value
 * @method mdGroup             setDescription()       Sets the current record's "description" value
 * @method mdGroup             setPermissions()       Sets the current record's "permissions" collection
 * @method mdGroup             setMdGroupPermission() Sets the current record's "mdGroupPermission" collection
 * @method mdGroup             setMdPassportGroup()   Sets the current record's "mdPassportGroup" collection
 * 
 * @package    instituto
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasemdGroup extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('md_group');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'unique' => true,
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('description', 'string', 1000, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 1000,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('mdPermission as permissions', array(
             'refClass' => 'mdGroupPermission',
             'local' => 'group_id',
             'foreign' => 'permission_id'));

        $this->hasMany('mdGroupPermission', array(
             'local' => 'id',
             'foreign' => 'group_id'));

        $this->hasMany('mdPassportGroup', array(
             'local' => 'id',
             'foreign' => 'md_group_id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}