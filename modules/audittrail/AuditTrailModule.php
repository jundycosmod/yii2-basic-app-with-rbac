<?php

namespace app\modules\audittrail;

/**
 * audittrail module definition class
 */
class AuditTrailModule extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\audittrail\controllers';
//    public $defaultRoute        = 'auditrail';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
