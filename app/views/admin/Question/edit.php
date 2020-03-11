<?php

!empty($answers[0]['file']) ? $type = 'image' : $type = 'text';
?>

<section class="content-header">
    <h1>Редактирование вопроса</h1>
    <ol class="breadcrumb">
        <li><a href="<?= ADMIN ?>"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li><a href="<?= ADMIN ?>/question"><i class="fa fa-folder"></i>Вопросы & ответы</a></li>
    </ol>
</section>

<form action="<?= ADMIN ?>/question/edit?id=<?= $question->id ?>" method="post" enctype="multipart/form-data">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <section class="question" data-i="1">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <i class="fa fa-question"></i>
                            <h3 class="box-title">Вопрос: <?= $question['question'] ?></h3>
                        </div>
                        <div class="box-body">
                            <div class="col-xs-6">
                                <label for="question-name">Вопрос</label>
                                <input type="text" name="question" class="form-control" id="question-name" title="asf" value="<?= $question['question'] ?>">
                                <label for="comment">Комментарий</label>
                                <textarea name="comment" id="comment" style="width: 100%;resize: none"
                                          class="form-control" rows="5"
                                          placeholder="Комментарий, подсказка или краткое описание вопроса"><?= $question['comment'] ?></textarea>
                                <label style="width: 100%;margin-top: 15px">
                                    <input type="checkbox" class="flat" name="active" value="1" <?= $question['active'] ? 'checked' : '' ?>>
                                    Активный вопрос
                                </label>
                                <label style="width: 100%;margin-top: 15px">
                                    <input type="checkbox" class="flat" name="required" value="1" <?= $question['required'] ? 'checked' : '' ?>>
                                    Обязательный вопрос
                                </label>
                                <label style="width: 100%;margin-top: 15px">
                                    <input type="checkbox" class="flat" name="other" value="1" <?= $question['other'] ? 'checked' : '' ?>>
                                    Собственный ответ
                                </label>
                                <label style="width: 100%;margin-top: 15px">
                                    <input type="checkbox" class="flat" name="multi" value="1" <?= $question['multi'] ? 'checked' : '' ?>>
                                    Множественный выбор ответов
                                </label>
                            </div>
                            <div class="col-xs-6">
                                <div class="row">
                                    <table class="polls">
                                        <tbody class="answers">
                                        <?php if ($type == 'text') : ?>
                                            <input type="hidden" name="type" value="text">
                                            <?php foreach ($answers as $answer) : ?>
                                                <tr>
                                                    <td>
                                                        <label for="<?= $answer['id'] ?>">Ответ</label>
                                                        <input type="text" class="form-control" name="answer[]" value="<?= $answer['text'] ?>" id="<?= $answer['id'] ?>">
                                                    </td>
                                                    <td style="margin-right: 10px">
                                                        <a class="remove-field btn btn-danger pull-right" style="width: 100%;margin-top: 24px">
                                                            <span class="fa fa-trash"></span></a>
                                                    </td>
                                                    <td>
                                                        <i class="fa fa-arrows answer-handle" style="margin-top: 34px;cursor: pointer"></i>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>

                                        <?php if ($type == 'image') : ?>
                                            <ul class="mailbox-attachments clearfix">
                                                <input type="hidden" name="type" value="image">
                                                <?php foreach ($answers as $answer) : ?>
                                                    <li>
                                                        <input type="hidden" name="file[]" value="<?= $answer['file'] ?>">
                                                        <a href="<?= ADMIN . '/question/delete-image-answer?question_id=' . $question['id'] . '&answer_id=' . $answer['id'] ?>" class="btn btn-danger btn-flat delete" style="width: 100%">
                                                            <i class="fa fa-trash"></i> Удалить</a>
                                                        <span class="mailbox-attachment-icon has-img">
                                                            <img src="/public/upload/answers/images/<?= $answer['file'] ?>" alt="">
                                                        </span>
                                                        <div class="mailbox-attachment-info">
                                                            <label for="<?= $answer['id'] ?>">Текст изображения</label>
                                                            <input type="text" class="form-control" id="<?= $answer['id'] ?>" name="answer[]" value="<?= $answer['text'] ?>">
                                                        </div>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                    <?php if ($type == 'text') : ?>
                                        <a href="javascript:void(0)" class="btn btn-warning add-text-field">Добавить ответ</a>
                                    <?php endif; ?>
                                    <?php if ($type == 'image') : ?>
                                        <a href="javascript:void(0)" class="btn btn-warning add-image-field">Добавить изображение</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success" style="margin-bottom: 20px">
                        <span class="fa fa-check"></span> Сохранить вопрос
                    </button>
                </section>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function () {

        $('input[type="checkbox"].flat, input[type="radio"].flat').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });

        $('.answer').sortable({
            handle: '.answer-handle'
        });

    });

    $(document).on('click', '.add-text-field', function () {
            let text_field = $('.answers');
            text_field.append($("#text-field-template").html().replace(/\{\{g\}\}/g, text_field.data("i") + 1 || 1));
        }).on('click', '.add-image-field', function () {
            let image_field = $('.answers');
            image_field.append($("#image-field-template").html().replace(/\{\{g\}\}/g, image_field.data("i") + 1 || 1));
        }).on('click', '.remove-field', function () {
            $(this).closest('tr').remove();
        })

