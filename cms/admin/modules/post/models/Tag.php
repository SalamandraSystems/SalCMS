<?php
/**
 * Created by PhpStorm.
 * User: omirali
 * Date: 8/17/17
 * Time: 3:44 PM
 */

namespace cms\admin\modules\post\models;


use cms\core\ActiveRecordModel;

class Tag extends ActiveRecordModel
{
    public static function tableName()
    {
        return '{{%tag}}';
    }
}