<?php
?>

<section class="content-header">
    <h1>Новый вопрос</h1>
    <ol class="breadcrumb">
        <li><a href="<?= ADMIN ?>"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li><a href="<?= ADMIN ?>/question"><i class="fa fa-folder"></i>Вопросы & ответы</a></li>
    </ol>
</section>

<form action="<?= ADMIN ?>/question/add" method="post" enctype="multipart/form-data">
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <section class="question" data-i="1">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <i class="fa fa-question"></i>
                        <h3 class="box-title">Вопрос</h3>
                    </div>
                    <div class="box-body">
                        <div class="col-xs-6">
                            <label for="question-name">Вопрос</label>
                            <input type="text" name="question" class="form-control" id="question-name" required>
                            <label for="comment">Комментарий</label>
                            <textarea name="comment" id="comment" style="width: 100%;resize: none"
                                      class="form-control" rows="5"
                                      placeholder="Комментарий, подсказка или краткое описание вопроса"></textarea>
                            <label style="width: 100%;margin-top: 15px">
                                <input type="checkbox" class="flat" name="active" value="1" checked>
                                Активный вопрос
                            </label>
                            <label style="width: 100%;margin-top: 15px">
                                <input type="checkbox" class="flat" name="required" value="1" checked>
                                Обязательный вопрос
                            </label>
                            <label style="width: 100%;margin-top: 15px">
                                <input type="checkbox" class="flat" name="other" value="1">
                                Собственный ответ
                            </label>
                            <label style="width: 100%;margin-top: 15px">
                                <input type="checkbox" class="flat" name="multi" value="1">
                                Множественный выбор ответов
                            </label>
                        </div>
                        <div class="col-xs-6">
                            <div class="answers"></div>
                            <div class="row select-answer-type">
                                <b>Выберите тип ответа</b>
                                <div class="row">
                                    <a class="btn btn-app add-answer-text">
                                        <i class="fa fa-edit"></i> Текст
                                    </a>
                                    <a class="btn btn-app add-answer-image">
                                        <i class="fa fa-photo"></i> Изображения
                                    </a>
                                </div>
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

        $('.add-answer-text').on('click', function () {
            let answer_text = $('.answers');
            answer_text.append($("#answer-text-template").html().replace(/\{\{g\}\}/g, answer_text.data("i") + 1 || 1));

            $('.select-answer-type').remove();

            $('.add-text-field').on('click', function () {
                let text_field = $('.text-field');
                text_field.append($("#text-field-template").html().replace(/\{\{g\}\}/g, text_field.data("i") + 1 || 1));

                $('.remove-field').on('click', function () {
                    $(this).closest('tr').remove();
                })
            });

            $('.remove-field').on('click', function () {
                $(this).closest('tr').remove();
            });

        });

        $('.add-answer-image').on('click', function () {
            let answer_text = $('.answers');
            answer_text.append($("#answer-image-template").html().replace(/\{\{g\}\}/g, answer_text.data("i") + 1 || 1));

            $('.select-answer-type').remove();

            $('.add-image-field').on('click', function () {
                let image_field = $('.images-field');
                image_field.append($("#image-field-template").html().replace(/\{\{g\}\}/g, image_field.data("i") + 1 || 1));

                $('.remove-field').on('click', function () {
                    $(this).closest('tr').remove();
                })
            });

            $('.remove-field').on('click', function () {
                $(this).closest('tr').remove();
            })

        });

    });
</script>

<script id=answer-text-template type=text/html>
    <div class="text-template">
        <div class="row">
            <table class="polls">
                <tbody class="text-field">
                <tr class="answer">
                    <td>
                        <label style="width: 100%" for="answer">Ответ</label>
                        <input type="text" id="answer" class="form-control pull-left" name="answer[]" required>
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
    </div>
</script>

<script id=text-field-template type=text/html>
    <tr class="answer">
        <td>
            <label style="width: 100%" for="answer">Ответ</label>
            <input type="text" id="answer" class="form-control pull-left" name="answer[]" required>
        </td>
        <td style="margin-right: 10px">
            <a class="remove-field btn btn-danger pull-right" style="width: 100%;margin-top: 24px">
                <span class="fa fa-trash"></span></a>
        </td>
    </tr>
</script>

<script id=answer-image-template type=text/html>
    <div class="row">
        <table class="polls">
            <tbody class="images-field">
            <tr class="answer">
                <td class="image-image-field">
                    <input type="hidden" name="image">
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
            <input type="text" id="answer" class="form-control pull-left" name="text[]" required>
        </td>
        <td style="margin-right: 10px">
            <a class="remove-field btn btn-danger pull-right" style="width: 100%;margin-top: 24px">
                <span class="fa fa-trash"></span></a>
        </td>
    </tr>
</script>
