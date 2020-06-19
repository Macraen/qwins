<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%card}}`.
 */
class m200617_151812_create_card_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%card}}', [
            'card_user' => $this->primaryKey(),
            'id_user' => $this->integer(),
            'id_currency' => $this->integer(),
            'sum' => $this->float(),
            'create_date' => $this->string(10),
            'expire_date' => $this->string(10)
        ]);

        $this->addForeignKey('FK_card_user', 'card','id_user', 'user','id');
        $this->addForeignKey('FK_card_currency', 'card','id_currency', 'currency', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_card_user', 'card');

        $this->dropForeignKey('FK_card_currency', 'card');

        $this->dropTable('{{%card}}');
    }
}
