<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%verification}}`.
 */
class m200619_103713_create_verification_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%verification}}', [
            'user_id' => $this->integer(),
            'date_time' => $this->string(20),
            'serial_number' => $this->string(255),
            'expire_date' => $this->string(10),
            'issued_by' => $this->string(255),
            'address' => $this->string(100),
            'photo_first' => $this->string(255),
            'photo_first' => $this->string(255),
            'photo_second' => $this->string(255),
            'photo_second' => $this->string(255),
            'photo_registration' => $this->string(255),
            'status' => $this->integer()
        ]);

        $this->addForeignKey('FK_verification_user', 'verification', 'user_id', 'user', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_verification_user', 'verification');
        $this->dropTable('{{%verification}}');
    }
}
