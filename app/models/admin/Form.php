<?php

namespace app\models\admin;

use app\models\AppModel;

class Form extends AppModel
{
    public $attributes = [
        'text' => '',
        'last_comment' => '',
        'politics' => '',
        'title' => '',
        'button' => '',
        'form_type' => '',
        'viber' => '',
        'telegram' => '',
        'whatsapp' => '',
        'by_phone' => '',
        'instagram' => '',
        'facebook' => '',
        'standard_name' => '',
        'standard_email' => '',
        'standard_phone' => '',
        'standard_name_required' => '',
        'standard_email_required' => '',
        'standard_phone_required' => '',
        'thanks_text' => '',
        'thanks_title' => '',
        'thanks_button' => '',
        'thanks_link' => '',
        'thanks_video' => ''
    ];

    public $rules = [
        'required' => ['text', 'title', 'button', 'thanks_text']
    ];
}