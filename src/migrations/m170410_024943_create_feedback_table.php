<?php

use yii\db\Migration;

/**
 * Handles the creation of table `feedback`.
 */
class m170410_024943_create_feedback_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        //用户反馈
        $this->createTable('{{%feedback}}', [
            'id' => $this->primaryKey(),
            'contact' => $this->string()->notNull()->comment('联络方式'),
            'content' => $this->string()->notNull()->comment('反馈内容'),
            'type' => $this->smallInteger()->notNull()->defaultValue(1)->comment('反馈类型'),
            'status' => $this->smallInteger(1)->notNull()->defaultValue(0)->comment('处理状态'),
            'created_at' => $this->integer()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer()->notNull()->comment('用户反馈'),
        ], $tableOptions . ' COMMENT="用户反馈"');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%feedback}}');
    }
}
