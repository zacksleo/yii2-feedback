<?php

namespace tests\data;

use yii\web\Controller;

class FeedbackController extends Controller
{
    public function actions()
    {
        return [
            'create' => [
                'class' => 'zacksleo\yii2\feedback\actions\CreateAction'
            ]
        ];
    }
}