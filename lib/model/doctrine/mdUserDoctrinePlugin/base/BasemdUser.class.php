<?php

/**
 * BasemdUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $email
 * @property integer $super_admin
 * @property timestamp $deleted_at
 * @property Doctrine_Collection $mdContent
 * @property Doctrine_Collection $mdPassport
 * @property Doctrine_Collection $mdUserSearch
 * @property Doctrine_Collection $preparacion
 * @property Doctrine_Collection $encargados
 * 
 * @method integer             getId()           Returns the current record's "id" value
 * @method string              getEmail()        Returns the current record's "email" value
 * @method integer             getSuperAdmin()   Returns the current record's "super_admin" value
 * @method timestamp           getDeletedAt()    Returns the current record's "deleted_at" value
 * @method Doctrine_Collection getMdContent()    Returns the current record's "mdContent" collection
 * @method Doctrine_Collection getMdPassport()   Returns the current record's "mdPassport" collection
 * @method Doctrine_Collection getMdUserSearch() Returns the current record's "mdUserSearch" collection
 * @method Doctrine_Collection getPreparacion()  Returns the current record's "preparacion" collection
 * @method Doctrine_Collection getEncargados()   Returns the current record's "encargados" collection
 * @method mdUser              setId()           Sets the current record's "id" value
 * @method mdUser              setEmail()        Sets the current record's "email" value
 * @method mdUser              setSuperAdmin()   Sets the current record's "super_admin" value
 * @method mdUser              setDeletedAt()    Sets the current record's "deleted_at" value
 * @method mdUser              setMdContent()    Sets the current record's "mdContent" collection
 * @method mdUser              setMdPassport()   Sets the current record's "mdPassport" collection
 * @method mdUser              setMdUserSearch() Sets the current record's "mdUserSearch" collection
 * @method mdUser              setPreparacion()  Sets the current record's "preparacion" collection
 * @method mdUser              setEncargados()   Sets the current record's "encargados" collection
 * 
 * @package    instituto
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasemdUser extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('md_user');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('email', 'string', 128, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 128,
             ));
        $this->hasColumn('super_admin', 'integer', 1, array(
             'type' => 'integer',
             'default' => '0',
             'notnull' => true,
             'length' => 1,
             ));
        $this->hasColumn('deleted_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'length' => 25,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('mdContent', array(
             'local' => 'id',
             'foreign' => 'md_user_id'));

        $this->hasMany('mdPassport', array(
             'local' => 'id',
             'foreign' => 'md_user_id'));

        $this->hasMany('mdUserSearch', array(
             'local' => 'id',
             'foreign' => 'md_user_id'));

        $this->hasMany('preparacion', array(
             'local' => 'id',
             'foreign' => 'md_user_id'));

        $this->hasMany('encargados', array(
             'local' => 'id',
             'foreign' => 'md_user_responsable_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}