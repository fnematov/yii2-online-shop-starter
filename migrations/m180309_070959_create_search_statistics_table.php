<?php

use yii\db\Migration;

/**
 * Handles the creation of table `search_statistics`.
 */
class m180309_070959_create_search_statistics_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('search_statistics', [
            'id' => $this->primaryKey(),
            'query' => $this->string()->notNull(),
            'searched_count' => $this->integer()->defaultValue(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('search_statistics');
    }
}
