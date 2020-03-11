<?php

use app\models\admin\Service;
use site\libs\Pagination;

/** @var $services Service [] */
/** @var $pagination Pagination */
/** @var $count integer */
?>


<section class="content-header">
    <h1>Все услуги</h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN?>"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li><a href="<?=ADMIN?>/service"><i class="fa fa-folder"></i>Все услуги</a></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <a href="<?=ADMIN?>/service/add" class="btn btn-success">Добавить новую услугу</a>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Название</th>
                                <th>Цена</th>
                                <th>Статус</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($services as $service):?>
                                <tr>
                                    <td><?=$service['title'];?></td>
                                    <td><?=$service['price'] ?> <?=$service['currency'] ?></td>
                                    <td><?= $service['status'] == Service::STATUS_ACTIVE ? 'Активный' : 'Не активный';?></td>
                                    <td>
                                        <a href="<?=ADMIN?>/service/edit?id=<?=$service['id'];?>">
                                            <i class="fa fa-fw fa-edit"></i>
                                        </a>
                                        <a href="<?=ADMIN?>/service/delete?id=<?=$service['id'];?>">
                                            <i class="fa fa-fw fa-trash delete text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-content">
                        <p><?=count($services);?> услуг(а) с <?=$count?></p>
                        <?php if ($pagination->getCountPages() > 1):?>
                            <?=$pagination?>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>