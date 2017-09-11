<?php
/**
 * Created by PhpStorm.
 * User: omirali
 * Date: 8/17/17
 * Time: 3:46 PM
 */

namespace cms\admin\modules\post\models;


use creocoder\taggable\TaggableQueryBehavior;
use yii\db\ActiveQuery;

class PostQuery extends ActiveQuery
{
    public function behaviors()
    {
        return [
            TaggableQueryBehavior::className(),
        ];
    }
}