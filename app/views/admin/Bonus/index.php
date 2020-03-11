<section class="content-header">
    <h1>Бонусы</h1>
    <ol class="breadcrumb">
        <li><a href="<?= ADMIN ?>"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li><a href="<?= ADMIN ?>/bonus"><i class="fa fa-folder"></i>Бонусы</a></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <div style="margin-bottom: 10px">
                        <a href="<?= ADMIN ?>/bonus/add" class="btn btn-success">Добавить бонус</a>
                    </div>
                    <div class="table-responsive">
                        <?php if ($bonuses) : ?>
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Название</th>
                                    <th style="width: 200px">Статус</th>
                                    <th style="width: 150px">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($bonuses as $bonus): ?>
                                    <tr>
                                        <td><?= $bonus['name'] ?></td>
                                        <td>
                                            <?php if ($bonus['status']) : ?>
                                                <a href="javascript:void(0)" id="<?= $bonus['id'] ?>" class="status">
                                                    <span class="label label-success">Активный</span>
                                                </a>
                                            <?php else : ?>
                                                <a href="javascript:void(0)" id="<?= $bonus['id'] ?>" class="status">
                                                    <span class="label label-danger">Не активный</span>
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?= ADMIN ?>/bonus/edit?id=<?= $bonus['id']; ?>">
                                                <i class="fa fa-fw fa-edit"></i>
                                            </a>
                                            <a href="<?= ADMIN ?>/bonus/delete?id=<?= $bonus['id']; ?>">
                                                <i class="fa fa-fw fa-trash delete text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <h4>Бонусов нет</h4>
                        <?php endif; ?>
                    </div>
                    <div class="text-content">
                        <p><?= count($bonuses); ?> бонус(а) с <?= $count ?></p>
                        <?php if ($pagination->getCountPages() > 1) : ?>
                            <?= $pagination ?>
                        <?php endif; ?>
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
        $('.status').on('click', function () {
            var id = $(this).attr('id');
            var button = $(this).find('span.label');
            $.ajax({
                url: "<?= ADMIN ?>/bonus/status-change",
                type: "post",
                data: {id: id},
                success: function (response) {
                    if (response) {
                        button.removeClass('label-danger');
                        button.addClass('label-success');
                        button.text('Активный');
                    } else {
                        button.removeClass('label-success');
                        button.addClass('label-danger');
                        button.text('Не активный');
                    }
                }
            })
        })
    })
</script>