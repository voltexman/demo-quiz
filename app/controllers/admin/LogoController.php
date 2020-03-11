<?php

namespace app\controllers\admin;

use app\models\admin\Logo;
use site\App;

class LogoController extends AdminController
{
    public function indexAction()
    {
        if (!empty($_POST)) {
            if (checkUser($_SESSION['user'])) {
                redirect();
            }
            $model = new Logo();
            $data = $_POST;
            $model->load($data);
            $model->getImg();
            if (!$model->validate($data)) {
                $model->getErrors();
                redirect();
            }
            if ($model->update('logo', 1)) {
                $_SESSION['success'] = 'Логотип успешно изменён!';
            }
            redirect(ADMIN . '/global');
        }
        $logo = \R::findOne('logo', 'id = ?', ['1']);

        $this->setMeta('Логотип');
        $this->setData(compact('logo'));
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
        $wmax = App::$app->getProperty('logo_img_width');
        $hmax = App::$app->getProperty('logo_img_height');
        $name = 'file';
        $model = new Logo();
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

        $bonus = \R::find('logo', ' id = ? AND image = ?', [$id, $name]);
        if (!$bonus) {
            echo json_encode($res);
            die();
        }

        if (\R::exec("UPDATE logo SET image = ? WHERE id = ?", [null, $id])) {
            @unlink(WWW . '/upload/main/' . $name);
            $res = true;
        }

        echo json_encode($res);
        die();
    }
}