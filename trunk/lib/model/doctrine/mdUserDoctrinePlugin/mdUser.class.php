<?php

/**
 * mdUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    instituto
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
class mdUser extends PluginmdUser
{
  public function __toString()
  {
    return $this->getMdUserProfile()->getFullName();
  }
}