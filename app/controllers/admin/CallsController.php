<?php

namespace app\controllers\admin;

use app\models\admin\Calls;

class CallsController extends AdminController
{
    public function indexAction()
    {
        $calls = \R::getAll("SELECT * FROM calls");
        $this->setMeta('Заказы обратных звонков');
        $this->setData(compact('calls'));
    }

    public function statusChangeAction()
    {
        if (checkUser($_SESSION['user'])) {
            redirect();
        }
//        $calls = \R::findOne('calls', 'id = ?', [$_POST['id']]);
//        $status = $calls['status'];
        \R::exec("UPDATE calls SET status = ? WHERE id = ?", [(new Calls())::STATUS_SEEN, $_POST['id']]);
        die();
    }

    public function deleteAllCallsAction()
    {
        if (checkUser($_SESSION['user'])) {
            redirect();
        }

        \R::exec("DELETE FROM calls");
        redirect();
    }

}