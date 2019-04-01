<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%language}}`.
 */
class m190330_212015_create_language_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%language}}', [
            'id' => $this->primaryKey(),
			'meta_title' => $this->string(),
			'meta_description' => $this->text(),
			'name' => $this->string(),
			'content' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%language}}');
    }
}
