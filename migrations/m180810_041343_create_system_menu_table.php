<?php

use yii\db\Migration;

/**
 * Handles the creation of table `system_menu`.
 */
class m180810_041343_create_system_menu_table extends Migration {
/**
 * {@inheritdoc}
 */
    public function safeUp() {
        $this->createTable('system_menu', [
            'id' => $this->primaryKey(),
            'menu_name' => $this->string(45)->notNull()->unique(),
            'caption' => $this->string(100)->notNull(),
            'link' => $this->string(100),
            'position' => $this->integer(11),
            'enabled' => $this->boolean(11),
            'parent' => $this->string(45),
            'requirement' => $this->string(45),
            'icon' => $this->string(45),

        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->dropTable('system_menu');
    }
}
