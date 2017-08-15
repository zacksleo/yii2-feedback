<?php

namespace tests\actions;

use yii;
use tests\TestCase;

class CreateActionTest extends TestCase
{
    public function testRun()
    {
        $response = Yii::$app->runAction('feedback/feedback/create');
        //$this->assertEquals($response, 'Failed to create the object for unknown reason.');
        $this->assertInstanceOf('yii\web\ServerErrorHttpException', $response);
        Yii::$app->request->setBodyParams([
            'some' => 'text',
        ]);
        $this->assertInstanceOf('zacksleo\yii2\feedback\models\Feedback', $response);
        $this->assertEquals(Yii::$app->response->getStatusCode(), 422);

        Yii::$app->request->setBodyParams([
            'contact' => '17883400514',
            'content' => 'feedback content',
        ]);

        $this->assertInstanceOf('zacksleo\yii2\feedback\models\Feedback', $response);
        $this->assertEquals(Yii::$app->response->getStatusCode(), 201);
    }

    /**
     * Generate entity string
     *
     * @return string
     */
    private function generateEntity()
    {
        $post = PostModel::find()->one();
        return utf8_encode(Yii::$app->getSecurity()->encryptByKey(Json::encode([
            'entity' => hash('crc32', get_class($post)),
            'contact' => '17883400514',
            'content' => 'feedback content',
        ]), ''));
    }
}