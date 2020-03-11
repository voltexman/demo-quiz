<?php


namespace app\controllers\admin;

use site\App;
use app\models\admin\News;
use site\libs\Pagination;

class NewController extends AdminController
{
    public function indexAction()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $perpage = 25;
        $count = \R::count('news');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $news = \R::getAll("SELECT * FROM news ORDER BY id DESC LIMIT $start, $perpage");
        $this->setMeta('Статьи');
        $this->setData(compact('news', 'count', 'pagination'));
    }

    public function addAction()
    {
        if (!empty($_POST)){
            $news = new News();
            $data = $_POST;
//            $data['date_create'] = (new \DateTime())->format('Y-m-d H:i:s');
            $data['date_create'] = date('Y-m-d');
            $news->load($data);
            $news->getImg();
            if (!$news->validate($data)){
                $news->getErrors();
                redirect();
            }
            if ($news->save('news')){
                $_SESSION['success'] = 'Статья добавлена!';
            }
            redirect(ADMIN .'/new');
        }
        $categories = \R::getAll("SELECT * FROM category ORDER BY id DESC");
        $this->setMeta('Добавить статью');
        $this->setData(compact('categories'));
    }

    public function editAction()
    {
        if (!empty($_POST)){
            $id = $this->getRequestId(false);
            $news = new News();
            $data = $_POST;
            $news->load($data);
            $news->getImg();
            if (!$news->validate($data)){
                $news->getErrors();
                redirect();
            }
            if ($news->update('news', $id)){
                $_SESSION['success'] =  'Статья успешно изменена!';
            }
            redirect(ADMIN .'/new');
        }
        $id = (int)$this->getRequestId();
        $new = \R::findOne('news', 'id = ?', [$id]);
        $categories = \R::getAll("SELECT * FROM category ORDER BY id DESC");
        $this->setMeta('Изменить  ' . $new->title);
        $this->setData(compact('new', 'categories'));
    }

    public function deleteAction()
    {
        $id = $this->getRequestId();
        $new = \R::findOne('news', "id = ?", [$id]);
        if (!$new){
            redirect(ADMIN .'/new');
        }
        \R::exec("DELETE FROM news WHERE id = ?", [$new->id]);
        @unlink(WWW . '/upload/articles/' . $new->image);
        $_SESSION['success'] =  'Статья удалена!';
        redirect(ADMIN .'/new');
    }

    public function removeImageFileAction()
    {
        if (!empty($_POST)){
            $fileName = $_POST['name'] ? htmlspecialchars($_POST['name']) : null;
            @unlink(WWW . '/upload/articles/' . $fileName);
            echo json_encode(['result'=>'success']);
        }
        die();
    }

    public function addImageAction()
    {
        $wmax = App::$app->getProperty('article_img_width');
        $hmax = App::$app->getProperty('article_img_height');
        $name = 'file';
        $news = new News();
        $news->uploadImg($name, $wmax, $hmax);
        die();
    }

    public function deleteImageAction()
    {
        $res = false;
        $id = isset($_POST['id']) ? (int)$_POST['id'] : null;
        $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : null;

        if (!$id || !$name) {
            echo json_encode($res);
            die();
        }

        $news = \R::find('news', ' id = ? AND image = ?', [$id, $name]);
        if (!$news) {
            echo json_encode($res);
            die();
        }

        if (\R::exec("UPDATE news SET image = ? WHERE id = ?", [null, $id])) {
            @unlink(WWW . '/upload/articles/' . $name);
            $res = true;
        }

        echo json_encode($res);
        die();
    }

}