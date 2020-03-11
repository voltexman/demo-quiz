<?php

namespace app\controllers\admin;


use app\models\admin\Contact;
use site\App;


class ContactController extends AdminController
{
    public function indexAction()
    {
        if (!empty($_POST)) {
            if (checkUser($_SESSION['user'])) {
                redirect();
            }
            $model = new Contact();
            $form = $_POST;
            $form['phones'] = json_encode($form['phones']);

            $model->load($form);
            $model->getImg();
            if (!$model->validate($form)) {
                $model->getErrors();
                redirect();
            }
            if ($model->update('contacts', '1')) {
                $_SESSION['success'] = 'Контакты успешно изменены!';
            }
            redirect(ADMIN . '/contact');
        }

        $contact = \R::findOne('contacts', 'id = ?', ['1']);
        $phones = json_decode($contact['phones']);

        $this->setMeta('Изменить контакты');
        $this->setData(compact('contact', 'phones'));
    }

    public function removeImageFileAction()
    {
        if (checkUser($_SESSION['user'])) {
            redirect();
        }
        if (!empty($_POST)) {
            $fileName = $_POST['name'] ? htmlspecialchars($_POST['name']) : null;
            @unlink(WWW . '/upload/manager/' . $fileName);
            echo json_encode(['result' => 'success']);
        }
        die();
    }

    public function addImageAction()
    {
        if (checkUser($_SESSION['user'])) {
            redirect();
        }
        $wmax = App::$app->getProperty('manager_img_width');
        $hmax = App::$app->getProperty('manager_img_height');
        $name = 'file';
        $model = new Contact();
        $model->uploadImg($name, $wmax, $hmax);
        die();
    }

    public function deleteImageAction()
    {
        if (checkUser($_SESSION['user'])) {
            redirect();
        }
        $res = false;;
        $id = isset($_POST['id']) ? (int)$_POST['id'] : null;
        $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : null;

        if (!$name) {
            echo json_encode($res);
            die();
        }

        $image = \R::find('contacts', ' id = ? AND image = ?', [$id, $name]);
        if (!$image) {
            echo json_encode($res);
            die();
        }

        if (\R::exec("UPDATE contacts SET image = ? WHERE id = ?", [null, 1])) {
            @unlink(WWW . '/upload/manager/' . $name);
            $res = true;
        }

        echo json_encode($res);
        die();
    }
}