<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%curriculum}}`.
 */
class m190330_213329_create_curriculum_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%curriculum}}', [
            'id' => $this->primaryKey(),
			'name' => $this->string(),
			'content' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%curriculum}}');
    }
}
