<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model zacksleo\yii2\apprelease\models\Feedback */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="feedback-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'contact')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'content')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'type')->textInput() ?>
    <?= $form->field($model, 'status')->textInput() ?>
    <?= $form->field($model, 'created_at')->textInput() ?>
    <?= $form->field($model, 'updated_at')->textInput() ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('yii', 'Create') : Yii::t('yii', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
