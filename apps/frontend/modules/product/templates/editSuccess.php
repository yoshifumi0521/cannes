<?php

  use_helper('Object');
  use_helper('Validation');
  use_helper('DateForm');
  //バリデーションのライブラリ
  use_javascript('validate.js');
  use_javascript('messages.js');

  if(!SF_DEBUG)
  {
    return;
  }

?>

<?php if($action_name == "create"): ?>
  <div class="page-header">
    <h2><?php echo strtoupper($category); ?>の作品追加</h2>
  </div>
<?php elseif($action_name == "edit"): ?>
  <div class="page-header">
    <h2><?php echo strtoupper($category); ?>の作品編集</h2>
    <h3><?php echo $product->getTitle(); ?></h3>

    <?php if($category == "film" ): ?>

      <?php echo $product->getYoutubeLink(); ?>

    <?php elseif($category == "cyber"): ?>
      <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="1000" height="800" align="middle">
        <param name="allowScriptAccess" value="sameDomain" />
        <param name="movie" value="/uploads/product/swf/swf_<?php echo $product->getId(); ?>a.swf" />
        <param name="quality" value="autolow" />
        <embed src="/uploads/product/swf/swf_<?php echo $product->getId(); ?>a.swf" quality="autolow" width="800" height="600" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
      </object>
    <?php elseif($category == "press"): ?>



    <?php endif; ?>

  </div>

<?php endif; ?>

<?php echo form_tag('@update_product?category='.$category,array('id'=>'form','enctype' => 'multipart/form-data')) ?>

<?php echo object_input_hidden_tag($product, 'getId') ?>

<table>
  <tbody>
    <tr>
      <th>タイトル:</th>
      <td>
        <?php echo object_input_tag($product, 'getTitle', array (
          'size' => 200,
          'class'=>'span6',
        )) ?>
          <label style="color: red" class="error" for="title" generated="true"></label>
        </span>
      </td>
    </tr>
    <tr>
      <th>クライアント:</th>
      <td>
        <?php echo object_input_tag($product, 'getClient', array (
          'size' => 200,
          'class'=>'span6'
        )) ?>
      </td>
    </tr>
    <tr>
      <th>代理店:</th>
      <td>
        <?php echo object_input_tag($product, 'getAgency', array (
          'size' => 200,
          'class'=>'span6'
        )) ?>
      </td>
    </tr>
    <tr>
      <th>Cannes or Young Lions:</th>
      <td>
        <?php echo select_tag('prize_type',options_for_select($yml_prize_type,$product->getPrizeType())); ?>
      </td>
    </tr>
    <tr>
    <tr>
      <th>部門:</th>
      <td>
        <?php echo select_tag('prize_category',options_for_select($yml_prize_category,$product->getPrizeCategory())); ?>
      </td>
    </tr>
    <tr>
    <tr>
      <th>受賞年:</th>
      <td>
        <?php
          $default_year = $product->getPrizeYear()?$product->getPrizeYear():0;
          $start_year = 2000;
          $end_year = date("Y");
        ?>
        <?php echo select_year_tag('prize_year',$default_year , 'include_custom=not available year_start=2000 year_end='.$end_year) ?>
      </td>
    </tr>
    <tr>
      <tr>
      <th>賞: </th>
      <td>
        <?php echo select_tag('prize_detail',options_for_select($yml_prize_detail,$product->getPrizeDetail())); ?>
      </td>
    </tr>
    <tr>
      <th>Url:</th>
      <td>
        <?php echo object_input_tag($product, 'getUrl', array (
          'size' => '200x10',
          'class'=>'span6',
        )) ?>
      </td>
    </tr>
    <tr>
      <th>画像:</th>
      <td>
        <?php echo input_file_tag("image_a"); ?>
        <label style="color: red" class="error" for="image_a" generated="true"></label>
      </td>
    </tr>

    <?php if($category == "cyber" ): ?>
      <tr>
        <th>SFWファイル:</th>
        <td>
          <?php echo input_file_tag("swf"); ?>
          <label style="color: red" class="error" for="swf" generated="true"></label>
        </td>
      </tr>
    <?php endif; ?>

    <?php if($category == "film" ): ?>
      <tr>
        <th>YouTubeのリンク:</th>
        <td>
          <?php echo object_input_tag($product, 'getYoutubeLink', array (
            'size' => 200,
            'class'=>'span6'
          )) ?>
        </td>
      </tr>
      <tr>
        <th>YouTubeのタグ:</th>
        <td>
          <?php echo object_textarea_tag($product, 'getYoutubeTag', array (
            'size' => '202x10',
            'class'=>'span6',
          )) ?>
        </td>
      </tr>
    <?php endif; ?>

    <?php if($category == "press" ): ?>
      <tr>
        <th>画像2:</th>
        <td>
          <?php echo input_file_tag("image_a"); ?>
          <label style="color: red" class="error" for="image_a" generated="true"></label>
        </td>
      </tr>
      <tr>
        <th>画像3:</th>
        <td>
          <?php echo input_file_tag("image_a"); ?>
          <label style="color: red" class="error" for="image_a" generated="true"></label>
        </td>
      </tr>
    <?php endif; ?>

    <tr>
      <th>概要:</th>
      <td>
        <?php echo object_input_tag($product, 'getSummary', array (
          'size' => 200,
          'class'=>'span6'
        )) ?>
        <label style="color: red" class="error" for="summary" generated="true"></label>
      </td>
    </tr>
    <tr>
      <th>内容:</th>
      <td>
        <?php echo object_textarea_tag($product, 'getBody', array (
          'size' => '200x5',
          'class'=>'span6',
        )) ?>
      </td>
    </tr>
    <tr>
      <th>感想:</th>
      <td>
        <?php echo object_textarea_tag($product, 'getImpression', array (
          'size' => '200x10',
          'class'=>'span6',
        )) ?>
        <label style="color: red" class="error" for="impression" generated="true"></label>
      </td>
    </tr>
    <tr>
      <th>メモ:</th>
      <td>
        <?php echo object_textarea_tag($product, 'getMemo', array (
          'size' => '202x10',
          'class'=>'span6',
        )) ?>
      </td>
    </tr>
    <tr>
      <th>タグ:</th>
      <td>
        <?php $has_tag_codes = explode("|",$product->getTag()); ?>
        <?php foreach($yml_tag as $key => $value): ?>
          <label for='<?php echo $key?>'><?php echo checkbox_tag("tag_type_codes[]", $value,in_array($value,$has_tag_codes),array('id'=>$key)) ?><?php echo $value ?></br>
        <?php endforeach; ?>
      </td>
    </tr>



  </tbody>
</table>
<hr />
  <?php echo submit_tag('保存する') ?>

  <?php if ($product->getId()): ?>
    &nbsp;<?php echo link_to('削除', 'product/delete?product_id='.$product->getId()."&category=".$category, 'post=true&confirm=Are you sure?') ?>
    &nbsp;<?php echo link_to('キャンセル', '@product?product_id='.$product->getId()) ?>
  <?php else: ?>
    &nbsp;<?php echo link_to('キャンセル', '@product_category_list?category='.$category) ?>
  <?php endif; ?>
</form>

<script>
  $(document).ready(function(){
    //バリデーションをはる。
    $('#form').validate({
      rules : {
        title: {
          required: true
        },
        summary: {
          required: true
        },
        impression: {
          required: true
        },
        // image_a: {
        //   required: true
        // },
        // swf: {
        //   required: true
        // }
      },
      messages: {
        // 'job_type_codes[]': {
        //   required: '1つ以上選択してください'
        // }
      }
    });
  });

</script>


