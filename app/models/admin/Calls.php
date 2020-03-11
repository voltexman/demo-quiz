<?php

namespace app\models\admin;

use app\models\AppModel;

class Calls extends AppModel
{
    const STATUS_NEW = 'Новый';
    const STATUS_SEEN = 0;

    const COLOR_NEW = 'danger';

    public $attributes = [
        'name' => '',
        'phone' => '',
        'date' => '',
        'time' => '',
        'status' => '',
        'color' => ''
    ];
}