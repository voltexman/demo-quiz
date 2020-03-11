<?php

namespace app\models\admin;

use app\models\AppModel;

class IntegrationMail extends AppModel
{
    public $attributes = [
        'email_to' => '',
        'email_from' => '',
        'smtp_host' => '',
        'smtp_port' => '',
        'smtp_protocol' => '',
        'smtp_login' => '',
        'smtp_password' => ''
    ];

    public $rules = [
        'email' => ['email'],
        'required' => ['email_to', 'email_from', 'smtp_host', 'smtp_port', 'smtp_protocol', 'smtp_login', 'smtp_password']
    ];
}