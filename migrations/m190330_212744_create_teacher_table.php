<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%teacher}}`.
 */
class m190330_212744_create_teacher_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%teacher}}', [
            'id' => $this->primaryKey(),
			'form_ids' => $this->string(),
			'fname' => $this->string(),
			'lname' => $this->string(),
			'age' => $this->integer(),
			'experience' => $this->integer(),
			'education' => $this->string(),
			'email' => $this->string(),
			'password' => $this->string(),
			'image' => $this->string(),
			'eduprogram_ids' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%teacher}}');
    }
}
