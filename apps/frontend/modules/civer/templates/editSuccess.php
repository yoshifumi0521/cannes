<?php

  use_helper('Object');
  use_helper('Validation');
  //バリデーションのライブラリ
  use_javascript('validate.js');
  use_javascript('messages.js');

?>

<?php echo form_tag('civer/update',array('id'=>'form','enctype' => 'multipart/form-data')) ?>

<?php echo object_input_hidden_tag($civer, 'getId') ?>

<table>
  <tbody>
    <tr>
      <th>タイトル:</th>
      <td>
        <?php echo object_input_tag($civer, 'getTitle', array (
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
        <?php echo object_input_tag($civer, 'getClient', array (
          'size' => 200,
          'class'=>'span6'
        )) ?>
      </td>
    </tr>
    <tr>
      <th>代理店:</th>
      <td>
        <?php echo object_input_tag($civer, 'getAgency', array (
          'size' => 200,
          'class'=>'span6'
        )) ?>
      </td>
    </tr>
    <tr>
      <th>受賞:</th>
      <td>
        <?php echo object_input_tag($civer, 'getPrize', array (
          'size' => 200,
          'class'=>'span6'
        )) ?>
      </td>
    </tr>
    <tr>
      <th>Url:</th>
      <td>
        <?php echo object_input_tag($civer, 'getUrl', array (
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
    <tr>
      <th>SFWファイル:</th>
      <td>
        <?php echo input_file_tag("swf"); ?>
        <label style="color: red" class="error" for="swf" generated="true"></label>
      </td>
    </tr>
    <tr>
      <th>概要:</th>
      <td>
        <?php echo object_input_tag($civer, 'getSummary', array (
          'size' => 200,
          'class'=>'span6'
        )) ?>
        <label style="color: red" class="error" for="summary" generated="true"></label>
      </td>
    </tr>
    <tr>
      <th>内容:</th>
      <td>
        <?php echo object_textarea_tag($civer, 'getBody', array (
          'size' => '200x5',
          'class'=>'span6',
        )) ?>
      </td>
    </tr>
    <tr>
      <th>感想:</th>
      <td>
        <?php echo object_textarea_tag($civer, 'getImpression', array (
          'size' => '200x10',
          'class'=>'span6',
        )) ?>
        <label style="color: red" class="error" for="impression" generated="true"></label>
      </td>
    </tr>
    <tr>
      <th>メモ:</th>
      <td>
        <?php echo object_textarea_tag($civer, 'getMemo', array (
          'size' => '202x10',
          'class'=>'span6',
        )) ?>
      </td>
    </tr>
    <!-- <tr>
      <th>Display:</th>
      <td><?php echo object_input_tag($civer, 'getDisplay', array (
      'size' => 7,
    )) ?></td>
    </tr> -->



  </tbody>
</table>
<hr />
  <?php echo submit_tag('保存する') ?>

  <?php if ($civer->getId()): ?>
    &nbsp;<?php echo link_to('削除', 'civer/delete?id='.$civer->getId(), 'post=true&confirm=Are you sure?') ?>
    &nbsp;<?php echo link_to('キャンセル', 'civer/show?id='.$civer->getId()) ?>
  <?php else: ?>
    &nbsp;<?php echo link_to('キャンセル', 'civer/list') ?>
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
        image_a: {
          required: true
        },
        swf: {
          required: true
        }
      },
      messages: {
        // 'job_type_codes[]': {
        //   required: '1つ以上選択してください'
        // }
      }
    });
  });

</script>


