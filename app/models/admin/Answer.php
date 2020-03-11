<?php

namespace app\models\admin;

use app\models\AppModel;

class Answer extends AppModel
{
    public $attributes = [
        'question_id' => '',
        'file' => '',
        'text' => ''
    ];
}