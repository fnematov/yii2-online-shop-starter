<?php

use yii\db\Migration;

/**
 * Handles the creation of table `social`.
 */
class m180309_071702_create_social_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('social', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'url' => $this->string()->notNull(),
            'icon' => $this->string()->notNull(),
            'status' => $this->smallInteger()->defaultValue(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('social');
    }
}
