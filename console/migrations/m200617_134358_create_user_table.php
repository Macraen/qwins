<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m200617_134358_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'surname' => $this->string(50),
            'name' => $this->string(50),
            'patronymic' => $this->string(50),
            'password' => $this->string(255),
            'birth_date' => $this->string(10),
            'email' => $this->string(50),
            'phone_number' => $this->string(12),
            'country' => $this->string(50),
            'city' => $this->string(50),
            'status' => $this->integer(),
            'serial_number' => $this->string(50),
            'isAdmin' => $this->integer(),
            'avatar' => $this->string(255),
            'code_email_conf' => $this->string(255),
            'active' => $this->integer(),
            'token_reset_pass'=> $this->string(50),
//            'created_at' => $this->string(50),
//            'updated_at' => $this->string(50)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
