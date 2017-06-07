<?php

use yii\db\Migration;

/**
 * Handles the creation of table `rest_token`.
 */
class m170606_074341_create_rest_token_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('rest_token', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'code' => $this->string(32),
            'created_at' => $this->integer()
        ]);
        
        $this->addForeignKey('fk-rest_token-user_id', 'rest_token', 'user_id', 'user', 'id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk-rest_token-user_id', 'rest_token');
        $this->dropTable('rest_token');
    }
}
