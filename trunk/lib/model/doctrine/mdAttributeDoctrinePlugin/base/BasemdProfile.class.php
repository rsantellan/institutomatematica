<?php

/**
 * BasemdProfile
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property string $object_class_name
 * @property string $display
 * @property Doctrine_Collection $mdProfileAttribute
 * @property Doctrine_Collection $mdAttributeObject
 * @property Doctrine_Collection $mdProfileObject
 * 
 * @method integer             getId()                 Returns the current record's "id" value
 * @method string              getName()               Returns the current record's "name" value
 * @method string              getObjectClassName()    Returns the current record's "object_class_name" value
 * @method string              getDisplay()            Returns the current record's "display" value
 * @method Doctrine_Collection getMdProfileAttribute() Returns the current record's "mdProfileAttribute" collection
 * @method Doctrine_Collection getMdAttributeObject()  Returns the current record's "mdAttributeObject" collection
 * @method Doctrine_Collection getMdProfileObject()    Returns the current record's "mdProfileObject" collection
 * @method mdProfile           setId()                 Sets the current record's "id" value
 * @method mdProfile           setName()               Sets the current record's "name" value
 * @method mdProfile           setObjectClassName()    Sets the current record's "object_class_name" value
 * @method mdProfile           setDisplay()            Sets the current record's "display" value
 * @method mdProfile           setMdProfileAttribute() Sets the current record's "mdProfileAttribute" collection
 * @method mdProfile           setMdAttributeObject()  Sets the current record's "mdAttributeObject" collection
 * @method mdProfile           setMdProfileObject()    Sets the current record's "mdProfileObject" collection
 * 
 * @package    instituto
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BasemdProfile extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('md_profile');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('name', 'string', 32, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '32',
             ));
        $this->hasColumn('object_class_name', 'string', 128, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '128',
             ));
        $this->hasColumn('display', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '100',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('mdProfileAttribute', array(
             'local' => 'id',
             'foreign' => 'md_profile_id'));

        $this->hasMany('mdAttributeObject', array(
             'local' => 'id',
             'foreign' => 'md_profile_id'));

        $this->hasMany('mdProfileObject', array(
             'local' => 'id',
             'foreign' => 'md_profile_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $mdi18nbehavior0 = new mdI18nBehavior();
        $i18n0 = new Doctrine_Template_I18n(array(
             'fields' => 
             array(
              0 => 'display',
             ),
             ));
        $this->actAs($timestampable0);
        $this->actAs($mdi18nbehavior0);
        $this->actAs($i18n0);
    }
}