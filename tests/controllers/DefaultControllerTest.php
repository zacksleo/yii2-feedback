<?php


namespace tests\controllers;

use yii;
use tests\TestCase;

class DefaultControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = Yii::$app->runAction('feedback/default/index');
        var_dump($response);exit;

    }
}