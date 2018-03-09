<?php

use yii\db\Migration;

/**
 * Handles the creation of table `sms`.
 */
class m180309_071817_create_sms_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('sms', [
            'id' => $this->primaryKey(),
            'phone' => $this->string()->notNull(),
            'sms' => $this->integer(6)->notNull(),
            'try_count' => $this->smallInteger()->defaultValue(1),
            'send_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('sms');
    }
}
