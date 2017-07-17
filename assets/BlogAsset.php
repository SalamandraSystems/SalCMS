<?php
/**
 * Created by PhpStorm.
 * User: Omirali Sengirbay
 * Date: 17.07.2017
 * Time: 16:43
 */

namespace app\assets;


use yii\web\AssetBundle;

class BlogAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/blog-assets';
    public $css = [
        "css/bootstrap.min.css",
        "css/font-awesome.min.css",
        "css/animate.css",
        "css/slick.css",
        "css/theme.css",
        "css/style.css"
    ];
    public $js = [
        'js/html5shiv.min.js' => 'lt IE 9',
        'js/respond.min.js' => 'lt IE 9',
        "js/jquery.min.js",
        "js/bootstrap.min.js",
        "js/wow.min.js",
        "js/slick.min.js",
        "js/custom.js"
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}