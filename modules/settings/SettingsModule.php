<?php

namespace app\modules\settings;

/**
 * settings module definition class
 */
class SettingsModule extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\settings\controllers';
    public $defaultRoute        = 'settings';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
