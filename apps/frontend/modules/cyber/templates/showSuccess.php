<?php
    // auto-generated by sfPropelCrud
    // date: 2014/03/08 06:29:38
    use_helper('MbText');
?>

<div class="page-header">
    <h2><?php echo $cyber->getTitle() ?></h2>
    <?php echo link_to('編集', 'cyber/edit?id='.$cyber->getId()) ?>
    &nbsp;<?php echo link_to('CYBERのTOP', 'cyber/list') ?>
</div>

<div>

    <div class="row-fluid">
        <div class="span4">
            <?php echo $cyber->getImageTag('m','a'); ?>
        </div>
        <div class="span8">
            <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="800" height="600" align="middle">
                <param name="allowScriptAccess" value="sameDomain" />
                <param name="movie" value="/uploads/cyber/swf/swf_<?php echo $cyber->getId(); ?>a.swf" />
                <param name="quality" value="autolow" />
                <embed src="/uploads/cyber/swf/swf_<?php echo $cyber->getId(); ?>a.swf" quality="autolow" width="800" height="600" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
            </object>
        </div>
    </div>

    <br><br>
    <div class="row-fluid">
        <h3>概要</h3>
        <p><?php echo autoLinker($cyber->getSummary()) ?></p>

        <h3>内容</h3>
        <p><?php echo autoLinker($cyber->getBody()) ?></p>

        <h3>感想</h3>
        <p><?php echo autoLinker($cyber->getImpression()) ?></p>

        <h3>メモ</h3>
        <p><?php echo autoLinker($cyber->getImpression()) ?></p>

    </div>

    <br><br>
    <div class="row-fluid">
        <table>
            <tbody>
                <tr>
                    <th>Title: </th>
                    <td><?php echo $cyber->getTitle() ?></td>
                </tr>
                <tr>
                    <th>Client: </th>
                    <td><?php echo $cyber->getClient() ?></td>
                </tr>
                <tr>
                    <th>Agency: </th>
                    <td><?php echo $cyber->getAgency() ?></td>
                </tr>
                <tr>
                    <th>Url: </th>
                    <td><?php link_to($cyber->getUrl(),$cyber->getUrl(),array("target"=>"_blank")) ?></td>
                </tr>
            </tbody>
        </table>

    </div>
</div>

