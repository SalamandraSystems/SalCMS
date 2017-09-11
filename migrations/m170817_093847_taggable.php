<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

class m170817_093847_taggable extends Migration
{
    public function up()
    {
        $this->createTable('{{%tag}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'frequency' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 0',
        ]);
        $this->createTable('{{%post_tag_assn}}', [
            'post_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'tag_id' => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);
        $this->addPrimaryKey('', '{{%post_tag_assn}}', ['post_id', 'tag_id']);
    }

    public function down()
    {
        $this->dropTable('{{%tag}}');
        $this->dropTable('{{%post_tag_assn}}');
    }
}
