<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comments}}`.
 */
class m200116_113258_create_comments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comments}}', [
            'id' => $this->primaryKey(),
			'text' => $this->string()->notNull(),
			'date' => $this->date()->notNull(),
			'request_id' => $this->integer(),
			
        ]);
		//$this->addForeignKey('fk-comments-request_id', '{{%comments}}', 'request_id', '{{%requests}}', 'id', 'CASCADE', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%comments}}');
    }
}
