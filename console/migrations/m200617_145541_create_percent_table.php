<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%percent}}`.
 */
class m200617_145541_create_percent_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%percent}}', [
            'id' => $this->primaryKey(),
            'percent' => $this->float()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%percent}}');
    }
}
