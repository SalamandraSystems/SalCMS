<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m170816_064619_create_users_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(32)->unique()->notNull(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string(255)->notNull(),
            'password_reset_token' => $this->string(255)->null(),
            'email' => $this->string(255)->notNull(),
            'status' => $this->smallInteger(6)->defaultValue(0),
            'created_at' => $this->dateTime()->null(),
            'updated_at' => $this->dateTime()->null(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%users}}');
    }
}
