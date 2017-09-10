<?php

namespace zacksleo\yii2\feedback\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use zacksleo\yii2\feedback\Module;

/**
 * This is the model class for table "{{%feedback}}".
 *
 * @property integer $id
 * @property string $contact
 * @property string $content
 * @property integer $type
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Feedback extends \yii\db\ActiveRecord
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%feedback}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contact', 'content'], 'required'],
            [['type', 'status', 'created_at', 'updated_at'], 'integer'],
            [['contact', 'content'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Module::t('feedback', 'ID'),
            'contact' => Module::t('feedback', 'contact'),
            'content' => Module::t('feedback', 'content'),
            'type' => Module::t('feedback', 'type'),
            'status' => Module::t('feedback', 'status'),
            'created_at' => Module::t('feedback', 'created at'),
            'updated_at' => Module::t('feedback', 'updated at'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
            ],
        ];
    }

    public function fields()
    {
        $fields = parent::fields();
        unset($fields['id'], $fields['updated_at'], $fields['created_at']);
        return $fields;
    }

    public static function getStatusList()
    {
        return [
            self::STATUS_INACTIVE => Module::t('feedback', 'inactive'),
            self::STATUS_ACTIVE => Module::t('feedback', 'active'),
        ];
    }
}
