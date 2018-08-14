<?php

use yii\db\Migration;

/**
 * Class m180814_062701_insert_audittrail_menu
 */
class m180814_062701_insert_audittrail_menu extends Migration {
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
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m180814_062701_insert_audittrail_menu cannot be reverted.\n";

        return false;
    }

    /*
// Use up()/down() to run migration code without a transaction.
public function up()
{

}

public function down()
{
echo "m180814_062701_insert_audittrail_menu cannot be reverted.\n";

return false;
}
 */
}
