<?php

use yii\db\Migration;

/**
 * Class m180813_044511_insert_users
 */
class m180813_044511_insert_users extends Migration {
    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->insert('user', [
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password_hash' => '$2y$12$OMxM9TapU2c7Er7BWe2V7.qMBB6HjEIdX5tntzg4Fpy/2zb1bjawC',
            'auth_key' => 'q3qQADSdSDX91397VV4gz4SeBDn7R257',
            'confirmed_at' => 1478672215,
            'registration_ip' => '127.0.0.1',
            'created_at' => 1478672215,
            'updated_at' => 1481157265,
            'flags' => 0,
            'last_login_at' => 1533795929,
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->delete('user', ['username' => 'admin']);
        $this->execute("ALTER TABLE user AUTO_INCREMENT = 1");

    }

    /*
// Use up()/down() to run migration code without a transaction.
public function up()
{

}

public function down()
{
echo "m180813_044511_insert_users cannot be reverted.\n";

return false;
}
 */
}
