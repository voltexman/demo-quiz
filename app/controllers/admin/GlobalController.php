<?php

namespace app\controllers\admin;

use app\models\admin\MainPage;
use site\App;

class GlobalController extends AdminController
{
    public function indexAction()
    {
        if (!empty($_POST)) {
            if (checkUser($_SESSION['user'])) {
                redirect();
            }
//            $id = $this->getRequestId(false);
            $model = new MainPage();
            $data = $_POST;
            $model->load($data);
            $model->getImg();
            if (!$model->validate($data)) {
                $model->getErrors();
                redirect();
            }
            if ($model->update('main', 1)) {
                $_SESSION['success'] = 'Стартовая страница успешно изменена!';
            }
            redirect(ADMIN . '/global');
        }
//        $id = (int)$this->getRequestId();
        $global = \R::findOne('main', 'id = ?', ['1']);

        $this->setMeta('Изменение стартовой страницы');
        $this->setData(compact('global'));
    }

    public function removeImageFileAction()
    {
        if (!empty($_POST)) {
            if (checkUser($_SESSION['user'])) {
                redirect();
            }
            $fileName = $_POST['name'] ? htmlspecialchars($_POST['name']) : null;
            @unlink(WWW . '/upload/main/' . $fileName);
            echo json_encode(['result' => 'success']);
        }
        die();
    }

    public function addImageAction()
    {
        if (checkUser($_SESSION['user'])) {
            redirect();
        }
        $wmax = App::$app->getProperty('main_img_width');
        $hmax = App::$app->getProperty('main_img_height');
        $name = 'file';
        $model = new MainPage();
        $model->uploadImg($name, $wmax, $hmax);
        die();
    }

    public function deleteImageAction()
    {
        if (checkUser($_SESSION['user'])) {
            redirect();
        }
        $res = false;
        $id = isset($_POST['id']) ? (int)$_POST['id'] : null;
        $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : null;

        if (!$id || !$name) {
            echo json_encode($res);
            die();
        }

        $bonus = \R::find('main', ' id = ? AND image = ?', [$id, $name]);
        if (!$bonus) {
            echo json_encode($res);
            die();
        }

        if (\R::exec("UPDATE main SET image = ? WHERE id = ?", [null, $id])) {
            @unlink(WWW . '/upload/main/' . $name);
            $res = true;
        }

        echo json_encode($res);
        die();
    }
}