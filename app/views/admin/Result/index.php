<?php $num = 1; ?>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Полученнные ответы</h3>
                    <?php if ($results) : ?>
                    <div class="pull-right">
                        <a href="<?= ADMIN ?>/result/delete-all-results" class="btn btn-xs btn-primary delete">
                            <i class="fa fa-trash"></i> Удалить все ответы</a>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="box-body table-responsive">
                    <?php if ($results) : ?>
                        <table class="table table-hover table-striped" id="table">
                            <thead>
                            <tr>
                                <th style="width: 30px">№</th>
                                <th>Телефон / Логин</th>
                                <th>Ответ на</th>
                                <th style="width: 400px">Дата/время</th>
                                <th style="width: 15%">Просмотр</th>
                                <th style="width: 15%">Статус</th>
                            </tr>
                            </thead>
                            <?php foreach ($results as $result) : ?>
                                <tr>
                                    <td><?= $num++ ?></td>
                                    <td><?= $result['phone'] ?></td>
                                    <td><?= ucfirst($result['social']) ?></td>
                                    <td>
                                        <i class="fa fa-fw fa-calendar"></i><?= $result['date'] ?>
                                        <i class="fa fa-fw fa-clock-o"></i><?= substr($result['time'], 0, '-3') ?>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" class="btn btn-xs btn-primary open"
                                           id="<?= $result['id'] ?>" data-toggle="modal" data-target="#modal-default">
                                            <i class="fa fa-eye"></i> Открыть
                                        </a>
                                    </td>
                                    <td><?php if (!$result['status']) : ?>
                                            <span class="label label-success">Просмотрено</span>
                                        <?php else : ?>
                                            <span class="label label-danger">Новый</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php else : ?>
                        <center><h4>Ответов нет</h4></center>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        $('.open').on('click', function () {
            var id = $(this).attr('id');
            var status = $(this).parent().parent().find('span.label');
            $.ajax({
                url: "<?= ADMIN ?>/result/result-details",
                type: "post",
                data: {id: id},
                success: function (response) {
                    $('.modal-dialog').html(response);
                    status.removeClass('label-danger');
                    status.addClass('label-success');
                    status.text('Просмотрено');
                }
            });
        });
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
            'columnDefs': [
                {'orderable': false, 'targets': 4}
            ]
        });
    });
</script>