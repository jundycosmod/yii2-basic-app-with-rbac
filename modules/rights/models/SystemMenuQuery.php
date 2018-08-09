<?php

namespace app\modules\rights\models;

/**
 * This is the ActiveQuery class for [[SystemMenu]].
 *
 * @see SystemMenu
 */
class SystemMenuQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SystemMenu[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SystemMenu|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
