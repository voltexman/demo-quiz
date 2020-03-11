<?php

/**
 * @var $logo Logo
 */

use app\models\admin\Logo;
use site\App;

?>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="register-main">
                        <div class="account-left form-wrap edit-form-wrap">
                            <form method="post" id="form" action="<?= ADMIN ?>/logo"
                                  data-toggle="validator" enctype="multipart/form-data" role="form" autocomplete="off"
                                  data-add_url="<?= ADMIN ?>/logo/add-image"
                                  data-remove_photo_db_url="<?= ADMIN ?>/logo/delete-image">
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group has-feedback">
                                            <label for="title">Текст логотипа
                                                <small class="text-muted">(возле логотипа)</small></label>
                                            <input type="text" name="logo_text" class="form-control"
                                                   id="title"
                                                   placeholder="Текст логотипа" maxlength="255"
                                                   value="<?= $logo->logo_text ?>">
                                            <span class="glyphicon form-control-feedback"
                                                  aria-hidden="true"></span>
                                            <div class="help-block with-errors"></div>
                                        </div>

                                        <?php if (!$logo->image) : ?>

                                            <div class="form-group has-feedback file-upload-wrap">
                                                <label>Фото
                                                    <small> рекомендованные размеры: (ширина
                                                        - <?= App::$app->getProperty('logo_img_width') ?>px; высота
                                                        - <?= App::$app->getProperty('logo_img_height') ?>px; )
                                                    </small>
                                                </label>
                                                <div class="upload" id="upload"></div>
                                            </div>

                                        <?php else: ?>

                                            <div class="form-group">
                                                <div class="col-md-4 gallery-item">
                                                    <a href="<?= PATH ?>/upload/main/<?= $logo->image ?>"
                                                       target="_blank">
                                                        <img src="<?= PATH ?>/upload/main/<?= $logo->image ?>"
                                                             class="img-responsive"
                                                             alt="image"/>
                                                    </a>
                                                    <button type="button" class="btn btn-link remove_image"
                                                            data-name="<?= $logo->image ?>"
                                                            data-id="<?= $logo->id ?>">
                                                        Удалить
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>

                                        <?php endif; ?>

                                        <div class="clearfix"></div>
                                        <div class="form-group">
                                            <div class="form-group input-group box-body">
                                                <button type="submit" class="btn btn-block btn-success" id="submit-all">
                                                    Сохранить
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>