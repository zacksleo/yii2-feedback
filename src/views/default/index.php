<?php

use yii\grid\GridView;
use yii\widgets\Pjax;
use zacksleo\yii2\feedback\Module;
use zacksleo\yii2\feedback\models\Feedback;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Module::t('feedback', 'feedback');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-index">
    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'contact',
            [
                'attribute' => 'content',
                'value' => function ($model) {
                    return mb_substr($model->content, 0, 20) . (mb_strlen($model->content) > 20 ? '...' : '');
                }
            ],
            'type',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return Feedback::getStatusList()[$model->status];
                }
            ],
            'created_at:datetime',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
