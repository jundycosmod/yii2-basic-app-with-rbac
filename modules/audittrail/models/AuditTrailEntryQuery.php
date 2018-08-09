<?php

namespace app\modules\audittrail\models;

/**
 * This is the ActiveQuery class for [[AuditTrailEntry]].
 *
 * @see AuditTrailEntry
 */
class AuditTrailEntryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return AuditTrailEntry[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return AuditTrailEntry|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
