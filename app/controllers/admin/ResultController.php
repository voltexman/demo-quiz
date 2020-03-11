<?php

namespace app\controllers\admin;

use app\models\admin\Result;

class ResultController extends AdminController
{
    public function indexAction()
    {
        $results = \R::getAll("SELECT * FROM results ORDER BY status DESC");
        $this->setMeta('Ответы');
        $this->setData(compact('results'));
    }

    public function resultDetailsAction()
    {
        $result = \R::findOne('results', 'id = ?', [$_POST['id']]);
        \R::exec("UPDATE results SET status = ? WHERE id = ?", [(new Result)::STATUS_SEEN, $_POST['id']]);

        $symbol = mb_substr($result['phone'], 0, 1);

        if ($symbol == '+') {
            $whatContact = 'Телефон';
        } else {
            $whatContact = 'Контакт';
        }



        echo "
        <div class=\"modal-content\">            
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">&times;</span></button>
                <h4 class=\"modal-title\">Детальный просмотр</h4>
            </div>
            <div class=\"modal-body\">
                <p></p>" . $result['questions'] . "
                <hr>
                <p><b>Прислать ответы на: </b>" . $result['social'] . "</p>
                <p><b>" . $whatContact . ": </b>" . $result['phone'] . "</p>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-default pull-right\" data-dismiss=\"modal\">Закрыть</button>
            </div>
        </div>";
        die();
    }

    public function deleteAllResultsAction()
    {
        if (checkUser($_SESSION['user'])) {
            redirect();
        }

        \R::exec("DELETE FROM results");
        redirect();
    }
}