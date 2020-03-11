<?php

namespace app\models\admin;

use app\models\AppModel;

class Result extends AppModel
{
    const STATUS_NEW = 1;
    const STATUS_SEEN = 0;

    public $attributes = [
        'questions' => '',
        'social' => '',
        'phone' => '',
        'date' => '',
        'time' => '',
        'status' => ''
    ];
}