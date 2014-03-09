<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfPropelParanoidBehavior.class.php 4634 2007-07-16 20:19:09Z fabien $
 */
class sfPropelParanoidBehavior
{
  static protected $paranoidFlag = true;
  protected $paranoidFlags = array();

  public function doSelectRS($class, $criteria, $con = null)
  {
    $columnName = sfConfig::get('propel_behavior_paranoid_'.$class.'_column', 'display');

    if (self::$paranoidFlag)
    {
      // $query = call_user_func(array($class, 'translateFieldName'), $columnName, BasePeer::TYPE_FIELDNAME."= true";
      // $criteria->add(call_user_func(array($class, 'translateFieldName'), $columnName, BasePeer::TYPE_FIELDNAME, $query, Criteria::CUSTOM);
      $criteria->add(call_user_func(array($class, 'translateFieldName'), $columnName, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME),true);

      // $criteria->add(call_user_func(array($class, 'translateFieldName'), $columnName, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME), null, Criteria::ISNULL);
    }
    else
    {
      self::$paranoidFlag = true;
    }

    return false;
  }

  public function preDelete($object, $con = null)
  {
    if ($this->getParanoidFlag($object) || !self::$paranoidFlag)
    {
      self::$paranoidFlag = true;
      $this->setParanoidFlag($object, false);

      return false;
    }

    $class = get_class($object);
    $peerClass = get_class($object->getPeer());

    $columnName = sfConfig::get('propel_behavior_paranoid_'.$class.'_column', 'display');
    $method = 'set'.call_user_func(array($peerClass, 'translateFieldName'), $columnName, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME);
    $object->$method(false);
    $object->save();

    return true;
  }

  public function forceDelete($object, $con = null)
  {
    $this->setParanoidFlag($object);
    $object->delete($con);
  }

  protected function setParanoidFlag($object)
  {
    $this->paranoidFlags[get_class($object).'_'.$object->getPrimaryKey()] = true;
  }

  protected function getParanoidFlag($object)
  {
    $key = get_class($object).'_'.$object->getPrimaryKey();

    return isset($this->paranoidFlags[$key]) ? $this->paranoidFlags[$key] : false;
  }

  public static function disable()
  {
    self::$paranoidFlag = false;
  }
}
