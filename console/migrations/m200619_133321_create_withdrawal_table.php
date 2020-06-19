<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%withdrawal}}`.
 */
class m200619_133321_create_withdrawal_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%withdrawal}}', [
            'id' => $this->primaryKey(),
            'payment_system' => $this->string(50),
            'payment_card' => $this->string(),
            'card_user' => $this->integer(),
            'date_time' => $this->string(20),
            'sum' => $this->float(),
            'payment_currency' => $this->integer(),
            'currency_card' => $this->integer(),
            'shadow_card' => $this->integer(),
            'shadow_currency' => $this->integer(),
            'shadow_sum' =>$this->float()
        ]);

        $this->addForeignKey('FK_withdrawal_card', 'withdrawal', 'card_user', 'card', 'card_user');
        $this->addForeignKey('FK_withdrawal_pay-currency', 'withdrawal', 'payment_currency', 'currency', 'id');
        $this->addForeignKey('FK_withdrawal_shad-currency', 'withdrawal', 'shadow_currency', 'currency', 'id');
        $this->addForeignKey('FK_withdrawal_shadow', 'withdrawal', 'shadow_card', 'shadow_card', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_withdrawal_card', 'withdrawal');
        $this->dropForeignKey('FK_withdrawal_pay-currency', 'withdrawal');
        $this->dropForeignKey('FK_withdrawal_shad-currency', 'withdrawal');
        $this->dropForeignKey('FK_withdrawal_shadow', 'withdrawal');
        $this->dropTable('{{%withdrawal}}');
    }
}
