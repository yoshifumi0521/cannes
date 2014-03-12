<?php

/**
 * product actions.
 *
 * @package    cannes
 * @subpackage product
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class productActions extends sfActions
{
    public function preExecute()
    {
        //カンヌかヤングカンヌかどうか
        $this->yml_prize_type = sfConfig::get('app_cannes_prize_type');
        //賞の種類
        $this->yml_prize_detail = sfConfig::get('app_cannes_prize_detail');
        //賞のカテゴリー。cyber or fim
        $this->yml_prize_category = sfConfig::get('app_cannes_prize_category');
        //賞のタグ
        $this->yml_tag = sfConfig::get('app_cannes_tag_type');

        $context = sfContext::getInstance();
        $this->module_name = $context->getModuleName();
        $this->action_name = $context->getActionName();
    }


    public function executeIndex()
    {


    }

    public function executeList()
    {
        //カテゴリーを取り出す。
        $category_key = 1;
        $this->category = "cyber";
        foreach ( $this->yml_prize_category as $key => $value)
        {
            if($value == $this->getRequestParameter('category'))
            {
                $category_key = $key;
                $this->category = $this->getRequestParameter('category');
            }
        }

        //取り出す。
        $c = new Criteria();
        $c->add(ProductPeer::PRIZE_CATEGORY,$category_key);
        $this->products = ProductPeer::doSelect($c);


    }

    public function executeShow()
    {
        $this->product = ProductPeer::retrieveByPk($this->getRequestParameter('product_id'));
        $this->forward404Unless($this->product);
        $this->category = $this->yml_prize_category[$this->product->getPrizeCategory()];


    }

    public function executeCreate()
    {
        $this->product = new Product();
        //カテゴリーを取り出す。
        foreach ( $this->yml_prize_category as $key => $value)
        {
            if($value == $this->getRequestParameter('category'))
            {
                $category_key = $key;
            }
        }
        $this->product->setPrizeCategory($category_key);
        $this->category = $this->getRequestParameter('category');
        $this->setTemplate('edit');
    }

    public function executeEdit()
    {
        $this->product = ProductPeer::retrieveByPk($this->getRequestParameter('product_id'));
        $this->forward404Unless($this->product);
        $this->category = $this->yml_prize_category[$this->product->getPrizeCategory()];


    }

    public function executeUpdate()
    {
        if (!$this->getRequestParameter('id'))
        {
          $product = new Product();
        }
        else
        {
          $product = ProductPeer::retrieveByPk($this->getRequestParameter('id'));
          $this->forward404Unless($product);
        }

        $product->setId($this->getRequestParameter('id'));
        $product->setTitle($this->getRequestParameter('title'));
        $product->setClient($this->getRequestParameter('client'));
        $product->setAgency($this->getRequestParameter('agency'));
        $product->setPrize($this->getRequestParameter('prize'));
        $product->setUrl($this->getRequestParameter('url'));
        $product->setYoutubeLink($this->getRequestParameter('youtube_link'));
        $product->setYoutubeTag($this->getRequestParameter('youtube_tag'));
        $product->setSummary($this->getRequestParameter('summary'));
        $product->setBody($this->getRequestParameter('body'));
        $product->setImpression($this->getRequestParameter('impression'));
        $product->setMemo($this->getRequestParameter('memo'));
        $product->setPrizeType($this->getRequestParameter('prize_type'));
        $product->setPrizeYear($this->getRequestParameter('prize_year'));
        $product->setPrizeCategory($this->getRequestParameter('prize_category'));
        $product->setPrizeDetail($this->getRequestParameter('prize_detail'));

        $tag_text = "|";
        foreach ($this->getRequestParameter('tag_type_codes') as $key => $value)
        {
            $tag_text = $tag_text.$value."|";
        }
        $product->setTag($tag_text);
        //displayを1にする。
        $product->setDisplay(1);
        //保存する。
        $product->save();

        //イメージ画像をいれる。
        $alphabet = str_split('abcde');
        $image_json = $product->getImage()?json_decode($product->getImage(),true): array();
        $yml_image_size = sfConfig::get('app_image_size');
        foreach ( $alphabet as $key1 => $value1)
        {
          $image_name = 'image_'.$product->getId().$value1;
          if($this->getRequest()->getFilePath('image_'.$value1))
          {
            foreach ($yml_image_size as $key2 => $value2)
            {
              $image = new sfThumbnail($value2['x'],$value2['y']);
              $image->loadFile($this->getRequest()->getFilePath('image_'.$value1));
              $image->save(sfConfig::get('sf_upload_dir').'/product/'.$key2.'/'.$image_name.'.jpg', 'image/jpeg');
            }
            $image_json['image_'.$value1] = $image_name;
          }
        }
        $product->setImage(json_encode($image_json));
        $product->save();

        return $this->redirect('@product?product_id='.$product->getId());
    }


    public function executeDelete()
    {
        $product = ProductPeer::retrieveByPk($this->getRequestParameter('product_id'));
        $this->forward404Unless($product);
        $product->setDisplay(0);
        $product->save();
        return $this->redirect('@product_category_list?category='.$this->getRequestParameter('category'));
    }








}
