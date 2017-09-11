<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15.08.2017
 * Time: 16:33
 *
 * @var $view \yii\web\View
 *
 */

namespace cms\core;



use yii\helpers\Json;
use yii\web\AssetBundle;

class AssetManager extends AssetBundle
{
    protected static $_instance;

    protected $_jsonData = [];

    public static function getInstance()
    {
        if( self::$_instance === NULL ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function init()
    {
        print_r(self::getInstance()->_jsonData);
        parent::init();
    }

    static function register($view)
    {
        $assetsJson = dirname($view->viewFile).DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'assets.json';
        if(file_exists($assetsJson)){
            $jsonData = file_get_contents($assetsJson);
            $assetsData = Json::decode($jsonData);
            $bundle = new AssetBundle();
            foreach ($assetsData as $name=>$value)
               $bundle->$name = $value;

        }
        //return parent::register($view);
    }
}