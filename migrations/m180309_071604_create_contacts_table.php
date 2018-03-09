<?php

use yii\db\Migration;

/**
 * Handles the creation of table `contacts`.
 */
class m180309_071604_create_contacts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('contacts', [
            'id' => $this->primaryKey(),
            'phone' => $this->string(55)->notNull(),
            'working_days' => $this->string(),
            'working_times' => $this->string(),
            'info' => $this->text(),
            'map' => $this->text(),
            'address' => $this->string(),
            'meta_keywords' => $this->string(255),
            'meta_description' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('contacts');
    }
}
