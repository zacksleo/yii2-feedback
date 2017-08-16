<?php


namespace tests\controllers;

use yii;
use tests\TestCase;
use zacksleo\yii2\feedback\models\Feedback;

class DefaultControllerTest extends TestCase
{
    private $id;

    protected function setUp()
    {
        $model = new Feedback();
        $model->contact = '18888888888';
        $model->content = 'feedback content';
        $model->type = 1;
        $model->save();
        $this->id = $model->id;
        parent::setUp();
    }


    public function testCreate()
    {
        $data = [
            'Feedback' => [
                'contact' => '18888888888',
                'content' => 'feedback-content',
                'type' => 1,
            ]
        ];
        Yii::$app->request->bodyParams = $data;
        $response = Yii::$app->runAction('feedback/default/create');
        $this->assertInstanceOf('zacksleo\yii2\feedback\models\Feedback', $response);
    }

    public function testUpdate()
    {
        Yii::$app->request->bodyParams = [
            'Feedback' => [
                'contact' => '18888888889',
                'content' => 'feedback-content-update',
                'type' => 2,
            ]
        ];
        $response = Yii::$app->runAction('feedback/default/update', ['id' => $this->id]);
        $this->assertInstanceOf('zacksleo\yii2\feedback\models\Feedback', $response);
        $this->assertEquals('18888888889', $response->contact);
    }

    public function testIndex()
    {
        $response = Yii::$app->runAction('feedback/default/index');
        $this->assertTrue(count($response) == 2);
    }

    public function testDelete()
    {
        $response = Yii::$app->runAction('feedback/default/delete', ['id' => $this->id]);
        $this->assertEquals(1, $response);
    }
}
