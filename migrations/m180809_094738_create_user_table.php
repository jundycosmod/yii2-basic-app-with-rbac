<?php
use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m180809_094738_create_user_table extends Migration {
    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string(255)->notNull()->unique(),
            'email' => $this->string(255)->notNull()->unique(),
            'password_hash' => $this->string(60)->notNull(),
            'auth_key' => $this->string(32)->notNull(),
            'confirmed_at' => $this->integer(11),
            'unconfirmed_email' => $this->string(255),
            'blocked_at' => $this->integer(11),
            'registration_ip' => $this->string(45),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'flags' => $this->integer(11),
            'last_login_at' => $this->integer(11),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->dropTable('user');
    }
}
