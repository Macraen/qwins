<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%replenishment}}`.
 */
class m200617_161045_create_replenishment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%replenishment}}', [
            'id' => $this->primaryKey(),
            'payment_system' => $this->string(50),
            'payment_card' => $this->string(20),
            'card_user' => $this->integer(),
            'date_time' => $this->string(20),
            'sum' => $this->float(),
            'payment_currency' => $this->integer(),
            'currency_card' => $this->integer()
        ]);

        $this->addForeignKey('FK_replenishment_card', 'replenishment', 'card_user', 'card', 'card_user');
        $this->addForeignKey('FK_replenishment_paym-curr', 'replenishment', 'payment_currency', 'currency', 'id');
        $this->addForeignKey('FK_replenishment_curr-card', 'replenishment', 'currency_card', 'currency', 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_replenishment_card', 'replenishment');
        $this->dropForeignKey('FK_replenishment_paym-curr', 'replenishment');
        $this->dropForeignKey('FK_replenishment_curr-card', 'replenishment');
        $this->dropTable('{{%replenishment}}');
    }
}
