<?php

namespace app\modules\settings\models;

/**
 * This is the ActiveQuery class for [[GlobalSettings]].
 *
 * @see GlobalSettings
 */
class GlobalSettingsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return GlobalSettings[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return GlobalSettings|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
