<?php

/**
 * @var $questions Question
 * @var $answers Answer
 */

use app\models\admin\Question;
use app\models\admin\Answer;

?>

<section class="content-header">
    <h1>Вопросы на сайте</h1>
    <ol class="breadcrumb">
        <li><a href="<?= ADMIN ?>"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li><a href="<?= ADMIN ?>/question"><i class="fa fa-folder"></i>Вопросы & ответы</a></li>
    </ol>
</section>

<section class="content-header">
    <div class="row">
        <div class="col-sm-12">
            <div class="pull-left">
                <a style="" class="btn btn-primary add-question" href="<?= ADMIN ?>/question/add">
                    <span class="fa fa-plus"></span> Добавить вопрос</a>
            </div>

            <?php if ($questions) : ?>
                <div class="pull-right">
                    <a href="javascript:void(0)" class="btn btn-xs btn-primary up-all">Свернуть/развернуть все</a>
                    <a href="<?= ADMIN ?>/question/delete-all-questions" class="btn btn-xs btn-danger delete">Удалить все</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="new-question"></div>
            <?php if ($questions) : ?>
                <div class="sortable">
                    <?php foreach ($questions as $question) : ?>
                        <div class="question" id="item-<?= $question['id'] ?>">
                            <div class="box box-solid">
                                <div class="box-header with-border">
                                    <i class="fa fa-arrow-circle-right"></i>
                                    <h3 class="box-title">Вопрос: <span
                                                class="text-muted"><?= $question['question'] ?></span></h3>
                                    <div class="box-tools pull-right">
                                        <h3 class="box-title">Тип: <span
                                                    class="text-muted"><?= !empty($answers[$question['id']][0]['file']) ? 'изображения' : 'текст' ?> | </span></h3>
                                        <h3 class="box-title">Ответов: <span
                                                    class="text-muted"><?= count($answers[$question['id']]) ?></span></h3>
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                            <i class="fa fa-minus"></i></button>
                                        <i class="fa fa-arrows question-handle" style="cursor: pointer"></i>
                                    </div>
                                </div>
                                <div class="box-body toggle-question">

                                    <div class="col-xs-6">
                                        <b>Вопрос</b>
                                        <p><?= $question['question'] ?></p>

                                        <b>Комментарий</b>
                                        <p><?= $question['comment'] ? $question['comment'] : '<i class="text-muted">Комментария нет</i>' ?></p>

                                        <hr>

                                        <p><b>Активный вопрос: </b><?= $question['active'] ? 'Да' : 'Нет' ?></p>

                                        <p><b>Обязательный ответ: </b><?= $question['required'] ? 'Да' : 'Нет' ?></p>

                                        <p><b>Собственный ответ: </b><?= $question['other'] ? 'Да' : 'Нет' ?></p>

                                        <p><b>Несколько ответов: </b><?= $question['multi'] ? 'Да' : 'Нет' ?></p>

                                        <a class="btn btn-danger delete" href="<?= ADMIN ?>/question/delete?id=<?= $question['id'] ?>">
                                            <span class="fa fa-trash"></span> Удалить</a>
                                        <a class="btn btn-warning" href="<?= ADMIN ?>/question/edit?id=<?= $question['id'] ?>">
                                            <span class="fa fa-edit"></span> Изменить</a>
                                    </div>

                                    <div class="col-xs-6">
                                        <ul class="mailbox-attachments clearfix">
                                            <?php $answerNum = 1; ?>
                                            <?php foreach ($answers[$question['id']] as $answer) : ?>
                                                <?php if (!empty($answer['file'])) : ?>
                                                    <li>
                                                        <span class="mailbox-attachment-icon has-img">
                                                            <img src="/public/upload/answers/images/<?= $answer['file'] ?>" alt="">
                                                        </span>
                                                        <div class="mailbox-attachment-info">
                                                            <span class="mailbox-attachment-name"><?= $answer['text'] ?></span>
                                                        </div>
                                                    </li>
                                                <?php else : ?>
                                                    <b>Ответ <?= $answerNum ?></b>
                                                    <p><?= $answer['text'] ?></p>
                                                <?php endif; ?>
                                            <?php $answerNum++; ?>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <strong class="text-muted">Вопросов нет</strong>
            <?php endif; ?>
        </div>
    </div>

    <?php if ($questions) : ?>
        <div class="row">
            <div class="col-sm-12">
                <a class="btn btn-primary add-question" href="<?= ADMIN ?>/question/add">
                    <span class="fa fa-plus"></span> Добавить вопрос</a>
            </div>
        </div>
    <?php endif; ?>
</section>


<script>
    $(document).ready(function () {
        $('.sortable').sortable({
            handle: '.question-handle',
            // axis: 'y',
            update: function (event, ui) {
                let data = $(this).sortable('serialize');

                // POST to server using $.post or $.ajax
                $.ajax({
                    data: data,
                    type: 'POST',
                    url: '/admin/question/sortable',
                    success: function () {
                        toastr.success('Позиция вопроса изменена')
                    }
                });
            }
        });

        $('.up-all').on('click', function () {
            $('.toggle-question').slideToggle('slow');
        });
    });
</script>
