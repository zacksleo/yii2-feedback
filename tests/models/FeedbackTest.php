<?php

namespace tests\models;

use yii;
use tests\TestCase;
use zacksleo\yii2\feedback\models\Feedback;

class FeedbackTest extends TestCase
{
    public function testTableName()
    {
        $model = new Feedback();
        $this->assertSame('feedback', $model->getTableSchema()->name);
    }

    public function testRules()
    {
        $model = new Feedback();
        $this->assertTrue($model->isAttributeRequired('contact'));
        $this->assertTrue($model->isAttributeRequired('content'));
        $model->type = 'type';
        $model->status = 'status';
        $model->contact = Yii::$app->security->generateRandomString(256);
        $model->content = Yii::$app->security->generateRandomString(256);
        $this->assertFalse($model->validate());
        $this->assertSame($model->getFirstError('type'), 'type must be an integer.');
        $this->assertSame($model->getFirstError('status'), 'status must be an integer.');
        $this->assertSame($model->getFirstError('contact'), 'contact should contain at most 255 characters.');
        $this->assertSame($model->getFirstError('content'), 'content should contain at most 255 characters.');
    }

    public function testSave()
    {
        $model = new Feedback();
        $model->type = 1;
        $model->status = 0;
        $model->contact = Yii::$app->security->generateRandomString();
        $model->content = Yii::$app->security->generateRandomString();
        $this->assertTrue($model->save());
        $this->assertInternalType('integer', $model->created_at);
        $this->assertInternalType('integer', $model->updated_at);
        $this->assertArrayHasKey('contact', $model->toArray());
        $this->assertArrayHasKey('content', $model->toArray());
        $this->assertArrayHasKey('type', $model->toArray());
        $this->assertArrayHasKey('status', $model->toArray());
        $this->assertArrayNotHasKey('id', $model->toArray());
        $this->assertArrayNotHasKey('created_at', $model->toArray());
        $this->assertArrayNotHasKey('updated_at', $model->toArray());
    }

    public function testAttributeLabels()
    {
        $model = new Feedback();
        $labels = $model->attributeLabels();
        $this->assertArrayHasKey('id', $labels);
        $this->assertArrayHasKey('contact', $labels);
        $this->assertArrayHasKey('content', $labels);
        $this->assertArrayHasKey('type', $labels);
        $this->assertArrayHasKey('status', $labels);
        $this->assertArrayHasKey('updated_at', $labels);
        $this->assertArrayHasKey('created_at', $labels);
    }

    public function testGetStatusList()
    {
        $list = Feedback::getStatusList();
        $this->assertEquals('inactive', $list[0]);
        $this->assertEquals('active', $list[1]);
    }
}
