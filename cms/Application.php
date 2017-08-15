<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 18.07.2017
 * Time: 17:41
 */

namespace cms;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

class Application extends \yii\web\Application
{
    /**
     * Cms configuration
     * @var array|mixed
     */
    protected $_config = [];

    /**
     * @var object
     */
    protected static $_instance;

    public function __construct(array $config = [])
    {
        $configFile = __DIR__.'/config.json';
        if(file_exists($configFile)){
            $configJson = file_get_contents($configFile);
            $this->_config = Json::decode($configJson);
        }
        Cms::$app = $this;
        parent::__construct($config);
    }

    protected function bootstrap()
    {
        Yii::setAlias('@cms', __DIR__);
        parent::bootstrap();
    }

    /**
     *
     * Get cms configuration. Return config.json file in cms directory
     * @param null|string $name
     * @return array|null
     */
    static public function getConfig($name = null){
        $config = self::getInstance()->_config;
        if(is_null($name) && count($config) > 0)
            return $config;
        else
            if(ArrayHelper::keyExists($name,$config))
                return $config[$name];
        return null;

    }

    public function getAdminConfig(){
        $adminConfig = (object)self::getConfig('admin');
        //$adminConfig->layoutPath = Cms::getAlias($adminConfig->layoutPath);
        return $adminConfig;
    }

    public function getName(){
        return self::getConfig('name');
    }

    /**
     * Return default template info
     * @return null|array
     */
    public function getAdminTemplate(){
        foreach ($this->adminTemplates as $adminTemplate){
            if($adminTemplate['id'] == $this->adminDefaultTemplate)
                return $adminTemplate;
        }
        return null;
    }

    /**
     * Return default template id
     * @return bool|mixed|string
     */
    public function getAdminDefaultTemplate(){
        $adminConfig = self::getConfig('admin');
        if(ArrayHelper::keyExists('defaultTemplate',$adminConfig))
            return $adminConfig['defaultTemplate'];
        else
            return $this->layout;
    }

    public function getAdminTemplates(){
        $adminConfig = self::getConfig('admin');
        if(ArrayHelper::keyExists('templates',$adminConfig))
            return $adminConfig['templates'];
        else
            return [];
    }

}