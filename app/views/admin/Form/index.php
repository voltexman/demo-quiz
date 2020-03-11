<?php

/**
 * @var $form Form
 */

use \app\models\admin\Form;

?>

<section class="content-header">
    <h1>Изменение формы опроса</h1>
    <ol class="breadcrumb">
        <li><a href="<?= ADMIN ?>"><i class="fa fa-dashboard"></i>Главная</a></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="register-main">
                        <div class="account-left doc-edit-form-wrap">
                            <form method="post" id="form" action="<?= ADMIN ?>/form"
                                  data-toggle="validator" role="form" autocomplete="off">

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="form-group has-feedback">
                                                <label for="text">Сообщение
                                                    <small class="text-muted">(на последнем шаге опроса)</small>
                                                </label>
                                                <textarea type="text" name="text" class="form-control"
                                                          style="resize: none" id="text" rows="3"
                                                          placeholder="Сообщение выводимое на последнем шаге заполнения"
                                                          data-error="Уажите сообщение"
                                                          required><?= $form->text ?></textarea>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="title">Заголовок
                                                    <small class="text-muted">(при выборе мессенджеров)</small>
                                                </label>
                                                <textarea type="text" name="title" class="form-control"
                                                          style="resize: none" id="title" rows="3"
                                                          placeholder="Текст над мессенджерами"
                                                          data-error="Укажите сообщение"
                                                          required><?= $form->title ?></textarea>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="last-comment">Комментарий
                                                    <small class="text-muted">(на последнем шаге)</small>
                                                </label>
                                                <textarea type="text" name="last_comment" class="form-control"
                                                          style="resize: none" id="last-comment" rows="3"
                                                          placeholder="Подсказка или краткое описание"
                                                          data-error="Укажите сообщение"><?= $form->last_comment ?></textarea>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="button">Название кнопки</label>
                                                <input type="text" name="button" class="form-control" id="button"
                                                       placeholder="Кнопка"
                                                       data-error="Укажите название кнопки"
                                                       value="<?= $form->button ?>"
                                                       required>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="politics">Политика конфиденциальности
                                                    <small class="text-muted">(ссылка)</small>
                                                </label>
                                                <input type="text" name="politics" class="form-control" id="politics"
                                                       placeholder="Ссылка"
                                                       data-error="Укажите ссылку"
                                                       value="<?= $form->politics ?>">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="form-group">
                                                        <label for="select_form_type">Тип формы</label>
                                                        <select id="select_form_type" class="form-control" name="form_type">
                                                            <option value="social" <?= $form->form_type == 'social' ? 'selected' : '' ?>>Социальные сети</option>
                                                            <option value="standard" <?= $form->form_type == 'standard' ? 'selected' : '' ?>>Обратная связь</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="social-block" style="display: none">
                                                <p class="label-soc"><b>Отображать соц. сети:</b></p>
                                                <label>
                                                    <input type="checkbox" class="flat"
                                                           name="viber" <?php if ($form->viber) echo "checked" ?>>
                                                    Viber
                                                </label>
                                                <label>
                                                    <input type="checkbox" class="flat"
                                                           name="telegram" <?php if ($form->telegram) echo "checked" ?>>
                                                    Telegram
                                                </label>
                                                <label>
                                                    <input type="checkbox" class="flat"
                                                           name="whatsapp" <?php if ($form->whatsapp) echo "checked" ?>>
                                                    WhatsApp
                                                </label>
                                                <label>
                                                    <input type="checkbox" class="flat"
                                                           name="by_phone" <?php if ($form->by_phone) echo "checked" ?>>
                                                    По телефону
                                                </label>
                                                <label>
                                                    <input type="checkbox" class="flat"
                                                           name="instagram" <?php if ($form->instagram) echo "checked" ?>>
                                                    Instagram
                                                </label>
                                                <label>
                                                    <input type="checkbox" class="flat"
                                                           name="facebook" <?php if ($form->facebook) echo "checked" ?>>
                                                    Facebook
                                                </label>
                                            </div>
                                            <div class="standard-block" style="display: none">
                                                <div class="col-xs-4">
                                                    <p>
                                                        <label>
                                                            <input type="checkbox" class="flat"
                                                                   name="standard_name" <?= $form->standard_name ? 'checked' : '' ?>>
                                                            Имя
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input type="checkbox" class="flat"
                                                                   name="standard_email" <?= $form->standard_email ? 'checked' : '' ?>>
                                                            Email
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input type="checkbox" class="flat"
                                                                   name="standard_phone" <?= $form->standard_phone ? 'checked' : '' ?>>
                                                            Телефон
                                                        </label>
                                                    </p>
                                                </div>
                                                <div class="col-xs-8">
                                                    <p>
                                                        <label class="standard_name_required">
                                                            <input type="checkbox" class="flat"
                                                                   name="standard_name_required" <?= $form->standard_name_required ? 'checked' : '' ?>>
                                                            Обязательное поле
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label class="standard_email_required">
                                                            <input type="checkbox" class="flat"
                                                                   name="standard_email_required" <?= $form->standard_email_required ? 'checked' : '' ?>>
                                                            Обязательное поле
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label class="standard_phone_required">
                                                            <input type="checkbox" class="flat"
                                                                   name="standard_phone_required" <?= $form->standard_phone_required ? 'checked' : '' ?>>
                                                            Обязательное поле
                                                        </label>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="form-group has-feedback">
                                                <label for="thanks-text">Текст благодарности
                                                    <!--                                                    <small class="text-muted">(на последнем шаге опроса)</small>-->
                                                </label>
                                                <textarea type="text" name="thanks_text" class="form-control"
                                                          style="resize: none" id="thanks-text" rows="3"
                                                          placeholder="Текст благодарности после ответов на вопросы"
                                                          data-error="Уажите текст"
                                                          required><?= $form->thanks_text ?></textarea>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="thanks-title">Текст под кнопкой</label>
                                                <textarea type="text" name="thanks_title" class="form-control"
                                                          style="resize: none" id="thanks-title" rows="3"
                                                          placeholder="Текст под кнопкой перехода"
                                                          data-error="Уажите текст"><?= $form->thanks_title ?></textarea>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="thanks-button">Название кнопки
                                                    <span class="text-muted">(кнопка перехода)</span>
                                                </label>
                                                <input type="text" name="thanks_button" class="form-control"
                                                       id="thanks-button"
                                                       placeholder="Кнопка"
                                                       value="<?= $form->thanks_button ?>">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="thanks-link">Ссылка кнопки
                                                    <span class="text-muted">(ссылка кнопки перехода)</span>
                                                </label>
                                                <input type="text" name="thanks_link" class="form-control"
                                                       id="thanks-link"
                                                       placeholder="Ссылка"
                                                       value="<?= $form->thanks_link ?>">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="thanks-video">Видео
                                                    <span class="text-muted">(код видео)</span>
                                                </label>
                                                <input type="text" name="thanks_video" class="form-control"
                                                       id="thanks-video"
                                                       placeholder="HA-C7do7jyg"
                                                       value="<?= $form->thanks_video ?>">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix"></div>
                                <div class="form-group input-group box-body">
                                    <button type="submit" class="btn btn-block btn-success">Сохранить</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>

