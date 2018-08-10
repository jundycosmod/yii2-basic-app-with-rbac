<?php

use yii\db\Migration;

/**
 * Handles the creation of table `roles`.
 */
class m180810_043940_create_roles_table extends Migration {
    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->createTable('roles', [
            'id' => $this->primaryKey(),
            'role_description' => $this->string(150)->notNull(),
            'created_at' => $this->timestamp() . ' DEFAULT CURRENT_TIMESTAMP ',
            'updated_at' => $this->timestamp() . ' DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',

        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->dropTable('roles');
    }
}
