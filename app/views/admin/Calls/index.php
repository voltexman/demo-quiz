<?php $num = 1; ?>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Заказы обратных звонков</h3>
                    <?php if ($calls) : ?>
                    <div class="pull-right">
                        <a href="<?= ADMIN ?>/calls/delete-all-calls" class="btn btn-xs btn-primary delete">
                            <i class="fa fa-trash"></i> Удалить все записи</a>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="box-body table-responsive">
                    <?php if ($calls) : ?>
                    <table class="table table-hover table-striped" id="table">
                        <thead>
                        <tr>
                            <th style="width: 30px">№</th>
                            <th>Имя</th>
                            <th>Номер телефона</th>
                            <th style="width: 400px">Дата/время</th>
                            <th>Состояние</th>
<!--                            <th>Состояние</th>-->
                        </tr>
                        </thead>
                        <?php foreach ($calls as $call) : ?>
                            <tr>
                                <td><?= $num++ ?></td>
                                <td><i class="fa fa-user text-muted"></i> <?= $call['name'] ?></td>
                                <td><i class="fa fa-phone"></i> <?= $call['phone'] ?></td>
                                <td>
                                    <i class="fa fa-fw fa-calendar"></i><?= $call['date'] ?>
                                    <i class="fa fa-fw fa-clock-o"></i><?= substr($call['time'], 0, '-3') ?>
                                </td>
                                <td>
                                    <?php if (!$call['status']) : ?>
                                        <a href="javascript:void(0)" id="<?= $call['id'] ?>" class="status-change">
                                            <span class="label label-success">Обработанный</span>
                                        </a>
                                    <?php else : ?>
                                        <a href="javascript:void(0)" id="<?= $call['id'] ?>" class="status-change">
                                            <span class="label label-danger">Не обработанный</span>
                                        </a>
                                    <?php endif; ?>
                                </td>
<!--                                <td>-->
<!--                                    <div class="input-group-btn">-->
<!--                                        <button type="button" class="btn btn-xs btn---><?//= $call['color'] ?><!-- dropdown-toggle" data-toggle="dropdown">--><?//= $call['status'] ?>
<!--                                            <span class="fa fa-caret-down"></span></button>-->
<!--                                        <ul class="dropdown-menu">-->
<!--                                            <li><a href="#">Обработан</a></li>-->
<!--                                            <li><a href="#">Не обработан</a></li>-->
<!--                                        </ul>-->
<!--                                    </div>-->
<!--                                </td>-->
                            </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php else : ?>
                    <center><h4>Заказов звонков нет</h4></center>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        $('#table').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false,
            'language': {
                'paginate': {
                    'previous': 'Предыдущая',
                    'next': 'Следующая'
                },
                "info": "Показано _START_ из _MAX_",
            },
            // 'columnDefs': [
            //     { 'orderable': false, 'targets': 2 }
            // ]
        });
        $('.status-change').on('click', function () {
            var id = $(this).attr('id');
            var status = $(this).parent().parent().find('span.label');
            $.ajax({
                url: "<?= ADMIN ?>/calls/status-change",
                type: "post",
                data: {id: id},
                success: function () {
                    status.removeClass('label-danger');
                    status.addClass('label-success');
                    status.text('Обработанный');
                }
            });
        })
    })
</script>