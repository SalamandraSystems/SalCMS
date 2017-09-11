<?php
/**
 * Created by PhpStorm.
 * User: omirali
 * Date: 23.02.2017
 * Time: 16:03
 */

namespace cms\core\extensions\images;


use rico\yii2images\behaviors\ImageBehave;
use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class ImageBehavior extends ImageBehave
{
    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => 'afterInsert',
            ActiveRecord::EVENT_AFTER_UPDATE => 'afterUpdate'
        ];
    }

    public function afterInsert(){
        $this->owner->image = UploadedFile::getInstances($this->owner, 'image');
        var_dump($this->owner->image);
        if($this->owner->image){
            foreach ($this->owner->image as $image){
                $url = Yii::getAlias('@app/web/images/tmp/').$image->baseName . '.' . $image->extension;
                $image->saveAs($url);
                $this->attachImage($url,false);
                unlink($url);
            }

        }
    }
    public function afterUpdate(){
        $this->owner->image = UploadedFile::getInstances($this->owner, 'image');
        var_dump($this->owner->image);
        if($this->owner->image){
            foreach ($this->owner->image as $image){
                $url = Yii::getAlias('@app/web/images/tmp/').$image->baseName . '.' . $image->extension;
                $image->saveAs($url);
                $this->attachImage($url,false);
                unlink($url);
            }

        }
    }
}