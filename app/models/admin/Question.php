<?php

namespace app\models\admin;

use app\models\AppModel;

class Question extends AppModel
{
    public $attributes = [
        'question' => '',
        'type' => '',
        'multi' => '',
        'other' => '',
        'active' => '',
        'required' => '',
        'comment' => ''
    ];

    public function updateQuestion($id)
    {
        $model = new Question();
        $form = $_POST;
        $model->load($form);

        if ($model->validate($form)) {
            $model->update('questions', $id);
        } else {
            $model->getErrors();
        }
    }

    public function addAnswers($id)
    {
        $form = $_POST;
        $model = new Question();

        if (isset($form['answer'])) {
            $answer = new Answer();
            foreach ($form['answer'] as $field) {
                $answerForm['question_id'] = $id;
                $answerForm['text'] = $field;
                $answer->load($answerForm);
                $answer->save('answers');
            }
        } elseif (isset($form['image'])) {
            $answer = new Answer();
            $total = 0;
            foreach ($form['text'] as $field) {
                $answerForm['file'] = $model->uploadImg($total);
                $answerForm['question_id'] = $id;
                $answerForm['text'] = $field;
                $answer->load($answerForm);
                $answer->save('answers');
                $total++;
            }
        }
    }

    public function addImg($id)
    {
        $model = new Question();
        $form = $_POST;

        $answer = new Answer();
        $total = 0;
        foreach ($form['text'] as $field) {
            $answerForm['file'] = $model->uploadImg($total);
            $answerForm['question_id'] = $id;
            $answerForm['text'] = $field;
            $answer->load($answerForm);
            $answer->save('answers');
            $total++;
        }
    }

    public function updateImagesAnswers($id)
    {
        $form = $_POST;
        $answer = new Answer();
        $i = 0;

        foreach ($form['answer'] as $field) {
            $answerForm['file'] = $form['file'][$i];
            $answerForm['question_id'] = $id;
            $answerForm['text'] = $field;
            $answer->load($answerForm);
            $answer->save('answers');
            $i++;
        }
    }

    public function uploadImg($total): string
    {
        $uploadDir = WWW . '/upload/answers/images/';
        $uploadFile = $uploadDir . basename($_FILES['image']['name'][$total]);

        move_uploaded_file($_FILES['image']['tmp_name'][$total], $uploadFile);

        return $_FILES['image']['name'][$total];
    }

    public function getAllActiveQuestions(): array
    {
        return \R::getAll("SELECT * FROM questions WHERE active = ? ORDER BY sort ASC", [1]);
    }

    public function getAllQuestions(): array
    {
        return \R::getAll("SELECT * FROM questions ORDER BY sort ASC");
    }

    public function getQuestionById($id)
    {
        return \R::findOne('questions', 'id = ?', [$id]);
    }

    public function getAnswersByQuestionId($id)
    {
        return \R::getAll("SELECT * FROM answers WHERE question_id = ?", [$id]);
    }

    public function deleteAnswerByAnswerId($id)
    {
        \R::exec("DELETE FROM answers WHERE id = ?", [$id]);
    }

    public function clearAnswersByQuestionId($id): void
    {
        \R::exec("DELETE FROM answers WHERE question_id = ?", [$id]);
    }

    public function deleteQuestionById($id): void
    {
        \R::exec("DELETE FROM questions WHERE id = ?", [$id]);
        self::clearAnswersByQuestionId($id);
    }

    public function deleteAllQuestions(): void
    {
        \R::exec("DELETE FROM questions");
        \R::exec("DELETE FROM answers");

        self::clearImageDir(WWW . '/upload/answers/images');
    }

    public function clearImageDir($dir): void
    {
        $files = glob($dir."/*");
        $c = count($files);
        if (count($files) > 0) {
            foreach ($files as $file) {
                if (file_exists($file)) {
                    unlink($file);
                }
            }
        }
    }
}