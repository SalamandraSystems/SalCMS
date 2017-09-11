<?php

namespace app\modules\blog;

/**
 * blog-assets module definition class
 */
class BlogModule extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\blog\controllers';

    public $defaultRoute = 'main';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
