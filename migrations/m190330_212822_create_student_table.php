<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%student}}`.
 */
class m190330_212822_create_student_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%student}}', [
            'id' => $this->primaryKey(),
			'eduform_ids' => $this->string(),
			'email' => $this->string(),
			'password' => $this->string(),
			'image' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%student}}');
    }
}
