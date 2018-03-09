<?php

use yii\db\Migration;

/**
 * Handles the creation of table `main_filter`.
 */
class m180309_061817_create_main_filter_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('main_filter', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'status' => $this->smallInteger()->defaultValue(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('main_filter');
    }
}
