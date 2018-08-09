<?php

namespace app\models;

use Yii;
use app\components\Rights;

/**
 * This is the model class for table "global_settings".
 *
 * @property string $settings_name
 * @property string $settings_value
 */
class GlobalSettings extends \yii\db\ActiveRecord
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
        return 'global_settings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['settings_name', 'settings_value'], 'required'],
            [['settings_name', 'settings_value'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'settings_name' => Yii::t('app', 'Settings Name'),
            'settings_value' => Yii::t('app', 'Settings Value'),
        ];
    }

    /**
     * @inheritdoc
     * @return GlobalSettingsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GlobalSettingsQuery(get_called_class());
    }
}
