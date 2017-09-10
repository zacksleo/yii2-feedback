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
            'content',
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
