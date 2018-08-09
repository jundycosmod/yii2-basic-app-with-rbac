<?php

namespace app\modules\rights\models;

use Yii;
use app\components\Rights;

/**
 * This is the model class for table "user_rights".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $menu_name
 * @property integer $flag1
 * @property integer $flag2
 * @property integer $flag3
 * @property integer $flag4
 * @property integer $flag5
 *
 * @property SystemMenu $menuName
 * @property User $user
 */
class UserRights extends \yii\db\ActiveRecord
{
    public $rights =array();

    public function setright() {
        $access_rights = new Rights();
        $access_rights->controller_id = Yii::$app->controller->module->id;
        return $this->rights = $access_rights->getRights();
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_rights';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'menu_name'], 'required'],
            [['user_id', 'flag1', 'flag2', 'flag3', 'flag4', 'flag5'], 'integer'],
            [['menu_name'], 'string', 'max' => 45],
            [['menu_name'], 'exist', 'skipOnError' => true, 'targetClass' => SystemMenu::className(), 'targetAttribute' => ['menu_name' => 'menu_name']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'menu_name' => Yii::t('app', 'Menu Name'),
            'flag1' => Yii::t('app', 'Flag1'),
            'flag2' => Yii::t('app', 'Flag2'),
            'flag3' => Yii::t('app', 'Flag3'),
            'flag4' => Yii::t('app', 'Flag4'),
            'flag5' => Yii::t('app', 'Flag5'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenuName()
    {
        return $this->hasOne(SystemMenu::className(), ['menu_name' => 'menu_name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     * @return UserRightsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserRightsQuery(get_called_class());
    }
}
