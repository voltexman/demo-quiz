<?php

namespace app\controllers;

use app\models\admin\Calls;
use app\models\admin\Question;
use app\models\admin\Result;
use app\models\admin\Visitor;
use app\models\Statistic;
use Detection\MobileDetect;
use DeviceDetector\DeviceDetector;
use site\App;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class MainController extends AppController
{
    const STATUS_NEW = 1;

    public function indexAction()
    {
        $_SESSION['url'] = $_GET;

        $main = \R::findOne('main', 'id = 1');
//        $polls = \R::getAll("SELECT * FROM poll WHERE active = ?", ['on']);
        $contacts = \R::findOne('contacts', 'id = 1');
        $phones = json_decode($contacts->phones);
        $form = \R::findOne('form', 'id = 1');
        $logo = \R::findOne('logo', 'id = 1');
        $bonuses = \R::getAll("SELECT * FROM bonus WHERE status = 'on' ORDER BY id DESC LIMIT 2");
        $themes = \R::findOne('themes', 'id = 1');
        $integrationGoogle = \R::findOne('integration_google', 'id = 1');
        $integrationYandex = \R::findOne('integration_yandex', 'id = 1');

        self::visitors();

        $_SESSION['class_color'] = $themes['theme_color'];
        $_SESSION['integration_google'] = $integrationGoogle['tag_id'];
        $_SESSION['integration_yandex'] = $integrationYandex['tag_id'];

        $metaTitle = $main['title'];

        $model = new Question();
        $questions = $model->getAllActiveQuestions();

        $answers = [];
        foreach ($questions as $question) {
            $answers[$question['id']] = $model->getAnswersByQuestionId($question['id']);
        }

        $this->setMeta($metaTitle);
        $this->setData(compact('main', 'contacts', 'phones', 'form', 'questions', 'answers', 'logo', 'bonuses'));
    }

    public static function visitors()
    {
        $visitorModel = new Visitor();
        $statisticModel = new Statistic();
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        $hasVisitor = \R::findOne('visitors', 'ip_address = ?', [$ipAddress]);
        $hasToday = \R::findOne('statistics', 'date = ?', [date('Y-m-d')]);

        if (!$hasVisitor) {
            $userAgent = $_SERVER['HTTP_USER_AGENT'];
            $deviceDetect = new DeviceDetector($userAgent);
            $deviceDetect->parse();

            if (!$deviceDetect->isBot()) {
                $data['device'] = $deviceDetect->getDeviceName();
                $data['browser'] = $deviceDetect->getClient('name');
                $data['os'] = $deviceDetect->getOs('name');
            }

            $data['ip_address'] = $ipAddress;
            $data['city'] = self::getCity($ipAddress);
            $data['date'] = date('Y-m-d');
            $data['time'] = date('H:i:s');
            $visitorModel->load($data);
            $visitorModel->save('visitors');
        }

        if (!$hasToday) {
            $statisticData['visit_count'] = 1;
            $statisticData['date'] = date('Y-m-d');

            $statisticModel->load($statisticData);
            $statisticModel->save('statistics');
        } else {
            \R::exec("UPDATE statistics set visit_count = visit_count + 1 WHERE date = ?", [date('Y-m-d')]);
        }
    }

    protected static function getCity($ipAddress)
    {
        $requestCity = file_get_contents("http://api.sypexgeo.net/json/" . $ipAddress);
        $arrayCity = json_decode($requestCity);
        return $arrayCity->city->name_ru;
    }

    public function callBackAction()
    {
        $model = new Calls();
        $form = $_POST;
        $form['date'] = date('Y-m-d');
        $form['time'] = date('H:i');
        $form['status'] = $model::STATUS_NEW;
        $form['color'] = $model::COLOR_NEW;
        $model->load($form);
        $model->save('calls');
        redirect(PATH . '/main/thanks');
        die();
    }

    public function responseResultAction()
    {

        if (!empty($_POST)) {

            $results = '<p>Пусто</p>';

            if (!empty($_POST['question']) && !empty($_POST['id'])){
                $questions = [];

                foreach ($_POST['question'] as $i => $question){
                    if(!empty($_POST['id'][$i])){
                        $questions[$_POST['id'][$i]] = $question;
                    }
                }

                $array = [];
                foreach ($questions as $id => $question){
                    $answer = '';
                    if (isset($_POST['answer-' . $id])){
                        $answers = $_POST['answer-' . $id];
                        $answers = array_filter($answers);
                        $answer .= implode(", ", $answers);
                    }
                    $array[] = '<p><b>' . $question . '</b>' . ' - ' .  $answer . '</p>';

                }
                $results = implode($array, '');
            }


            if ($_POST['form-type'] == 'social') {

                if (empty($_POST['user-date-name'])) {
                    $social = $_POST['social-option'] == 'phone' ? 'телефон' : $_POST['social-option'];
                    $messageText =
                        '<h1>Ответы на вопросы</h1>' . $results .
                        '<p><b>Прислать ответ на: </b>' . $social . '</p>
                    <p><b>Контактный телефон: </b>' . '+' . $_POST['__phone_prefix'] . $_POST['user-date-phone'] . '</p>';
                } else {
                    $messageText =
                        '<h1>Ответы на вопросы</h1>' . $results .
                        '<p><b>Прислать ответ на: </b>' . $_POST['social-option'] . '</p>
                    <p><b>Логин: </b>' . $_POST['user-date-name'] . '</p>';
                }

            } elseif ($_POST['form-type'] == 'standard') {
                $name = isset($_POST['get-results-name']) ? $_POST['get-results-name'] : 'не указано';
                $mail = isset($_POST['get-results-mail']) ? $_POST['get-results-mail'] : 'не указано';
                $phone = isset($_POST['get-results-phone']) ? $_POST['get-results-phone'] : 'не указано';

                $messageText =
                    '<h2>ОТВТЫ НА ВОПРОСЫ</h2>' . $results .
                    '<p><h4>КОНТАКТНЫЕ ДАННЫЕ</h4></p>' .
                    '<p><b>Имя: </b>' . $name . '</p>' .
                    '<p><b>Email: </b>' . $mail . '</p>' .
                    '<p><b>Телефон: </b>' . $phone . '</p>';
            }

            $utmMark = '';

            if (!empty($_SESSION['url'])) {
                $utmMark =
                    '<hr>' .
                    '<p><b>UTM-метки:</b></p>' .
                    '<p>source: ' . $_SESSION['url']['utm_source'] . '</p>' .
                    '<p>medium: ' . $_SESSION['url']['utm_medium'] . '</p>' .
                    '<p>campaign: ' . $_SESSION['url']['utm_campaign'] . '</p>' .
                    '<p>term: ' . str_replace('%', ' ', $_SESSION['url']['utm_term']) . '</p>';

                $messageText .= $utmMark;
            }

            unset($_SESSION['url']);

            $model = new Result();
            $data['questions'] = $results . $utmMark;
            $data['date'] = date('Y-m-d');
            $data['time'] = date('H:i');

            if ($_POST['form-type'] == 'standard') {
                $data['social'] = !empty($_POST['get-results-phone']) ? 'Телефон' : 'Email';
                $data['phone'] = !empty($_POST['get-results-phone']) ? $_POST['get-results-phone'] : $_POST['get-results-mail'];
            } elseif ($_POST['form-type'] == 'social') {
                if (empty($_POST['user-date-name'])) {
                    $data['social'] = $_POST['social-option'] == 'phone' ? 'телефон' : $_POST['social-option'];
                    $data['phone'] = '+' . $_POST['__phone_prefix'] . $_POST['user-date-phone'];
                } else {
                    $data['social'] = $_POST['social-option'] == 'phone' ? 'Телефон' : $_POST['social-option'];
                    $data['phone'] = $_POST['user-date-name'];
                }
            }

            $data['status'] = $model::STATUS_NEW;
            $model->load($data);
            $model->save('results');

            \R::exec("UPDATE statistics set result_count = result_count + 1 WHERE date = ?", [date('Y-m-d')]);

            $integrationMail = \R::findOne('integration_mail', 'id = 1');

            // Create the Transport
            $transport = (new Swift_SmtpTransport($integrationMail->smtp_host, $integrationMail->smtp_port, $integrationMail->smtp_protocol))
                ->setUsername($integrationMail->smtp_login)
                ->setPassword($integrationMail->smtp_password);

            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);

            // Create a message
            $message = (new Swift_Message('Ответы с сайта ' . $_SERVER['SERVER_NAME']))
                ->setContentType("text/html")
                ->setFrom([$integrationMail->email_from => $_SERVER['SERVER_NAME']])
                ->setTo($integrationMail->email_to)
                ->setBody($messageText);

            // Send the message
            $result = $mailer->send($message);

            if ($result) {
                echo 'ok';
            }
        }
        die();
    }

    public function sendPhoneAction()
    {
        if (!empty($_POST)) {
            $phone = $_POST['phone'] ? trim(htmlspecialchars(str_replace(" ", "", $_POST['phone']))) : null;

            $messageText = '
                    <h1>Новая заявка</h1>
                    
                    <p><b>Телефон </b> - ' . $phone . ' </p>';


            // Create the Transport
            $transport = (new Swift_SmtpTransport(App::$app->getProperty('smtp_host'), App::$app->getProperty('smtp_port'), App::$app->getProperty('smtp_protocol')))
                ->setUsername(App::$app->getProperty('smtp_login'))
                ->setPassword(App::$app->getProperty('smtp_password'));

            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);

            // Create a message
            $message = (new Swift_Message('Заявка с сайта ' . $_SERVER['SERVER_NAME']))
                ->setContentType("text/html")
                ->setFrom([App::$app->getProperty('admin_email_from') => $_SERVER['SERVER_NAME']])
                ->setTo(App::$app->getProperty('admin_email_to'))
                ->setBody($messageText);

            // Send the message
            $result = $mailer->send($message);

            if ($result) {
                redirect(PATH . '/main/thanks');
            }

        }
        redirect();
    }

    public function thanksAction()
    {
        $main = \R::findOne('main', 'id = 1');
        $contacts = \R::findOne('contacts', 'id = 1');
        $phones = json_decode($contacts->phones);
        $form = \R::findOne('form', 'id = 1');

        $this->setData(compact('main', 'contacts', 'phones', 'form'));
    }
}
