<?php

namespace zacksleo\yii2\feedback\actions;

use yii;
use yii\base\Action;
use zacksleo\yii2\feedback\models\Feedback;
use yii\web\ServerErrorHttpException;


class CreateAction extends Action
{
    public function run()
    {
        $model = new Feedback();
        $model->load(Yii::$app->getRequest()->getBodyParams(), '');
        if ($model->save()) {
            $response = Yii::$app->getResponse();
            $response->setStatusCode(201);
        } elseif (!$model->hasErrors()) {
            throw new ServerErrorHttpException('Failed to create the object for unknown reason.');
        }
        return $model;
    }
}
