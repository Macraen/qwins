<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shadow_card}}`.
 */
class m200617_165459_create_shadow_card_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%shadow_card}}', [
            'id' => $this->primaryKey(),
            'card_user' => $this->integer(),
            'shadow_card' => $this->string(),
            'date_time' => $this->string(20),
            'initial_currency' => $this->integer(),
            'ending_currency' => $this->integer(),
            'transaction_sum' => $this->float(),
            'sum' => $this->float()
        ]);

        $this->addForeignKey('FK_shadow_c_card','shadow_card', 'card_user', 'card', 'card_user');
        $this->addForeignKey('FK_shadow_c_init-currency', 'shadow_card', 'initial_currency', 'currency', 'id');
        $this->addForeignKey('FK_shadow_c_end-currency', 'shadow_card', 'ending_currency', 'currency', 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_shadow_c_card','shadow_card');
        $this->dropForeignKey('FK_shadow_c_init-currency', 'shadow_card');
        $this->dropForeignKey('FK_shadow_c_end-currency', 'shadow_card');
        $this->dropTable('{{%shadow_card}}');
    }
}
