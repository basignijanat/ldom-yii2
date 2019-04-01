<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%price}}`.
 */
class m190330_212906_create_price_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%price}}', [
            'id' => $this->primaryKey(),
			'eduform_id' => $this->string(),
			'name' => $this->string(),
			'value' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%price}}');
    }
}
