<?php
use site\App;

?>

<section class="content-header">
    <h1>Создать новую услугу</h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN?>"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li><a href="<?=ADMIN?>/service"><i class="fa fa-folder"></i>Все услуги</a></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="register-main">
                        <div class="col-md-12 account-left form-wrap">
                            <form method="post" id="form" action="<?=ADMIN?>/service/add"
                                    data-toggle="validator" enctype="multipart/form-data" role="form" autocomplete="off"
                                    data-add_url="<?=ADMIN?>/service/add-image"
                                    data-remove_url="<?=ADMIN?>/service/remove-image-file"
                            >
                                <div class="form-group has-feedback file-upload-wrap">
                                    <label>Фото <small> рекомендованные размеры: (ширина - <?= App::$app->getProperty('service_img_width') ?>px; высота - <?= App::$app->getProperty('service_img_height') ?>px; ) </small> </label>
                                    <div class="upload" id="upload">

                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="title">Название</label>
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Название"
                                           data-error="Minimum of 3 chars" data-minlength="3"
                                           required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="sub_title">Краткое описание</label>
                                    <input type="text" name="sub_title" class="form-control" id="sub_title" placeholder="Краткое описание"
                                           data-error="Minimum of 3 chars" data-minlength="3"
                                           required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="price">Цена</label>
                                    <input type="number" name="price" class="form-control" id="price">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="currency">Валюта</label>
<!--                                    <input type="number" name="currency" class="form-control" id="currency">-->
                                    <select class="form-control" name="currency" id="currency">
                                        <?php foreach (\app\models\admin\Service::getCurrencies() as $key => $value): ?>
                                            <option value="<?=$key?>"><?=$value?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="editor1">Описание</label>
                                    <textarea class="form-control" rows="20" id="editor1" name="description"></textarea>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group">
                                    <!--                                    <div class="box-footer">-->
                                    <button type="submit" class="btn btn-block btn-success" id="submit-all">Сохранить</button>
                                    <!--                                    </div>-->
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

