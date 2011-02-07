<?php

/**
 * BasemdGroupPermission
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $group_id
 * @property integer $permission_id
 * @property mdGroup $mdGroup
 * @property mdPermission $mdPermission
 * 
 * @method integer           getGroupId()       Returns the current record's "group_id" value
 * @method integer           getPermissionId()  Returns the current record's "permission_id" value
 * @method mdGroup           getMdGroup()       Returns the current record's "mdGroup" value
 * @method mdPermission      getMdPermission()  Returns the current record's "mdPermission" value
 * @method mdGroupPermission setGroupId()       Sets the current record's "group_id" value
 * @method mdGroupPermission setPermissionId()  Sets the current record's "permission_id" value
 * @method mdGroupPermission setMdGroup()       Sets the current record's "mdGroup" value
 * @method mdGroupPermission setMdPermission()  Sets the current record's "mdPermission" value
 * 
 * @package    instituto
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BasemdGroupPermission extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('md_group_permission');
        $this->hasColumn('group_id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'length' => '4',
             ));
        $this->hasColumn('permission_id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'length' => '4',
             ));

        $this->option('symfony', array(
             'form' => false,
             'filter' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('mdGroup', array(
             'local' => 'group_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('mdPermission', array(
             'local' => 'permission_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}