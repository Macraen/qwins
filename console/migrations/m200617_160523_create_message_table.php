<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%message}}`.
 */
class m200617_160523_create_message_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%message}}', [
            'id' => $this->primaryKey(),
            'id_dialog' => $this->integer(),
            'id_user' => $this->integer(),
            'status' => $this->integer(),
            'text' => $this->text()
        ]);

        $this->addForeignKey('FK_message_dialog', 'message', 'id_dialog', 'dialog', 'id');
        $this->addForeignKey('FK_message_user', 'message', 'id_user', 'user', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_message_dialog', 'message');
        $this->dropForeignKey('FK_message_user', 'message');
        $this->dropTable('{{%message}}');
    }
}
