<?php

namespace app\controllers\admin;

use app\models\AppModel;
use site\base\Controller;
use app\models\User;

class AdminController extends Controller
{

    public $layout = 'admin_layout';

    public function __construct($route)
    {
        parent::__construct($route);
        new AppModel();
        if ((!User::isAdmin()) && (!User::isAdmin() && !in_array($route['action'], ['login-admin', 'recovery']))) {
            redirect(ADMIN . '/user/login-admin');
        }
        $_SESSION['resultCount'] = self::getResultCount();
        $_SESSION['callBackCount'] = self::getCallBackCount();
    }

    private function getResultCount()
    {
        $results = \R::getAll("SELECT * FROM results WHERE status = 1 ORDER BY id DESC");
        return count($results);
    }

    private function getCallBackCount()
    {
        $calls = \R::getAll("SELECT * FROM calls WHERE status = 1 ORDER BY id DESC");
        return count($calls);
    }

    public function getRequestId($get = true, $id = 'id')
    {
        if ($get) {
            $data = $_GET;
        } else {
            $data = $_POST;
        }
        $id = !empty($data[$id]) ? (int)$data[$id] : null;
        if (!$id) {
            throw new \Exception('Page not found', 404);
        }
        return $id;
    }
}