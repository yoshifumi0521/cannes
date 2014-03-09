<?php
// auto-generated by sfPropelCrud
// date: 2014/03/08 06:29:38
    use_helper('MbText');
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
  <h2>FILM</h2>
  <?php echo link_to ('Add+', 'film/create') ?>
</div>

<?php if(!$films): ?>

    <p>まだ何も登録していません。</p>

<?php else: ?>

    <?php foreach ($films as $key => $film): ?>
        <?php if($key % 3 == 0): ?>
            <div class="row-fluid">
                <ul class="thumbnails">
        <?php endif; ?>

            <li class="span4 item">
                <div class="thumbnail">
                    <?php echo $film->getImageTag('s','a',array('width'=>'260px','height'=>'150px')); ?>
                    <div class="caption">
                        <h3><?php echo $film->__toString(); ?></h3>
                        <p>
                            <?php echo mb_truncate_text($film->getSummary(),"48"); ?>
                        </p>
                    </div>
                    <div class="widget-footer">
                        <p>
                            &nbsp;
                            <!-- <a href="product.html" class="btn">Read more</a> -->
                            <?php echo link_to("Read more","film/show?id=".$film->getId()); ?>
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

<script>

    // $(".item").lineUp();
    // $(".item").lineUp({
    //     onFontResize : false,
    //     onResize : true
    // });

</script>



