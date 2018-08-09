<?php

namespace app\models;

use Yii;
use app\components\Rights;

/**
 * This is the model class for table "auto_number".
 *
 * @property string $model
 * @property integer $number
 * @property integer $used
 * @property string $created_at
 * @property string $updated_at
 */
class AutoNumber extends \yii\db\ActiveRecord
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
        return 'auto_number';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model', 'number', 'used'], 'required'],
            [['number', 'used'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['model'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'model' => Yii::t('app', 'Model'),
            'number' => Yii::t('app', 'Number'),
            'used' => Yii::t('app', 'Used'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @inheritdoc
     * @return AutoNumberQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AutoNumberQuery(get_called_class());
    }
}
