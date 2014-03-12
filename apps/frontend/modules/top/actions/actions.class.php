<?php

/**
 * top actions.
 *
 * @package    youngcannes
 * @subpackage top
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class topActions extends sfActions
{
    /**
    * Executes index action
    *
    */
    public function preExecute()
    {
        // //カンヌかヤングカンヌかどうか
        // $this->yml_prize_type = sfConfig::get('app_cannes_prize_type');
        // //賞の種類
        // $this->yml_prize_detail = sfConfig::get('app_cannes_prize_detail');
        // //賞のカテゴリー。cyber or fim
        // $this->yml_prize_category = sfConfig::get('app_cannes_prize_category');
        // //賞のタグ
        // $this->yml_tag = sfConfig::get('app_cannes_tag_type');

        $context = sfContext::getInstance();
        $this->module_name = $context->getModuleName();
        $this->action_name = $context->getActionName();
    }

    public function executeIndex()
    {
        $c = new Criteria();
        $this->products = ProductPeer::doSelect($c);

        return $this->setTemplate(sfConfig::get('sf_app_dir')."/templates/list");
    }




}
