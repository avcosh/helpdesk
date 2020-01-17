<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%requests}}`.
 */
class m200116_105821_create_requests_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%requests}}', [
            'id' => $this->primaryKey(),
			'name' => $this->string()->notNull(),
		    'type' => $this->smallInteger()->notNull(),
			'priority' => $this->smallInteger()->notNull(),
			'description' => $this->string()->notNull(),
			'client_email' => $this->string(),
        ]);
		$this->createIndex('idx-requests-type', '{{%requests}}', 'type');
		$this->createIndex('idx-requests-priority', '{{%requests}}', 'priority');
		
		
		//$this->addForeignKey('fk-requests-client_email', '{{%requests}}', 'client_email', '{{%clients}}', 'email');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%requests}}');
    }
}
