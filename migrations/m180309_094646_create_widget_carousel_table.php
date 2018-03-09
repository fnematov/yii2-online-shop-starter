<?php

use yii\db\Migration;

/**
 * Handles the creation of table `widget_carousel`.
 */
class m180309_094646_create_widget_carousel_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('widget_carousel', [
            'id' => $this->primaryKey(),
            'img' => $this->string()->notNull(),
            'url' => $this->string(),
            'caption' => $this->text(),
            'status' => $this->smallInteger()->defaultValue(1),
            'order' => $this->integer(),
            'key' => $this->string(55)->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('widget_carousel');
    }
}