<script>
    $(document).ready(function () {
        $('input[type="checkbox"].flat, input[type="radio"].flat').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });

        let form_type = $('#select_form_type');
        // let input_standard_name = $("input[name*='standard_name']");
        // let input_standard_email = $("input[name*='standard_email']");
        // let input_standard_phone = $("input[name*='standard_phone']");

        if (form_type.val() === 'standard') {
            $('.standard-block').show();
        }
        if (form_type.val() === 'social') {
            $('.social-block').show();
        }

        // if (input_standard_name.attr('checked') !== 'checked') {
        //     let standard_name_required = $('label.standard_name_required');
        //     standard_name_required.find('input.flat').attr('disabled', 'disabled');
        //     standard_name_required.addClass('text-muted');
        // }
        // if (input_standard_email.attr('checked') !== 'checked') {
        //     let standard_email_required = $('label.standard_email_required');
        //     standard_email_required.find('input.flat').attr('disabled', 'disabled');
        //     standard_email_required.addClass('text-muted');
        // }
        // if (input_standard_phone.attr('checked') !== 'checked') {
        //     let standard_phone_required = $('label.standard_phone_required');
        //     standard_phone_required.find('input.flat').attr('disabled', 'disabled');
        //     standard_phone_required.addClass('text-muted');
        // }

        $('.flat').change(function () {
            console.log($(this));
        });

        form_type.change(function() {
            if ($(this).val() === 'standard') {
                $('.standard-block').show(300);
                $('.social-block').hide(300);
            }
            if ($(this).val() === 'social') {
                $('.social-block').show(300);
                $('.standard-block').hide(300);
            }
        });
    })
</script>