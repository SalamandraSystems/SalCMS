<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel cms\admin\modules\post\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('cms', 'Posts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('cms', 'Create Post'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= \yii\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'=>$searchModel,
        'columns'=>[
            'id',
            [
                'header'=>'Изображение',
                'content'=>function($model){
                    return Html::img($model->getImage()->getUrl('50x50'),['class'=>'img']);
                }
            ],
            'title',
            [
                'attribute'=>'description',
                'content'=>function($model){
                    return \yii\helpers\StringHelper::truncateWords($model->description,20);
                }
            ],
            'author.email',
            [
                'class'=>\yii\grid\ActionColumn::className()
            ],
        ],
    ]) ?>
<?php Pjax::end(); ?></div>
