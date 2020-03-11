<?php

/**
 * @var $global MainPage
 */

use app\models\admin\MainPage;
use site\App; ?>

<section class="content-header">
    <h1>Изменить содержимое стартовой страницы</h1>
    <ol class="breadcrumb">
        <li><a href="<?= ADMIN ?>"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li><a href="<?= ADMIN ?>/global"><i class="fa fa-folder"></i>Стартовая страница</a></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="register-main">
                        <div class="account-left form-wrap edit-form-wrap">
                            <form method="post" id="form" action="<?= ADMIN ?>/global"
                                  data-toggle="validator" enctype="multipart/form-data" role="form" autocomplete="off"
                                  data-add_url="<?= ADMIN ?>/global/add-image"
                                  data-remove_photo_db_url="<?= ADMIN ?>/global/delete-image">
                                <div class="row">
                                    <div class="col-md-6">
                                        <table>
                                            <tbody>
                                            <tr>
                                                <td style="width: 90%;">
                                                    <div class="form-group has-feedback">
                                                        <label for="title">Заголовок страницы
                                                            <small class="text-muted">(в браузере)</small></label>
                                                        <input type="text" name="title" class="form-control" id="title"
                                                               placeholder="Meta тег"
                                                               data-error="Нужно указать заголовок" maxlength="90"
                                                               required value="<?= $global->title ?>">
                                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group input-group box-body pull-right">
                                                        <a href="<?= ADMIN ?>/logo" class="btn btn-block btn-success" style="margin-top: 20px">
                                                            Логотип
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>

                                        <div class="form-group has-feedback">
                                            <label for="button-name">Название кнопки</label>
                                            <input type="text" name="button_name" class="form-control" id="button-name"
                                                   placeholder="Название"
                                                   data-error="Нужно указать название кнопки" data-minlength="3"
                                                   required value="<?= $global->button_name ?>">
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            <div class="help-block with-errors"></div>
                                        </div>

                                        <div class="form-group has-feedback">
                                            <label for="right-title">Заголовок
                                                <small class="text-muted">(над кнопкой)</small></label>
                                            <textarea type="text" name="right_title" class="form-control"
                                                      id="right-title"
                                                      placeholder="Краткое описание"
                                                      rows="4"
                                                      data-error="Нужно заполнить краткое описание" data-minlength="3"
                                                      required><?= $global->right_title ?></textarea>
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            <div class="help-block with-errors"></div>
                                        </div>

                                        <div class="form-group has-feedback">
                                            <label for="sub-title">Подзаголовок</label>
                                            <textarea type="text" name="sub_title" class="form-control" id="sub-title"
                                                      placeholder="Подзаголовок"
                                                      rows="4"><?= $global->sub_title ?></textarea>
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            <div class="help-block with-errors"></div>
                                        </div>

                                        <?php if (!$global->image) : ?>

                                            <div class="form-group has-feedback file-upload-wrap">
                                                <label>Фото
                                                    <small> рекомендованные размеры: (ширина
                                                        - <?= App::$app->getProperty('main_img_width') ?>px; высота
                                                        - <?= App::$app->getProperty('main_img_height') ?>px; )
                                                    </small>
                                                </label>
                                                <div class="upload" id="upload"></div>
                                            </div>

                                        <?php else: ?>

                                            <div class="form-group">
                                                <div class="col-md-4 gallery-item">
                                                    <a href="<?= PATH ?>/upload/main/<?= $global->image ?>"
                                                       target="_blank">
                                                        <img src="<?= PATH ?>/upload/main/<?= $global->image ?>"
                                                             class="img-responsive"
                                                             alt="image"/>
                                                    </a>
                                                    <button type="button" class="btn btn-link remove_image"
                                                            data-name="<?= $global->image ?>"
                                                            data-id="<?= $global->id ?>">
                                                        Удалить
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>

                                        <?php endif; ?>

                                        <div class="clearfix"></div>
                                        <div class="form-group">
                                            <!--                                    <div class="box-footer">-->
                                            <div class="form-group input-group box-body">
                                                <button type="submit" class="btn btn-block btn-success" id="submit-all">
                                                    Сохранить
                                                </button>
                                            </div>
                                            <!--                                    </div>-->
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-feedback">
                                            <label for="line_one">Первая строка</label>
                                            <input type="text" name="line_one" class="form-control" id="line_one"
                                                   value="<?= $global->line_one ?>">
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label for="line_two">Вторая строка</label>
                                            <input type="text" name="line_two" class="form-control" id="line_two"
                                                   value="<?= $global->line_two ?>">
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label for="line_three">Третья строка</label>
                                            <input type="text" name="line_three" class="form-control" id="line_three"
                                                   value="<?= $global->line_three ?>">
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
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

