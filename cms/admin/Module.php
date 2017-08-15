<?php
/**
 * Created by PhpStorm.
 * User: omirali
 * Date: 8/11/17
 * Time: 5:31 PM
 */
namespace cms\admin;

use cms\Module as BaseModule;


class Module extends BaseModule
{
    public $controllerNamespace = 'cms\admin\controllers';

    public $defaultRoute = 'main';
}