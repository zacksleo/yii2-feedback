<?php
use yii\helpers\Html;
use zacksleo\yii2\feedback\Module;

/* @var $this yii\web\View */
/* @var $model zacksleo\yii2\feedback\models\Feedback */
$this->title = Module::t('feedback', 'Update Feedback');
$this->params['breadcrumbs'][] = ['label' => Module::t('feedback', 'Feedbacks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('yii', 'Update');
?>
<div class="feedback-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
