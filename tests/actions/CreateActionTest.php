<?php

namespace tests\actions;

use yii;
use tests\TestCase;

class CreateActionTest extends TestCase
{
    public function testRun()
    {
        $response = Yii::$app->runAction('feedback/feedback/create');
        Yii::$app->request->setBodyParams([
            'some' => 'text',
        ]);
        $this->assertInstanceOf('zacksleo\yii2\feedback\models\Feedback', $response);
        $this->assertEquals(Yii::$app->response->getStatusCode(), 200);
        $this->assertArrayHasKey('contact', $response->getErrors());
        $this->assertArrayHasKey('content', $response->getErrors());

        Yii::$app->request->setBodyParams([
            'contact' => '17883400514',
            'content' => 'feedback content',
        ]);
        $response = Yii::$app->runAction('feedback/feedback/create');
        $this->assertInstanceOf('zacksleo\yii2\feedback\models\Feedback', $response);
        $this->assertEquals(Yii::$app->response->getStatusCode(), 201);
    }
}
