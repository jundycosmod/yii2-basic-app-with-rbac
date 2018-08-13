<?php

use yii\db\Migration;

/**
 * Class m180813_050609_insert_default_menus_user_rights
 */
class m180813_050609_insert_default_menus_user_rights extends Migration {
    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->insert('system_menu', [
            'menu_name' => 'users',
            'caption' => 'Users',
            'link' => '/user/admin',
            'position' => 1,
            'enabled' => 1,
            'parent' => 'yii2-rbac',
            'requirement' => NULL,
            'icon' => 'users',
        ]);

        $this->insert('system_menu', [
            'menu_name' => 'access',
            'caption' => 'Access Control',
            'link' => '/access',
            'position' => 2,
            'enabled' => 1,
            'parent' => 'yii2-rbac',
            'requirement' => NULL,
            'icon' => 'lock',
        ]);

        $this->insert('user_rights', [
            'user_id' => 1,
            'menu_name' => 'users',
            'flag1' => 1,
            'flag2' => 1,
            'flag3' => 1,
            'flag4' => 1,
            'flag5' => 1,
        ]);

        $this->insert('user_rights', [
            'user_id' => 1,
            'menu_name' => 'access',
            'flag1' => 1,
            'flag2' => 1,
            'flag3' => 1,
            'flag4' => 1,
            'flag5' => 1,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {

        $this->delete('system_menu', ['menu_name' => 'users']);
        $this->delete('system_menu', ['menu_name' => 'access']);
        $this->delete('user_rights', ['AND', ['user_id' => 1], ['menu_name' => 'users']]);
        $this->delete('user_rights', ['AND', ['user_id' => 1], ['menu_name' => 'access']]);
    }

    /*
// Use up()/down() to run migration code without a transaction.
public function up()
{

}

public function down()
{
echo "m180813_050609_insert_default_menus_user_rights cannot be reverted.\n";

return false;
}
 */
}
