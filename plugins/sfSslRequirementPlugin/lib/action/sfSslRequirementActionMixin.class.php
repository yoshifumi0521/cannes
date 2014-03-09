<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @author     Jonathan H. Wage <jonwage@gmail.com>
 * @version    SVN: $Id: sfSslRequirementActionMixin.class.php 9095 2008-05-20 07:32:16Z fabien $
 */
class sfSslRequirementActionMixin
{
  static public function sslRequired($action)
  {
    $security = $action->getSecurityConfiguration();
    $actionName = $action->getActionName();

    if (isset($security[$actionName]['require_ssl']))
    {
      return $security[$actionName]['require_ssl'];
    }

    if (isset($security['all']['require_ssl']))
    {
      return $security['all']['require_ssl'];
    }

    return false;
  }

  static public function sslAllowed($action)
  {
    $security = $action->getSecurityConfiguration();
    $actionName = $action->getActionName();
    
    // If ssl is required, then we can assume they also want to allow it
    if (self::sslRequired($action))
    {
      return true;
    }
    
    if (isset($security[$actionName]['allow_ssl']))
    {
      return $security[$actionName]['allow_ssl'];
    }

    if (isset($security['all']['allow_ssl']))
    {
      return $security['all']['allow_ssl'];
    }

    return false;
  }
  
  static public function getSslUrl($action)
  {
    $security = $action->getSecurityConfiguration();
    $actionName = $action->getActionName();

    if (isset($security[$actionName]['ssl_domain']))
    {
      return $security[$actionName]['ssl_domain'].$action->getRequest()->getScriptName().$action->getRequest()->getPathInfo();
    }
    else if (isset($security['all']['ssl_domain']))
    {
      return $security['all']['ssl_domain'].$action->getRequest()->getScriptName().$action->getRequest()->getPathInfo();
    }
    else
    {
      return substr_replace($action->getRequest()->getUri(), 'https', 0, 4);
    }
  }
  
  static public function getNonSslUrl($action)
  {
    $security = $action->getSecurityConfiguration();
    $actionName = $action->getActionName();

    if (isset($security[$actionName]['non_ssl_domain']))
    {
      return $security[$actionName]['non_ssl_domain'].$action->getRequest()->getScriptName().$action->getRequest()->getPathInfo();
    }
    else if (isset($security['all']['non_ssl_domain']))
    {
      return $security['all']['non_ssl_domain'].$action->getRequest()->getScriptName().$action->getRequest()->getPathInfo();
    }
    else
    {
      return substr_replace($action->getRequest()->getUri(), 'http', 0, 5);
    }
  }
}