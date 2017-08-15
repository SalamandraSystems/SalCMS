<?php
/**
 * Created by PhpStorm.
 * User: omirali
 * Date: 8/11/17
 * Time: 5:46 PM
 */

namespace cms\admin\controllers;


use cms\Cms;
use cms\Controller;

class MainController extends Controller
{
    public function actionIndex(){
        return $this->render('index');
    }
}