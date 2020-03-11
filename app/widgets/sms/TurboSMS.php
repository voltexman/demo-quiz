<?php
namespace app\widgets\sms;

use mery\App;
use SoapClient;

class TurboSMS {

    private $login;
    private $password;

    public function __construct()
    {
        $this->login = App::$app->getProperty('turbo_sms_login');
        $this->password = App::$app->getProperty('turbo_sms_password');
    }


    public function send($phone, $msg){

        $result = false;

        try {
            header('Content-type: text/html; charset=utf-8');
            $client = new SoapClient('http://turbosms.in.ua/api/wsdl.html');
            $auth = [
                'login' => $this->login,
                'password' => $this->password
            ];
            // Авторизируемся на сервере
            $result = $client->Auth($auth);

            // Получаем количество доступных кредитов
            $result = $client->GetCreditBalance();
            // Текст сообщения ОБЯЗАТЕЛЬНО отправлять в кодировке UTF-8

            // Текст сообщения ОБЯЗАТЕЛЬНО отправлять в кодировке UTF-8
            $msg = iconv('windows-1251', 'utf-8', $msg);

            // Отправляем сообщение на один номер.
            // Подпись отправителя может содержать английские буквы и цифры. Максимальная длина - 11 символов.
            // Номер указывается в полном формате, включая плюс и код страны
            $sms = [
                'sender' => App::$app->getProperty('shop_name'),
                'destination' => $phone,
                'text' => $msg,
            ];

            $result = $client->SendSMS($sms);

            return $result;
        } catch(Exception $e) {
            echo 'Ошибка: ' . $e->getMessage() . PHP_EOL;
        }
        return $result;
    }

}