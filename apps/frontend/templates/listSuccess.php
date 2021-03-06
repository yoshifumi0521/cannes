<?php
// auto-generated by sfPropelCrud
// date: 2014/03/08 06:29:38
    use_helper('MbText');
    use_helper('DateForm');
    // use_javascript('lineup.js');
?>

<style>
div {
    /*width: 200px;
    height: 100px;*/
    overflow: auto;
}

</style>

<div class="page-header">
  <?php if(isset($category)): ?>
    <h2><?php echo strtoupper($category); ?></h2>
    <?php if(SF_DEBUG): ?>
        <?php echo link_to ('Add+', '@create_product?category='.$category) ?>
    <?php endif; ?>
  <?php endif; ?>
  <br>
  <div class="row-fluid">
    <?php if($module_name == "top" && $action_name == "list"): ?>
        <!--絞り込みをいれる。-->
        <?php

            $yml_prize_category[0] = "all";
            $yml_prize_type[0] = "all";
            $yml_prize_detail[0] = "all";
            $default_year = $filters["prize_year"]?$filters["prize_year"]:0;
            $start_year = 2000;
            $end_year = date("Y");

        ?>

        <div class="span2">
            Section
            <p><?php echo select_tag("prize_category",options_for_select($yml_prize_category,$filters["prize_category"]),array("class"=>"input-medium")) ?></p>
        </div>


        <div class="span2">
            Cannes or Young Lions
            <p><?php echo select_tag("prize_type",options_for_select($yml_prize_type,$filters["prize_type"]),array("class"=>"input-medium")) ?></p>
        </div>
        <div class="span2">
            Year
            <p><?php echo select_year_tag('prize_year',$default_year , 'include_custom=all year_start=2000 year_end='.$end_year,array("class"=>"input-medium")) ?></p>
        </div>
        <div class="span2">
            Prize
            <p><?php echo select_tag("prize_detail",options_for_select($yml_prize_detail,$filters["prize_detail"]),array("class"=>"input-medium")) ?></p>
        </div>
        <div class="span2">
            <br>
            <input class="span10" type="button" value="Search" onClick="javascript:search();"/>
        </div>

        <script>
            //検索をかける
            function search()
            {
                var domain = location.protocol+"//"+location.hostname;
                var prize_category = $("#prize_category").val();
                var prize_type = $("#prize_type").val();
                var prize_year = $("#prize_year").val() == ""? 0: $("#prize_year").val();
                var prize_detail = $("#prize_detail").val();

                if("<?php echo SF_DEBUG; ?>")
                {
                    var path = "/frontend_dev.php/";
                }
                else
                {
                    var path = "/";
                }
                var link = domain+path+"top/list?filters%5Bprize_category%5D="+prize_category+"&filters%5Bprize_type%5D="+prize_type+
                "&filters%5Bprize_year%5D="+prize_year+"&filters%5Bprize_detail%5D="+prize_detail;
                return $(location).attr("href", link);

            }

        </script>

    <?php else: ?>
        <!--絞り込みをいれる。-->
        <?php

            $yml_prize_type[0] = "all";
            $yml_prize_detail[0] = "all";
            $default_year = $filters["prize_year"]?$filters["prize_year"]:0;
            $start_year = 2000;
            $end_year = date("Y");

        ?>

        <?php echo input_hidden_tag("prize_category", $category_key) ?>

        <div class="span2">
            Cannes or Young Lions
            <p><?php echo select_tag("prize_type",options_for_select($yml_prize_type,$filters["prize_type"]),array("class"=>"input-medium")) ?></p>
        </div>
        <div class="span2">
            Year
            <p><?php echo select_year_tag('prize_year',$default_year , 'include_custom=all year_start=2000 year_end='.$end_year,array("class"=>"input-medium")) ?></p>
        </div>
        <div class="span2">
            Prize
            <p><?php echo select_tag("prize_detail",options_for_select($yml_prize_detail,$filters["prize_detail"]),array("class"=>"input-medium")) ?></p>
        </div>
        <div class="span2">
            <br>
            <input class="span10" type="button" value="Search" onClick="javascript:search();"/>
        </div>

        <script>
            //検索をかける
            function search()
            {
                var domain = location.protocol+"//"+location.hostname;
                var prize_category = $("#prize_category").val();
                var prize_type = $("#prize_type").val();
                var prize_year = $("#prize_year").val() == ""? 0: $("#prize_year").val();
                var prize_detail = $("#prize_detail").val();

                if("<?php echo SF_DEBUG; ?>")
                {
                    var path = "/frontend_dev.php/";
                }
                else
                {
                    var path = "/";
                }
                var link = domain+path+ "list/<?php echo $category; ?>?filters%5Bprize_category%5D="+prize_category+"&filters%5Bprize_type%5D="+prize_type+
                "&filters%5Bprize_year%5D="+prize_year+"&filters%5Bprize_detail%5D="+prize_detail;
                return $(location).attr("href", link);

            }

        </script>

    <?php endif; ?>

  </div>

</div>

<?php if(!$products): ?>

    <p>まだ何も登録していません。</p>

<?php else: ?>

    <?php foreach ($products as $key => $product): ?>
        <?php if($key % 3 == 0): ?>
            <div class="row-fluid">
                <ul class="thumbnails">
        <?php endif; ?>

            <li class="span4 item">
                <div class="thumbnail">
                    <?php echo $product->getImageTag('s','a',array('width'=>'260px','height'=>'150px')); ?>
                    <div class="caption">
                        <h3><?php echo $product->__toString(); ?></h3>
                        <p>
                            <?php echo mb_truncate_text($product->getSummary(),"48"); ?>
                        </p>
                        <p>
                            <strong><?php echo $product->getPrizeText(); ?></strong>
                        </p>
                    </div>
                    <div class="widget-footer">
                        <p>
                            &nbsp;
                            <!-- <a href="product.html" class="btn">Read more</a> -->
                            <?php echo link_to("Read more","@product?product_id=".$product->getId()); ?>
                        </p>
                    </div>
                </div>
            </li>

        <?php if($key % 3 == 3): ?>
                </ul>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>

<?php endif; ?>





