<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dialog}}`.
 */
class m200617_160107_create_dialog_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%dialog}}', [
            'id' => $this->primaryKey(),
            'id_admin' => $this->integer(),
            'id_user' => $this->integer()
        ]);

        $this->addForeignKey('FK_dialog_admin', 'dialog', 'id_admin', 'user', 'id');
        $this->addForeignKey('FK_dialog_user', 'dialog', 'id_user', 'user', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_dialog_admin', 'dialog');
        $this->dropForeignKey('FK_dialog_user', 'dialog');
        $this->dropTable('{{%dialog}}');
    }
}
