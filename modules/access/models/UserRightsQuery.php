<?php

namespace app\modules\access\models;

/**
 * This is the ActiveQuery class for [[UserRights]].
 *
 * @see UserRights
 */
class UserRightsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return UserRights[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UserRights|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
