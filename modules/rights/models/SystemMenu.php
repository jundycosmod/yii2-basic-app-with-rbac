<?php

namespace app\modules\rights\models;

use Yii;
use app\components\Rights;

/**
 * This is the model class for table "system_menu".
 *
 * @property integer $id
 * @property string $menu_name
 * @property string $caption
 * @property string $link
 * @property integer $position
 * @property integer $enabled
 * @property string $parent
 * @property string $requirement
 * @property string $icon
 *
 * @property RoleRights[] $roleRights
 * @property UserRights[] $userRights
 */
class SystemMenu extends \yii\db\ActiveRecord
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
        return 'system_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['menu_name', 'caption'], 'required'],
            [['position', 'enabled'], 'integer'],
            [['menu_name', 'parent', 'requirement', 'icon'], 'string', 'max' => 45],
            [['caption', 'link'], 'string', 'max' => 100],
            [['menu_name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'menu_name' => Yii::t('app', 'Menu Name'),
            'caption' => Yii::t('app', 'Caption'),
            'link' => Yii::t('app', 'Link'),
            'position' => Yii::t('app', 'Position'),
            'enabled' => Yii::t('app', 'Enabled'),
            'parent' => Yii::t('app', 'Parent'),
            'requirement' => Yii::t('app', 'Requirement'),
            'icon' => Yii::t('app', 'Icon'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoleRights()
    {
        return $this->hasMany(RoleRights::className(), ['menu_name' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserRights()
    {
        return $this->hasMany(UserRights::className(), ['menu_name' => 'menu_name']);
    }

    /**
     * @inheritdoc
     * @return SystemMenuQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SystemMenuQuery(get_called_class());
    }
}
