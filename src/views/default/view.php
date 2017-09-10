<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use zacksleo\yii2\feedback\Module;
use zacksleo\yii2\feedback\models\Feedback;

/* @var $this yii\web\View */
/* @var $model zacksleo\yii2\feedback\models\Feedback */
$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Module::t('feedback', 'Feedbacks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a(Yii::t('yii', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('yii', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
            'updated_at:datetime',
        ],
    ]) ?>
</div>
