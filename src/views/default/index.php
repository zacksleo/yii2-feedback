<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use zacksleo\yii2\feedback\Module;

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
            'id',
            'contact',
            'content',
            'type',
            'status',
            // 'created_at',
            // 'updated_at',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
