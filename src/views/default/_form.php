<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use zacksleo\yii2\feedback\models\Feedback;

/* @var $this yii\web\View */
/* @var $model zacksleo\yii2\feedback\models\Feedback */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="feedback-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'contact')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'content')->textarea(['maxlength' => true]) ?>
    <?= $form->field($model, 'type')->textInput() ?>
    <?= $form->field($model, 'status')->dropDownList(Feedback::getStatusList()) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('yii', 'Create') : Yii::t('yii', 'Update'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
