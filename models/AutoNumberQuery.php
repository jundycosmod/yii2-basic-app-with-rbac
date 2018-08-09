<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[AutoNumber]].
 *
 * @see AutoNumber
 */
class AutoNumberQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return AutoNumber[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return AutoNumber|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
