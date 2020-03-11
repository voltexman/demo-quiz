<?php

use site\App;

?>

<section class="content-header">
    <h1>Изменить бонус</h1>
    <ol class="breadcrumb">
        <li><a href="<?= ADMIN ?>"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li><a href="<?= ADMIN ?>/bonus"><i class="fa fa-folder"></i>Бонусы</a></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="register-main">
                        <div class="col-md-12 account-left edit-form-wrap">
                            <form method="post" id="form" action="<?= ADMIN ?>/bonus/edit?id=<?= $bonus->id ?>"
                                  data-toggle="validator" role="form" autocomplete="off"
                                  data-add_url="<?=ADMIN?>/bonus/add-image"
                                  data-remove_url="<?=ADMIN?>/bonus/remove-image-file"
                                  data-remove_photo_db_url="<?=ADMIN?>/bonus/delete-image">

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="form-group has-feedback">
                                                <label for="name">Название</label>
                                                <input type="text" name="name" class="form-control" id="name"
                                                       placeholder="Название бонуса" value="<?= $bonus->name ?>"
                                                       data-error="Укажите название бонуса"
                                                       required>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <label for="text">Описание
                                            <small class="text-muted">до 30 символов</small></label>
                                            <textarea name="text" id="text" class="form-control" style="resize: none"
                                                      rows="3" placeholder="Текст над изображением бонуса"
                                                      maxlength="30"><?= $bonus['text'] ?></textarea>
                                            <label for="status" style="margin-top: 10px">
                                                <input type="checkbox" id="status" class="flat" name="status" <?php if ($bonus->status) echo 'checked' ?>>
                                                Активный
                                            </label>
                                        </div>
                                        <div class="col-xs-6">
                                            <?php if (!$bonus->image) : ?>
                                                <div class="form-group has-feedback file-upload-wrap">
                                                    <label>Изображение бонуса
                                                        <small> рекомендованные размеры: (ширина
                                                            - <?= App::$app->getProperty('bonus_img_width') ?>px; высота
                                                            - <?= App::$app->getProperty('bonus_img_height') ?>px; )
                                                        </small>
                                                    </label>
                                                    <div class="upload" id="upload"></div>
                                                </div>
                                            <?php else : ?>
                                                <div class="form-group">
                                                    <div class="col-md-4 gallery-item">
                                                        <a href="<?= PATH ?>/upload/bonus/<?= $bonus->image ?>"
                                                           target="_blank">
                                                            <img src="<?= PATH ?>/upload/bonus/<?= $bonus->image ?>"
                                                                 class="img-responsive" alt="image"/>
                                                        </a>
                                                        <button type="button" class="btn btn-link remove_image"
                                                                data-name="<?= $bonus->image ?>"
                                                                data-id="<?= $bonus->id ?>">Удалить
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            <?php endif; ?>
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
        })
    });
</script>