<?php

use yii\db\Migration;

/**
 * Class m180813_053516_insert_user_profile
 */
class m180813_053516_insert_user_profile extends Migration {
    /**
     * {@inheritdoc}
     */
    public function safeUp() {

        $this->insert('profile', [
            'user_id' => 1,
            'name' => 'Admin User',
            'public_email' => 'admin@gmail.com',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {

        $this->delete('profile', ['user_id' => 1]);
    }

    /*
// Use up()/down() to run migration code without a transaction.
public function up()
{

}

public function down()
{
echo "m180813_053516_insert_user_profile cannot be reverted.\n";

return false;
}
 */
}
