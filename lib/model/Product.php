<?php

/**
 * Subclass for representing a row from the 'product' table.
 *
 *
 *
 * @package lib.model
 */
class Product extends BaseProduct
{
    public function __toString()
    {
        $title = $this->getTitle();
        return (string)$title;
    }


    //画像のパスを取得
    public function getImageTag($size='s', $place='a', $options='')
    {
        $id = $this->getId();
        // $image_name = 'image_'.$id.$place;
        $image_json = json_decode($this->getImage(), true);
        if(!empty($image_json['image_'.$place]))
        {
            return image_tag('/'.sfConfig::get('sf_upload_dir_name')."/product/{$size}/image_{$id}{$place}.jpg", $options);
        }
        else
        {
            return null;
        }
    }

    //画像のパスを取得
    public function getPrizeText()
    {
        //カンヌかヤングカンヌかどうか
        $yml_prize_type = sfConfig::get('app_cannes_prize_type');
        //賞の種類
        $yml_prize_detail = sfConfig::get('app_cannes_prize_detail');
        //賞のカテゴリー。cyber or fim
        $yml_prize_category = sfConfig::get('app_cannes_prize_category');

        if($this->getPrizeYear() && $this->getPrizeType() && $this->getPrizeDetail())
        {
            return $this->getPrizeYear()." ".ucwords($yml_prize_type[$this->getPrizeType()])." ".ucwords($yml_prize_detail[$this->getPrizeDetail()]);
        }
        else
        {
            return null;
        }

    }



}
