<?php

namespace app\controllers\admin;

use app\models\admin\IntegrationGoogle;
use app\models\admin\IntegrationMail;
use app\models\admin\IntegrationYandex;

class IntegrationController extends AdminController
{
    public function mailAction()
    {
        if ($_POST) {
            if (checkUser($_SESSION['user'])) {
                redirect();
            }
            $model = new IntegrationMail();
            $form = $_POST;

            $model->load($form);
            if (!$model->validate($form)) {
                $model->getErrors();
                redirect();
            }

            if ($model->update('integration_mail', '1')) {
                $_SESSION['success'] = 'Данные SMTP успешно изменены!';
            }
            redirect(ADMIN . '/integration/mail');
        }

        $mail = \R::findOne('integration_mail', 'id = ?', ['1']);

        $this->setMeta('Изменение SMTP данных почты');
        $this->setData(compact('mail'));
    }

    public function googleAction()
    {
        if ($_POST) {
            if (checkUser($_SESSION['user'])) {
                redirect();
            }
            $model = new IntegrationGoogle();
            $form = $_POST;

            $model->load($form);
            if (!$model->validate($form)) {
                $model->getErrors();
                redirect();
            }

            if ($model->update('integration_google', '1')) {
                $_SESSION['success'] = 'Google интеграция успешно изменена!';
            }
            redirect(ADMIN . '/integration/google');
        }

        $google = \R::findOne('integration_google', 'id = ?', ['1']);

        $this->setMeta('Изменение Google аналитики');
        $this->setData(compact('google'));
    }

    public function yandexAction()
    {
        if ($_POST) {
            if (checkUser($_SESSION['user'])) {
                redirect();
            }
            $model = new IntegrationYandex();
            $form = $_POST;

            $model->load($form);
            if (!$model->validate($form)) {
                $model->getErrors();
                redirect();
            }

            if ($model->update('integration_yandex', '1')) {
                $_SESSION['success'] = 'Yandex интеграция успешно изменена!';
            }
            redirect(ADMIN . '/integration/yandex');
        }

        $yandex = \R::findOne('integration_yandex', 'id = ?', ['1']);

        $this->setMeta('Изменение Yandex метрики');
        $this->setData(compact('yandex'));
    }
}