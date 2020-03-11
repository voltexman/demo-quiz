<?php

namespace app\controllers\admin;

use site\App;
use app\models\admin\Bonus;
use site\libs\Pagination;

class BonusController extends AdminController
{
    public function indexAction()
    {
//        debug($_SESSION, true);
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $perpage = 25;
        $count = \R::count('bonus');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();

        $bonuses = \R::getAll("SELECT * FROM bonus ORDER BY id DESC LIMIT $start, $perpage");

        $this->setMeta('Все сотрудники');
        $this->setData(compact('bonuses', 'count', 'pagination'));
    }


    public function addAction()
    {
        if (!empty($_POST)) {
            if (checkUser($_SESSION['user'])) {
                redirect();
            }

            $model = new Bonus();
            $form = $_POST;
            $model->load($form);
            $model->getImg();
            if (!$model->validate($form)) {
                $model->getErrors();
                redirect();
            }
            if ($model->save('bonus')) {
                $_SESSION['success'] = 'Данние добавлены!';
            }
            redirect(ADMIN . '/bonus');
        }
        $this->setMeta('Добавить бонус');
    }


    public function editAction()
    {
        if (!empty($_POST)) {
            if (checkUser($_SESSION['user'])) {
                redirect();
            }

            $id = $this->getRequestId(true);
            $model = new Bonus();
            $form = $_POST;

            $model->load($form);
            $model->getImg();
            if (!$model->validate($form)) {
                $model->getErrors();
                redirect();
            }
            if ($model->update('bonus', $id)) {
                $_SESSION['success'] = 'Данные успешно изменены!';
            }
//            redirect(ADMIN . '/bonus/edit?id=' . $id);
            redirect(ADMIN . '/bonus');
        }
        $id = (int)$this->getRequestId();
        $bonus = \R::findOne('bonus', 'id = ?', [$id]);

        $this->setMeta('Изменить  ' . $bonus->name);
        $this->setData(compact('bonus'));
    }


    public function deleteAction()
    {
        if (checkUser($_SESSION['user'])) {
            redirect();
        } else {
            $id = $this->getRequestId();
            $model = \R::findOne('bonus', "id = ?", [$id]);
            if (!$model) {
                redirect(ADMIN . '/bonus');
            }
            \R::exec("DELETE FROM bonus WHERE id = ?", [$model->id]);
            @unlink(WWW . '/upload/bonus/' . $model->image);
            $_SESSION['success'] = 'Данные успешно удалены!';
            redirect(ADMIN . '/bonus');
        }
    }

    public function statusChangeAction()
    {
        if (checkUser($_SESSION['user'])) {
            redirect();
        }
        $model = new Bonus();

        $bonus = \R::findOne('bonus', 'id = ?', [$_POST['id']]);
        $status = $bonus['status'];
        if ($status == 'on') {
            $form['name'] = $bonus['name'];
            $form['text'] = $bonus['text'];
            $form['image'] = $bonus['image'];
            $form['status'] = false;
            $model->load($form);
            $model->update('bonus', $_POST['id']);
            echo false;
        } else {
            $form['name'] = $bonus['name'];
            $form['text'] = $bonus['text'];
            $form['image'] = $bonus['image'];
            $form['status'] = 'on';
            $model->load($form);
            $model->update('bonus', $_POST['id']);
            echo true;
        }
        die();
    }


    public function removeImageFileAction()
    {
        if (checkUser($_SESSION['user'])) {
            redirect();
        }
        if (!empty($_POST)) {
            $fileName = $_POST['name'] ? htmlspecialchars($_POST['name']) : null;
            @unlink(WWW . '/upload/bonus/' . $fileName);
            echo json_encode(['result' => 'success']);
        }
        die();
    }


    public function addImageAction()
    {
        if (checkUser($_SESSION['user'])) {
            redirect();
        }
        $wmax = App::$app->getProperty('bonus_img_width');
        $hmax = App::$app->getProperty('bonus_img_height');
        $name = 'file';
        $model = new Bonus();
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

        $bonus = \R::find('bonus', ' id = ? AND image = ?', [$id, $name]);
        if (!$bonus) {
            echo json_encode($res);
            die();
        }

        if (\R::exec("UPDATE bonus SET image = ? WHERE id = ?", [null, $id])) {
            @unlink(WWW . '/upload/bonus/' . $name);
            $res = true;
        }

        echo json_encode($res);
        die();
    }
}