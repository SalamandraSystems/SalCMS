<?php
/**
 * Created by PhpStorm.
 * User: omirali
 * Date: 8/11/17
 * Time: 5:31 PM
 */
namespace cms\admin;


use cms\Cms;
use cms\core\Module as BaseModule;


class Module extends BaseModule
{
    public $controllerNamespace = 'cms\admin\controllers';

    public function init()
    {
        parent::init();

        $this->modules = [
            'rbac' => [
                'class' => '\mdm\admin\Module',
                'layout' => 'left-menu',
                'mainLayout'=>$this->layoutPath.DIRECTORY_SEPARATOR.$this->layout.'.php',
                'controllerMap' => [
                    'assignment' => [
                        'class' => 'mdm\admin\controllers\AssignmentController',
                        'userClassName' => 'cms\admin\models\User',
                    ],
                    'other' => [
                        'class' => 'path\to\OtherController', // add another controller
                    ],
                ],
//                'menus' => [
//                    'assignment' => [
//                        'label' => 'Grand Access' // change label
//                    ],
//                    'route' => null, // disable menu route
//                ]
            ],
            'post' => [
                'class' => 'cms\admin\modules\post\Module',
            ],
        ];
    }

}