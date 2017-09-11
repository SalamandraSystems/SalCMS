<?php

use yii\db\Migration;

/**
 * Handles the creation of table `posts`.
 */
class m170817_063520_create_posts_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%posts}}', [
            'id' => $this->primaryKey(),
            'title'=>$this->string('500')->notNull(),
            'description'=>$this->text()->notNull(),
            'user_id'=>$this->integer()->notNull(),
            'meta_title'=>$this->string('500')->null(),
            'meta_keywords'=>$this->text()->null(),
            'meta_description'=>$this->text()->null(),
            'status'=>$this->smallInteger(6)->defaultValue(0),
            'created_at'=>$this->dateTime()->null(),
            'updated_at'=>$this->dateTime()->null(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%posts}}');
    }
}
