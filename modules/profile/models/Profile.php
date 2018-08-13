<?php

namespace app\modules\profile\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property integer $user_id
 * @property string $name
 * @property string $public_email
 * @property string $gravatar_email
 * @property string $gravatar_id
 * @property string $location
 * @property string $website
 * @property string $bio
 * @property string $timezone
 *
 * @property Customer[] $customers
 * @property User $user
 */
class Profile extends \yii\db\ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['bio'], 'string'],
            [['name', 'public_email', 'gravatar_email', 'location', 'website'], 'string', 'max' => 255],
            [['gravatar_id'], 'string', 'max' => 32],
            [['timezone'], 'string', 'max' => 40],
            //[['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'user_id' => Yii::t('app', 'User ID'),
            'name' => Yii::t('app', 'Name'),
            'public_email' => Yii::t('app', 'Public Email'),
            'gravatar_email' => Yii::t('app', 'Gravatar Email'),
            'gravatar_id' => Yii::t('app', 'Gravatar ID'),
            'location' => Yii::t('app', 'Location'),
            'website' => Yii::t('app', 'Website'),
            'bio' => Yii::t('app', 'Bio'),
            'timezone' => Yii::t('app', 'Timezone'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers() {
        return $this->hasMany(Customer::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     * @return ProfileQuery the active query used by this AR class.
     */
    public static function find() {
        return new ProfileQuery(get_called_class());
    }

    public static function getOptions() {
        $data = static::find()->all();
        $value = (count($data) == 0) ? ['' => ''] : \yii\helpers\ArrayHelper::map($data, 'user_id', 'name'); //id = your ID model, name = your caption

        return $value;
    }

    public function behaviors() {
        return [
            'audittrail' => [
                'class' => \asinfotrack\yii2\audittrail\behaviors\AuditTrailBehavior::className(),
                // some of the optional configurations
                'ignoredAttributes' => ['created_at', 'updated_at'],
                'consoleUserId' => 1,

            ],
        ];
    }
}
