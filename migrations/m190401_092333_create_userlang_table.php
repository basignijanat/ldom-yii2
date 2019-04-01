<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%userlang}}`.
 */
class m190401_092333_create_userlang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%userlang}}', [
            'id' => $this->primaryKey(),
			'name' => $this->string(),
			'short_name' => $this->string(),
			'value' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%userlang}}');
    }
}
