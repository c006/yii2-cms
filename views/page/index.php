<?php

/** @var $model array */

use c006\alerts\Alerts;
use c006\cms\assets\AppHelper;

$sections = AppHelper::getSections($model['id']);
$fonts = AppHelper::getFonts();

if (sizeof($sections) > 1) {
    foreach ($sections as $index => $item) {
        $sections[ $index ]['html'] = AppHelper::addImages($item['html']);
    }
} elseif (isset($sections[0]['html'])) {
    $sections[0]['html'] = AppHelper::addImages($sections[0]['html']);
} else {
    Alerts::setMessage('Page not found');
    Alerts::setAlertType(Alerts::ALERT_WARNING);
    Alerts::setCountdown(5);
    Yii::$app->response->redirect(['/', 'id' => 302]);
}

?>

<?php foreach ($fonts as $item) : ?>
    <link rel="stylesheet" href="<?= $item['url'] ?>"/>
<?php endforeach ?>

<style>
    <?= AppHelper::getCss() ?>
</style>

<div class="CMS">

    <?php /* TABS */
    if (sizeof($sections) > 1 && $model['layout_id'] == 1) : ?>
        <div class="CMS-title <?= AppHelper::getCssSelector($model['css_id']) ?>"><?= $model['name'] ?></div>

        <div class="CMS-tabs-container">
            <?php foreach ($sections as $item) : ?>
                <div class="CMS-tab" item_id="<?= $item['id'] ?>">
                    <span><?= $item['name'] ?></span>
                </div>
            <?php endforeach ?>
        </div>
    <?php foreach ($sections as $item) : ?>
        <div id="CMS-tab-<?= $item['id'] ?>" class="CMS-tabs-content hide"><?= $item['html'] ?></div>
    <?php endforeach ?>

        <script type="text/javascript">
            jQuery(function () {
                jQuery('.CMS-tab')
                    .click(function () {
                        var $this = jQuery(this);
                        jQuery('.CMS-tab').find('span').removeClass('active');
                        $this.find('span').addClass('active');
                        jQuery('.CMS-tabs-content').addClass('hide');
                        jQuery('#CMS-tab-' + $this.attr('item_id')).removeClass('hide');
                    });
                jQuery('.CMS-tab:first-of-type').trigger('click');
            });
        </script>


    <?php /* SIDE BAR */
    elseif (sizeof($sections) > 1 && $model['layout_id'] == 2) : ?>

        <div class="table">

            <div class="table-cell">
                <div class="CMS-tabs-vertical-container">
                    <?php foreach ($sections as $item) : ?>
                        <div class="CMS-tab" item_id="<?= $item['id'] ?>">
                            <span><?= $item['name'] ?></span>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="table-cell">
                <div class="CMS-title <?= AppHelper::getCssSelector($model['css_id']) ?>"><?= $model['name'] ?></div>
                <?php foreach ($sections as $item) : ?>
                    <div id="CMS-tab-<?= $item['id'] ?>" class="CMS-tabs-content hide"><?= $item['html'] ?></div>
                <?php endforeach ?>
            </div>
        </div>
        <script type="text/javascript">
            jQuery(function () {
                jQuery('.CMS-tab')
                    .click(function () {
                        var $this = jQuery(this);
                        jQuery('.CMS-tab').find('span').removeClass('active');
                        $this.find('span').addClass('active');
                        jQuery('.CMS-tabs-content').addClass('hide');
                        jQuery('#CMS-tab-' + $this.attr('item_id')).removeClass('hide');
                    });
                jQuery('.CMS-tab:first-of-type').trigger('click');
            });
        </script>
    <?php /* SINGLE SECTION */
    else : ?>
        <div id="CMS-tab-<?= $sections[0]['id'] ?>" class="CMS-tabs-content"><?= $sections[0]['html'] ?></div>
    <?php endif ?>

</div>

<script type="text/javascript">
    jQuery(function () {
        var cms = new CmsMedia();
        cms.set_container_id('div.CMS');
        cms.setup();
    });
</script>















