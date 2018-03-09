<?php

use yii\db\Migration;

/**
 * Handles the creation of table `add_filter`.
 */
class m180309_063406_create_add_filter_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('add_filter', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'parent_id' => $this->integer(),
            'code' => $this->string(),
            'main_status' => $this->smallInteger()->defaultvalue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('add_filter');
    }
}
