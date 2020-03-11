<section class="content-header">
    <h1>Все пользователи</h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN?>"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li><a href="<?=ADMIN?>/user"><i class="fa fa-dashboard"></i>Пользователи</a></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Фото</th>
                                <th>Id</th>
                                <th>ФИО</th>
                                <th>Телефон</th>
                                <th>Email</th>
                                <th>Code</th>
                                <th>Active</th>
                                <th>Роль</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($users as $user):?>
                                <tr>
                                    <td>
                                        <img style="max-width: 50px" src="../upload/<?=$user->photo_profile?>" alt="">
                                    </td>
                                    <td><?=$user->id?></td>
                                    <td><?=$user->first_name?> <?=$user->last_name?></td>
                                    <td><?=$user->phone?></td>
                                    <td><?=$user->email?></td>
                                    <td><?=$user->code?></td>
                                    <td><?=$user->active ? 'Подтвержденый' : 'Не подтвержденией';?></td>
                                    <td><?=$user->role?></td>
                                    <td>
                                        <a href="<?=ADMIN?>/user/edit?id=<?=$user->id?>">
                                            <i class="fa fa-fw fa-edit"></i>
                                        </a>
                                        <a href="<?=ADMIN?>/user/delete?id=<?=$user->id?>">
                                            <i class="fa fa-fw fa-user-times delete text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-content">
                        <p><?=count($users);?> user(s) of <?=$count?></p>
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
