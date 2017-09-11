<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model cms\admin\modules\post\models\Post */

$this->title = Yii::t('cms', 'Create Post');
$this->params['breadcrumbs'][] = ['label' => Yii::t('cms', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