</script>

<script id=answer-text-template type=text/html>
    <div class="row">
        <table class="polls">
            <tbody class="text-field">
            <tr class="answer">
                <td>
                    <label style="width: 100%" for="answer">Ответ</label>
                    <input type="text" id="answer" class="form-control pull-left" name="answer[]">
                </td>
                <td style="margin-right: 10px">
                    <a class="remove-field btn btn-danger pull-right" style="width: 100%;margin-top: 24px">
                        <span class="fa fa-trash"></span></a>
                </td>
            </tr>
            </tbody>
        </table>
        <a href="javascript:void(0)" class="btn btn-warning add-text-field">Добавить ответ</a>
        <a href="javascript:void(0)" class="btn btn-success change-answer-type"><i class="fa fa-arrow-left"></i></a>
    </div>
</script>

<script id=text-field-template type=text/html>
    <tr>
        <td>
            <label for="answer">Ответ</label>
            <input type="text" id="answer" class="form-control pull-left" name="answer[]" required>
        </td>
        <td style="margin-right: 10px">
            <a class="remove-field btn btn-danger pull-right" style="width: 100%;margin-top: 24px">
                <span class="fa fa-trash"></span></a>
        </td>
        <td>
            <i class="fa fa-arrows answer-handle" style="margin-top: 34px;cursor: pointer"></i>
        </td>
    </tr>
</script>

<script id=answer-image-template type=text/html>
    <div class="row">
        <table class="polls">
            <tbody class="images-field">
            <tr class="answer">
                <td class="image-image-field">
                    <label style="width: 100%" for="answer">Изображение</label>
                    <input type="file" id="answer" class="form-control pull-left" name="image[]">
                </td>
                <td class="image-text-field">
                    <label style="width: 100%" for="answer">Текст</label>
                    <input type="text" id="answer" class="form-control pull-left" name="text[]" required>
                </td>
                <td style="margin-right: 10px">
                    <a class="remove-field btn btn-danger pull-right" style="width: 100%;margin-top: 24px">
                        <span class="fa fa-trash"></span></a>
                </td>
            </tr>
            </tbody>
        </table>
        <a href="javascript:void(0)" class="btn btn-warning add-image-field">Добавить изображение</a>
        <a href="javascript:void(0)" class="btn btn-success change-answer-type"><i class="fa fa-arrow-left"></i></a>
    </div>
</script>

<script id=image-field-template type=text/html>
    <tr class="answer">
        <td class="image-image-field">
            <label style="width: 100%" for="answer">Изображение</label>
            <input type="file" id="answer" class="form-control pull-left" name="image[]">
        </td>
        <td class="image-text-field">
            <label style="width: 100%" for="answer">Текст</label>
            <input type="text" id="answer" class="form-control pull-left" name="text[]">
        </td>
        <td style="margin-right: 10px">
            <a class="remove-field btn btn-danger pull-right" style="width: 100%;margin-top: 24px">
                <span class="fa fa-trash"></span></a>
        </td>
    </tr>
</script>
