<?php

namespace app\components;

use Yii;
use yii\base\Component;

class FindConstraintTable extends Component{
    
    public static function getTableName($rawMsg) {
        preg_match('/`.`([^`]*)/', $rawMsg, $match);
        return $match[1];
    }
}