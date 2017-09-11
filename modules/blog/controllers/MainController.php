<?php

namespace app\modules\blog\controllers;

use cms\admin\models\User;
use cms\Application;
use cms\Cms;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Default controller for the `blog-assets` module
 */
class MainController extends Controller
{


    public $user;

    public function beforeAction($action)
    {
        $username = Cms::$app->getRequest()->getQueryParam('username');
        $this->user = $this->findUser($username);
        return parent::beforeAction($action);
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex($post = null)
    {
        echo 'blog index username:'.$this->user->username;
        echo 'blog index post:'.$post;
        //return $this->render('index');
    }

    public function actionEdit(){
        http://shareblog.kz/alik
        echo 'blog test: '.$this->user->username;
    }

    protected function findUser($username){
        if($user = User::findByUsername($username))
            return $user;
        throw new NotFoundHttpException('Not Found');
    }

}
