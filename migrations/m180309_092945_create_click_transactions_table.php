<?php

use yii\db\Migration;

/**
 * Handles the creation of table `click_transactions`.
 * Has foreign keys to the tables:
 *
 * - `orders`
 */
class m180309_092945_create_click_transactions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('click_transactions', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer()->notNull(),
            'click_trans_id' => $this->integer()->notNull(),
            'amount' => $this->float()->notNull(),
            'click_paydoc_id' => $this->integer()->notNull(),
            'service_id' => $this->integer()->notNull(),
            'sign_time' => $this->string(63)->notNull(),
            'status' => $this->smallInteger(6)->notNull(),
            'create_time' => $this->integer()->notNull(),
        ]);

        // creates index for column `order_id`
        $this->createIndex(
            'idx-click_transactions-order_id',
            'click_transactions',
            'order_id'
        );

        // add foreign key for table `orders`
        $this->addForeignKey(
            'fk-click_transactions-order_id',
            'click_transactions',
            'order_id',
            'orders',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `orders`
        $this->dropForeignKey(
            'fk-click_transactions-order_id',
            'click_transactions'
        );

        // drops index for column `order_id`
        $this->dropIndex(
            'idx-click_transactions-order_id',
            'click_transactions'
        );

        $this->dropTable('click_transactions');
    }
}
