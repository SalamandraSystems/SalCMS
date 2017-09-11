<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15.08.2017
 * Time: 16:17
 */

namespace cms\templates\adminlte\assets;


use yii\web\AssetBundle;

class AdminAsset extends AssetBundle
{

    public $sourcePath = '@cms/templates/adminlte/assets';

    public $css = [
        "bower_components/bootstrap/dist/css/bootstrap.min.css",
        "bower_components/font-awesome/css/font-awesome.min.css",
        "bower_components/Ionicons/css/ionicons.min.css",
        "css/AdminLTE.min.css",
        "css/skins/skin-blue.min.css",
        "https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"=>"if lt IE 9",
        "https://oss.maxcdn.com/respond/1.4.2/respond.min.js"=>"if lt IE 9",
        "https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"
    ];

    public $js = [
        "bower_components/jquery/dist/jquery.min.js",
        "bower_components/bootstrap/dist/js/bootstrap.min.js",
        "js/adminlte.min.js"
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}