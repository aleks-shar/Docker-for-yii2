<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%entities}}`.
 */
class m250621_144031_create_entities_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%entities}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%entities}}');
    }
}
