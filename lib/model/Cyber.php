<?php

/**
 * Subclass for representing a row from the 'civer' table.
 *
 *
 *
 * @package lib.model
 */
class Cyber extends BaseCyber
{
    public function __toString()
    {
      $title = $this->getTitle();
      /*
      if (SF_DEBUG && !empty(sfConfig::get('app_admin_perms')) && in_array($this->getUserId(),array_keys(sfConfig::get('app_admin_perms')))) {
        $title = '(debug)'.$title;
      }
      */
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
            return image_tag('/'.sfConfig::get('sf_upload_dir_name')."/cyber/{$size}/image_{$id}{$place}.jpg", $options);
        }
        else
        {
            return null;
        }
    }








}
