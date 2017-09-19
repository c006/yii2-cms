<?php
namespace c006\cms\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Class AppAssets
 * @package c006\cms\assets
 */
class AppAssets extends AssetBundle
{

    /**
     * @inheritdoc
     */
    public $sourcePath = '@vendor/c006/yii2-cms/assets';

    /**
     * @inheritdoc
     */
    public $css = [
        'css/c006-cms.css'
    ];

    /**
     * @inheritdoc
     */
    public $js = [
        'js/cms-media.js'
    ];

    /**
     * @inheritdoc
     */
    public $depends = [];

    /**
     * @var array
     */
    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];

}
