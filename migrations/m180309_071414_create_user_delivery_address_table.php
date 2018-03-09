<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_delivery_address`.
 * Has foreign keys to the tables:
 *
 * - `places`
 * - `user`
 */
class m180309_071414_create_user_delivery_address_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_delivery_address', [
            'id' => $this->primaryKey(),
            'place_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'address' => $this->string()->notNull(),
            'lat' => $this->float(),
            'lng' => $this->float(),
            'phone' => $this->string(55)->notNull(),
        ]);

        // creates index for column `place_id`
        $this->createIndex(
            'idx-user_delivery_address-place_id',
            'user_delivery_address',
            'place_id'
        );

        // add foreign key for table `places`
        $this->addForeignKey(
            'fk-user_delivery_address-place_id',
            'user_delivery_address',
            'place_id',
            'places',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            'idx-user_delivery_address-user_id',
            'user_delivery_address',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-user_delivery_address-user_id',
            'user_delivery_address',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `places`
        $this->dropForeignKey(
            'fk-user_delivery_address-place_id',
            'user_delivery_address'
        );

        // drops index for column `place_id`
        $this->dropIndex(
            'idx-user_delivery_address-place_id',
            'user_delivery_address'
        );

        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-user_delivery_address-user_id',
            'user_delivery_address'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-user_delivery_address-user_id',
            'user_delivery_address'
        );

        $this->dropTable('user_delivery_address');
    }
}
