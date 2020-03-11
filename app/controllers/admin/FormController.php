<?php

namespace app\controllers\admin;

use app\models\admin\Form;

class FormController extends AdminController
{
    public function indexAction()
    {
        if (!empty($_POST)) {
            if (checkUser($_SESSION['user'])) {
                redirect();
            }
            $model = new Form();
            $form = $_POST;

            $model->load($form);
            if (!$model->validate($form)) {
                $model->getErrors();
                redirect();
            }
            if ($model->update('form', 1)) {
                $_SESSION['success'] = 'Данные формы успешно изменены!';
            }
            redirect(ADMIN . '/form');
        }

        $form = \R::findOne('form', 'id = ?', ['1']);

        $this->setMeta('Изменение формы опроса');
        $this->setData(compact('form'));
    }
}