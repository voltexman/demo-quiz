<?php

use app\models\admin\Service;
use site\App;


/** @var $service Service */

?>


<section class="content-header">
    <h1>Изменить <?= $service->title?></h1>
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
                        <div class="col-md-12 account-left edit-form-wrap">
                            <form method="post" id="form" action="<?=ADMIN?>/service/edit?id=<?=$service->id?>"
                                  data-toggle="validator" role="form" autocomplete="off"
                                  data-add_url="<?=ADMIN?>/service/add-image"
                                  data-remove_url="<?=ADMIN?>/service/remove-image-file"
                                  data-remove_photo_db_url="<?=ADMIN?>/service/delete-image"
                            >

                                <?php if (!$service->image): ?>
                                    <div class="form-group has-feedback file-upload-wrap">
                                        <label>Фото <small> рекомендованные размеры: (ширина - <?= App::$app->getProperty('service_img_width') ?>px; высота - <?= App::$app->getProperty('service_img_height') ?>px; ) </small> </label>
                                        <div class="upload" id="upload">

                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="form-group">
                                        <div class="col-md-4 gallery-item">
                                            <a href="<?= PATH ?>/upload/<?= $service->image ?>" target="_blank">
                                                <img src="<?= PATH ?>/upload/<?= $service->image ?>" class="img-responsive" alt="image"/>
                                            </a>
                                            <button type="button" class="btn btn-link remove_image" data-name="<?= $service->image ?>" data-id="<?= $service->id ?>">Удалить</button>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                <?php endif; ?>

                                <div class="form-group has-feedback">
                                    <label for="title">Название</label>
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Название"
                                           data-error="Minimum of 3 chars" data-minlength="3"
                                           value="<?= $service->title ?>"
                                           required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="sub_title">Краткое описание</label>
                                    <input type="text" name="sub_title" class="form-control" id="sub_title" placeholder="Краткое описание"
                                           data-error="Minimum of 3 chars" data-minlength="3"
                                           value="<?= $service->sub_title ?>"
                                           required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="price">Цена</label>
                                    <input type="number" name="price" class="form-control" id="price"
                                           value="<?= $service->price ?>"
                                    >
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="currency">Валюта</label>
                                    <select class="form-control" id="currency" name="currency">
                                        <?php foreach (Service::getCurrencies() as $key => $value): ?>
                                            <?php if ($key == $service->currency):?>
                                                <option value="<?=$key?>" selected><?=$value?></option>
                                            <?php else: ?>
                                                <option value="<?=$key?>"><?=$value?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="editor1">Описание</label>
                                    <textarea class="form-control" rows="20" id="editor1" name="description">
                                        <?= $service->description ?>
                                    </textarea>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="status">Статус</label>
                                    <select class="form-control" id="status" name="status" required>
                                        <?php foreach (Service::getStatuses() as $key => $value): ?>
                                            <?php if ($key == $service->status):?>
                                                <option value="<?=$key?>" selected><?=$value?></option>
                                            <?php else: ?>
                                                <option value="<?=$key?>"><?=$value?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="clearfix"></div>
                                <input type="hidden" name="id" value="<?=$service->id;?>">
                                <div class="form-group">
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

