<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%eduform}}`.
 */
class m190330_212718_create_eduform_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%eduform}}', [
            'id' => $this->primaryKey(),
			'meta_title' => $this->string(),
			'meta_description' => $this->text(),
			'name' => $this->string(),
			'content' => $this->text(),
			'language_id' => $this->string(),
			'teacher_ids' => $this->string(),
			'prices' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%eduform}}');
    }
}
