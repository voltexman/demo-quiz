<?php

namespace app\controllers\admin;

use app\models\admin\User;
use site\App;
use site\libs\Pagination;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class UserController extends AdminController {

    public function loginAdminAction(){
        $this->layout = 'login_admin';
        if (!empty($_POST)){
            $user = new User();
            if ($user->login(true)){
                $_SESSION['success'] = 'Success!';
            } else {
                $_SESSION['errors'] = 'Error! Логин или пароль неверны.';
            }
            if (User::isAdmin()){
                redirect(ADMIN);
            } else {
                redirect();
            }
        }
    }

    public function recoveryAction(){
        $this->layout = 'login_admin';
        if (!empty($_POST)){
            $user = new User();
            if ($user = $user->recovery(true)){
                $_SESSION['success'] = 'Успешно!';

                $password = base64_decode($user->password);
                $messageText = 'Ваш пароль: ' . $password;

                $integrationMail = \R::findOne('integration_mail', 'id = 1');

                // Create the Transport
                $transport = (new Swift_SmtpTransport($integrationMail->smtp_host, $integrationMail->smtp_port, $integrationMail->smtp_protocol))
                    ->setUsername($integrationMail->smtp_login)
                    ->setPassword($integrationMail->smtp_password);

                // Create the Mailer using your created Transport
                $mailer = new Swift_Mailer($transport);

                // Create a message
                $message = (new Swift_Message('Восстановление пароля на сайте:  ' . $_SERVER['SERVER_NAME']))
                    ->setContentType("text/html")
                    ->setFrom([$integrationMail->email_from => $_SERVER['SERVER_NAME']])
                    ->setTo($user->email)
                    ->setBody($messageText);

                // Send the message
                $result = $mailer->send($message);

                redirect(ADMIN . '/user/login-admin');
            } else {
                $_SESSION['errors'] = 'Error! Логин неверный.';
                redirect();
            }
            if (User::isAdmin()){

                redirect(ADMIN);
            } else {
                redirect();
            }
        }
    }


    public function indexAction(){
        if (!User::isMainAdmin()){
            redirect(ADMIN);
        }
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $perpage = 50;
        $count = \R::count('user');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $users = \R::findAll('user', "LIMIT $start, $perpage");
        $this->setMeta('Все пользователи');
        $this->setData(compact('users', 'pagination', 'count'));
    }


    public function editAction(){
        if (!User::isMainAdmin()){
            redirect(ADMIN);
        }
        if (!empty($_POST)){
            if (checkUser($_SESSION['user'])) {
                redirect();
            }
            $id = $this->getRequestId(false);
            $user = new User();
            $data = $_POST;
            $user->load($data);
            if (!$user->attributes['password']){
                unset($user->attributes['password']);
            } else {
                $user->attributes['password'] = base64_encode($user->attributes['password']);
            }
            if (!$user->validate($data) || !$user->isUnique()){
                $user->getErrors();
                redirect();
            }
            if ($user->update('user', $id)){
                $_SESSION['success'] = 'Сохранено!';
            }
            redirect();
        }
        $user_id = $this->getRequestId();
        $user = \R::load('user', $user_id);
        $this->setMeta('Edit user profile');
        $this->setData(compact('user'));
    }



    public function deleteAction(){
        if (!User::isMainAdmin()){
            redirect(ADMIN);
        }
        $user_id = $this->getRequestId();
        $user = \R::load('user', $user_id);
        \R::trash($user);
        $_SESSION['success'] = 'Пользователь удален!';
        redirect();
    }

}