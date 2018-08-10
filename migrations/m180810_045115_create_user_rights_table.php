<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_rights`.
 */
class m180810_045115_create_user_rights_table extends Migration {
    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->createTable('user_rights', [
            'user_id' => $this->integer(11)->notNull(),
            'menu_name' => $this->string(45)->notNull(),
            'flag1' => $this->boolean(),
            'flag2' => $this->boolean(),
            'flag3' => $this->boolean(),
            'flag4' => $this->boolean(),
            'flag5' => $this->boolean(),
            'PRIMARY KEY(user_id, menu_name)',
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

        $this->addForeignKey(
            'fk_user_rights_1',
            'user_rights',
            'menu_name',
            'system_menu',
            'menu_name',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_user_rights_2',
            'user_rights',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->dropTable('user_rights');
    }
}
