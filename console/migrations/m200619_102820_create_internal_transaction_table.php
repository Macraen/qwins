<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%internal_transaction}}`.
 */
class m200619_102820_create_internal_transaction_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%internal_transaction}}', [
            'id' => $this->primaryKey(),
            'card_sender' => $this->integer(),
            'card_payee' => $this->integer(),
            'currency_sender' => $this->integer(),
            'currency_payee' => $this->integer(),
            'sum' => $this->float(),
            'comment' => $this->text(),
            'date_time' => $this->string(20)
        ]);

        $this->addForeignKey('FK_int_tran_to_card-send', 'internal_transaction', 'card_sender', 'card', 'card_user');
        $this->addForeignKey('FK_int_tran_to_card-payee', 'internal_transaction','card_payee', 'card', 'card_user');
        $this->addForeignKey('FK_int_tran_to_curr-send', 'internal_transaction', 'currency_sender', 'currency', 'id');
        $this->addForeignKey('FK_int_tran_to_curr-payee', 'internal_transaction','currency_payee', 'currency', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_int_tran_to_card-send', 'internal_transaction');
        $this->dropForeignKey('FK_int_tran_to_card-payee', 'internal_transaction');
        $this->dropForeignKey('FK_int_tran_to_curr-send', 'internal_transaction');
        $this->dropForeignKey('FK_int_tran_to_curr-payee', 'internal_transaction');
        $this->dropTable('{{%internal_transaction}}');
    }
}
