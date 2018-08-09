<?php

namespace app\modules\audittrail\models;

use Yii;
use app\components\Rights;
use app\modules\profile\models\Profile;
use asinfotrack\yii2\audittrail\behaviors\AuditTrailBehavior;
use yii\db\Query;

/**
 * This is the model class for table "audit_trail_entry".
 *
 * @property integer $id
 * @property string $model_type
 * @property integer $happened_at
 * @property string $foreign_pk
 * @property integer $user_id
 * @property string $type
 * @property string $data
 *
 * @property User $user
 */
class AuditTrailEntry extends \yii\db\ActiveRecord {

    public $rights = array();

    public function setright() {
        $access_rights = new Rights();
        $access_rights->controller_id = Yii::$app->controller->module->id;
        return $this->rights = $access_rights->getRights();
    }

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'audit_trail_entry';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['model_type', 'happened_at', 'foreign_pk', 'type'], 'required'],
            [['happened_at', 'user_id'], 'integer'],
            [['data'], 'string'],
            [['model_type', 'foreign_pk', 'type'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'model_type' => Yii::t('app', 'Module'),
            'happened_at' => Yii::t('app', 'Happened At'),
            'foreign_pk' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User'),
            'type' => Yii::t('app', 'Action'),
            'data' => Yii::t('app', 'Changes'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser() {
        return $this->hasOne(Profile::className(), ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     * @return AuditTrailEntryQuery the active query used by this AR class.
     */
    public static function find() {
        return new AuditTrailEntryQuery(get_called_class());
    }

    public static function findModelTypes() {
        
        $model = (new yii\db\Query())
                ->select(['model_type',])
                ->from('audit_trail_entry')
                ->distinct()
                ->all();
//        $model = AuditTrailEntry::find()->select('model_type')->distinct()->all();

        return \yii\helpers\ArrayHelper::map($model, 'model_type', 'model_type');
    }

    public function behaviors() {
        return [
            // ...
            'audittrail' => [
                'class' => AuditTrailBehavior::className(),
                // some of the optional configurations
                'ignoredAttributes' => ['created_at', 'updated_at'],
                'consoleUserId' => 1,
//                'attributeOutput' => [
//                    'desktop_id' => function ($value) {
//                        $model = Desktop::findOne($value);
//                        return sprintf('%s %s', $model->manufacturer, $model->device_name);
//                    },
//                    'last_checked' => 'datetime',
//                ],
            ],
                // ...
        ];
    }

}
