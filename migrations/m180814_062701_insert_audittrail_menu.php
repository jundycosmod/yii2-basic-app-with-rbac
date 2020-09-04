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
            'menu_name' => 'audittrail',
            'caption' => 'Audit Trail',
            'link' => '/audittrail',
            'position' => 1,
            'enabled' => 1,
            'parent' => 'yii2-rbac',
            'requirement' => NULL,
            'icon' => 'history',
        ]);

        $this->insert('user_rights', [
            'user_id' => 1,
            'menu_name' => 'audittrail',
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
