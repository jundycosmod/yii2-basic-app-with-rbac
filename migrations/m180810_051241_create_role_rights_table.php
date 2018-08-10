<?php

use yii\db\Migration;

/**
 * Handles the creation of table `role_rights`.
 */
class m180810_051241_create_role_rights_table extends Migration {
    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->createTable('role_rights', [
            'role_id' => $this->integer(11)->notNull(),
            'menu_name' => $this->string(45)->notNull(),
            'flag1' => $this->boolean(),
            'flag2' => $this->boolean(),
            'flag3' => $this->boolean(),
            'flag4' => $this->boolean(),
            'flag5' => $this->boolean(),
            'PRIMARY KEY(role_id, menu_name)',
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

        $this->addForeignKey(
            'fk_role_rights_1',
            'role_rights',
            'menu_name',
            'system_menu',
            'menu_name',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_role_rights_2',
            'role_rights',
            'role_id',
            'roles',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->dropTable('role_rights');
    }
}
