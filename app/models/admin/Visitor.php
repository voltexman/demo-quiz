<?php

namespace app\models\admin;

use app\models\AppModel;

class Visitor extends AppModel
{
    public $attributes = [
        'ip_address' => '',
        'city' => '',
        'date' => '',
        'time' => '',
        'device' => '',
        'browser' => '',
        'os' => ''
    ];
}