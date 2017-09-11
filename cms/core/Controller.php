<?php
/**
 * Created by PhpStorm.
 * User: omirali
 * Date: 8/11/17
 * Time: 5:47 PM
 */

namespace cms\core;


use cms\Cms;

class Controller extends \yii\web\Controller
{
    public function init()
    {
        if($this->module){
            if($this->module->id == 'admin'){
                $adminViewPath =Cms::$app->adminTemplate['layoutPath'].'/views/'.$this->id;
                $this->setViewPath(Cms::getAlias($adminViewPath));
            }

        }
        parent::init();
    }

}