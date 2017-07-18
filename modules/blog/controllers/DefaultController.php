<?php

namespace app\modules\blog\controllers;

use cms\Application;
use yii\web\Controller;

/**
 * Default controller for the `blog-assets` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $app = new Application();
        echo $app->t;
        //return $this->render('index');
    }
}
