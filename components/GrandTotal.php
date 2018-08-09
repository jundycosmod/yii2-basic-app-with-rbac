<?php

namespace app\components;

class GrandTotal {

    public static function pageTotal($provider, $fieldName) {
        $total = 0;
        foreach ($provider as $item) {
            $total += $item[$fieldName];
        }
        return $total;
    }
}
    