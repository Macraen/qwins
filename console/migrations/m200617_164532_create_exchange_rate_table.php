<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%exchange_rate}}`.
 */
class m200617_164532_create_exchange_rate_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%exchange_rate}}', [
            'id' => $this->primaryKey(),
            'uah' => $this->float(),
            'usd' => $this->float(),
            'eur' => $this->float(),
            'rub' => $this->float()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%exchange_rate}}');
    }
}
