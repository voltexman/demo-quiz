<?php

namespace app\models\admin;

use app\models\AppModel;

class PollImages extends AppModel
{
    public $attributes = [
        'question_id' => '',
        'name' => '',
        'text' => ''
    ];
}