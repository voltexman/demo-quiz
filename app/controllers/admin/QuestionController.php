<?php

namespace app\controllers\admin;

use app\models\admin\Answer;
use app\models\admin\Question;

class QuestionController extends AdminController
{
    public function indexAction()
    {
        $model = new Question();
        $questions = $model->getAllQuestions();

        $answers = [];
        foreach ($questions as $question) {
            $answers[$question['id']] = $model->getAnswersByQuestionId($question['id']);
        }

        $this->setMeta('Изменить вопросы');
        $this->setData(compact('questions', 'answers'));
    }

    public function addAction()
    {
        if (!empty($_POST)) {
            if (checkUser($_SESSION['user'])) {
                redirect();
            }

            $model = new Question();
            $form = $_POST;

            if (!isset($form['answer']) && !isset($form['image'])) {
                $_SESSION['errors'] = 'Добавление вопроса без ответов невозможно, создайте хотя бы один ответ';
                redirect();
            }

            isset($form['image']) ? $form['type'] = 'image' : $form['type'] = 'text';

            $model->load($form);

            if ($model->validate($form)) {
                $question_id = $model->save('questions');
                $model->addAnswers($question_id);
            } else {
                $model->getErrors();
            }

            redirect(ADMIN . '/question');
        }
    }

    public function editAction()
    {
        $id = (int)$this->getRequestId();
        $model = new Question();

        if (!empty($_POST)) {
            if (checkUser($_SESSION['user'])) {
                redirect();
            }

            if ($_POST['type'] == 'image') {
                $model->updateQuestion($id);
                $model->clearAnswersByQuestionId($id);
                $model->updateImagesAnswers($id);
                if (isset($_FILES['image'])) {
                    $model->addImg($id);
                }
            }

            if ($_POST['type'] == 'text') {
                $model->updateQuestion($id);
                $model->clearAnswersByQuestionId($id);
                $model->addAnswers($id);
            }

            redirect(ADMIN . '/question');
        }

        $question = $model->getQuestionById($id);
        $answers = $model->getAnswersByQuestionId($id);

        $this->setMeta('Изменить  ' . $question->text);
        $this->setData(compact('question', 'answers'));
    }

    public function deleteAction()
    {
        if (checkUser($_SESSION['user'])) {
            redirect();
        }

        $id = $this->getRequestId(true);
        $model = new Question();

        $model->deleteQuestionById($id);

        redirect(ADMIN . '/question');
    }

    public function sortableAction()
    {
        $i = 0;

        foreach ($_POST['item'] as $value) {
            \R::exec("UPDATE questions SET sort = ? WHERE id = ?", [$i, $value]);
            $i++;
        }
        die();
    }

    public function deleteImageAnswerAction()
    {
        $model = new Question();
        $model->deleteAnswerByAnswerId($_GET['answer_id']);

        redirect(ADMIN . '/question/edit?id=' . $_GET['question_id']);
    }

    public function deleteAllQuestionsAction()
    {
        $model = new Question();

        $model->deleteAllQuestions();

        redirect(ADMIN . '/question');
    }
}