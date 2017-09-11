<?php

namespace cms\admin\modules\post\models;

use cms\admin\models\User;
use cms\Cms;
use cms\core\extensions\images\ImageBehavior;
use creocoder\taggable\TaggableBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%posts}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $user_id
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $image
 */
class Post extends \cms\core\ActiveRecordModel
{

    public $image;

    public function behaviors()
    {

        return ArrayHelper::merge(parent::behaviors(),[
            [
                'class'=>TimestampBehavior::className(),
                'value' => new Expression('NOW()')
            ],
            ImageBehavior::className(),
            'taggable' => [
                'class' => TaggableBehavior::className(),
                // 'tagValuesAsArray' => false,
                // 'tagRelation' => 'tags',
                // 'tagValueAttribute' => 'name',
                // 'tagFrequencyAttribute' => 'frequency',
            ],
        ]);
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%posts}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['description', 'meta_keywords', 'meta_description'], 'string'],
            [['user_id', 'status'], 'integer'],
            [['created_at', 'updated_at','tagValues'], 'safe'],
            [['title', 'meta_title'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('cms', 'ID'),
            'title' => Yii::t('cms', 'Title'),
            'description' => Yii::t('cms', 'Description'),
            'user_id' => Yii::t('cms', 'User ID'),
            'meta_title' => Yii::t('cms', 'Meta Title'),
            'meta_keywords' => Yii::t('cms', 'Meta Keywords'),
            'meta_description' => Yii::t('cms', 'Meta Description'),
            'status' => Yii::t('cms', 'Status'),
            'created_at' => Yii::t('cms', 'Created At'),
            'updated_at' => Yii::t('cms', 'Updated At'),
        ];
    }

    public static function find()
    {
        return new PostQuery(get_called_class());
    }

    public function beforeSave($insert)
    {
        if(!$this->user_id)
            $this->user_id = Cms::$app->user->identity->id;
        return parent::beforeSave($insert);
    }

    public function getAuthor(){
        return $this->hasOne(User::className(),['id'=>'user_id']);
    }

    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])
            ->viaTable('{{%post_tag_assn}}', ['post_id' => 'id']);
    }



}
