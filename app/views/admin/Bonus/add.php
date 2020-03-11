<?php

use site\App;

?>

<section class="content-header">
    <h1>Новый бонус</h1>
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
                        <div class="col-md-12 account-left doc-edit-form-wrap">
                            <form method="post" id="form" action="<?= ADMIN ?>/bonus/add"
                                  data-toggle="validator" role="form" autocomplete="off"
                                  data-add_url="<?= ADMIN ?>/bonus/add-image"
                                  data-remove_photo_db_url="<?= ADMIN ?>/bonus/delete-image">

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="form-group has-feedback">
                                                <label for="name">Название</label>
                                                <input type="text" name="name" class="form-control" id="name"
                                                       placeholder="Название бонуса"
                                                       data-error="Укажите название бонуса"
                                                       required>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <label for="text">Описание
                                            <small class="text-muted">до 30 символов</small></label>
                                            <textarea name="text" id="text" class="form-control" style="resize: none"
                                                      rows="3" placeholder="Текст над изображением бонуса"
                                                      maxlength="30"></textarea>
                                            <label for="status" style="margin-top: 10px">
                                                <input type="checkbox" id="status" class="flat" name="status" checked>
                                                Активный
                                            </label>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="form-group has-feedback file-upload-wrap">
                                                <label>Изображение бонуса
                                                    <small> рекомендованные размеры: (ширина
                                                        - <?= App::$app->getProperty('bonus_img_width') ?>px; высота
                                                        - <?= App::$app->getProperty('bonus_img_height') ?>px; )
                                                    </small>
                                                </label>
                                                <div class="upload" id="upload"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix"></div>
                                <div class="form-group input-group box-body">
                                    <button type="submit" class="btn btn-block btn-success">Добавить</button>
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
        })
    });
</script>