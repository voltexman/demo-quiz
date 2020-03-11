<?php

namespace app\controllers\admin;

use app\models\admin\Colors;

class ColorsController extends AdminController
{
    public function indexAction()
    {
        if ($_POST) {
            if (checkUser($_SESSION['user'])) {
                redirect();
            }
            $model = new Colors();
            $form = $_POST;

            $model->load($form);
            if (!$model->validate($form)) {
                $model->getErrors();
                redirect();
            }

            if ($model->update('themes', 1)) {
                $_SESSION['success'] = 'Тема успешно изменена!';
            }
            redirect(ADMIN . '/colors');
        }

        $theme = \R::findOne('themes', 'id = ?', ['1']);

        $this->setMeta('Изменение цветовой схемы');
        $this->setData(compact('theme'));

    }
}
