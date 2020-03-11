<?php

use app\models\admin\Contact;
use site\App;

?>

<section class="content-header">
    <h1>Изменить контакты</h1>
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
                        <div class="account-left edit-form-wrap">
                            <form method="post" id="form" action="<?= ADMIN ?>/contact"
                                  data-toggle="validator" role="form" autocomplete="off"
                                  data-add_url="<?= ADMIN ?>/contact/add-image"
                                  data-remove_url="<?= ADMIN ?>/contact/remove-image-file"
                                  data-remove_photo_db_url="<?= ADMIN ?>/contact/delete-image">

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="form-group has-feedback">
                                                <label for="company-name">Название компании</label>
                                                <input type="text" name="company_name" class="form-control"
                                                       id="manager-name"
                                                       placeholder="Компания"
                                                       data-error="Укажите название компании" data-minlength="1"
                                                       value="<?= $contact->company_name ?>"
                                                       required>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="manager-name">Ваше имя</label>
                                                <input type="text" name="manager_name" class="form-control"
                                                       id="manager-name"
                                                       placeholder="Имя"
                                                       data-error="Укажите как Вас зовут" data-minlength="1"
                                                       value="<?= $contact->manager_name ?>">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="manager-position">Ваша должность</label>
                                                <input type="text" name="manager_position" class="form-control"
                                                       id="manager-position"
                                                       placeholder="Должность"
                                                       data-error="Укажите Вашу должность" data-minlength="2"
                                                       value="<?= $contact->manager_position ?>">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <?php if (!$contact->image) : ?>

                                                <div class="form-group has-feedback file-upload-wrap">
                                                    <label>Фото пользователя
                                                        <small> рекомендованные размеры: (ширина
                                                            - <?= App::$app->getProperty('manager_img_width') ?>px;
                                                            высота
                                                            - <?= App::$app->getProperty('manager_img_height') ?>px; )
                                                        </small>
                                                    </label>
                                                    <div class="upload" id="upload"></div>
                                                </div>

                                            <?php else : ?>

                                                <div class="form-group">
                                                    <div class="col-md-4 gallery-item">
                                                        <a href="<?= PATH ?>/upload/manager/<?= $contact->image ?>"
                                                           target="_blank">
                                                            <img src="<?= PATH ?>/upload/manager/<?= $contact->image ?>"
                                                                 class="img-responsive"
                                                                 alt="image"/>
                                                        </a>
                                                        <button type="button" class="btn btn-link remove_image"
                                                                data-name="<?= $contact->image ?>"
                                                                data-id="<?= $contact->id ?>">
                                                            Удалить
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>

                                            <?php endif; ?>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="form-group has-feedback">
                                                <label for="telegram">Telegram</label>
                                                <input type="text" name="telegram" class="form-control" id="telegram"
                                                       placeholder="Telegram"
                                                       data-error="Нужно заполнить" data-minlength="1"
                                                       value="<?= $contact->telegram ?>">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="viber">Viber</label>
                                                <input type="text" name="viber" class="form-control" id="viber"
                                                       placeholder="Viber"
                                                       value="<?= $contact->viber ?>">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="whatsapp">WhatsApp</label>
                                                <input type="text" name="whatsapp" class="form-control" id="whatsapp"
                                                       placeholder="WhatsApp"
                                                       value="<?= $contact->whatsapp ?>">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <fieldset>
                                                <ul id="phones" style="list-style: none;padding: 0">
                                                    <li>
                                                        <label for="phone">Телефон</label>
                                                        <input type="text" name="phone" class="form-control"
                                                               id="phone" value="<?= $contact->phone ?>"
                                                               data-inputmask="'mask': ['+99 (999) 999-99-99', '+99 (999) 999-99-99']"
                                                               data-mask
                                                        >
                                                    </li>
                                                    <?php if (!empty($phones)) : ?>
                                                        <?php foreach ($phones as $phone) : ?>
                                                            <li>
                                                                <div class="row">
                                                                    <div class="col-xs-10">
                                                                        <label for="numbers"
                                                                               style="width: 100%;">Телефон</label>
                                                                        <input type="text" name="phones[]"
                                                                               class="form-control pull-left"
                                                                               id="numbers" value="<?= $phone ?>"
                                                                               data-inputmask="'mask': ['+99 (999) 999-99-99', '+99 (999) 999-99-99']"
                                                                               data-mask>
                                                                    </div>
                                                                    <div class="col-xs-2">
                                                                        <a class="remove btn btn-danger pull-right"
                                                                           style="margin-top: 24px">
                                                                            <span class="fa fa-trash"></span>
                                                                            Удалить</a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </ul>
                                                <a id="add" style="margin-top: 20px" class="btn btn-primary"
                                                   value="Добавить телефон"><span class="fa fa-plus"></span> Добавить
                                                    телефон</a>
                                            </fieldset>
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
        $('[data-mask]').inputmask()
    });
    $(document).ready(function () {
        $('#add').on('click', function () {
            var str = '<li>';
            str += '<label style="width: 100%" for="phones">Телефон</label>';
            str += '<input type="text" id="phones" class="form-control pull-left" style="width: 85%" name="phones[]" data-inputmask="\'mask\': [\'+99 (999) 999-99-99\', \'+99 (999) 999-99-99\']" data-mask>';
            str += '<a class="remove btn btn-danger pull-right"><span class="fa fa-trash"></span> Удалить</a>';
            str += '</li>';
            $('#phones').append(str);
            $('.remove').click(function () {
                $(this).parent('li').remove();
            });
        }).on('click', function () {
            $('[data-mask]').inputmask()
        });
        $('.remove').click(function () {
            $(this).parents('li').remove();
        });
    });
</script>
