<?php $callNum = 1; $resultNum = 1 ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Панель управления
        <!--        <small>Control panel</small>-->
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= ADMIN ?>"><i class="fa fa-dashboard"></i>Главная</a></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Статистика</h3>
                    <div class="pull-right">
                        <a href="<?= ADMIN ?>/main/full-reset-statistics" class="btn btn-xs btn-primary delete">Сбросить счётчики</a>
                    </div>
                </div>
                <!-- /.box-header -->

                <!-- ./box-body -->
                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-3 col-xs-6">
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3><?= $countVisitors ?></h3>
                                    <p><?= $todayVisitors ?> за сегодня</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="javascript:void(0)" class="small-box-footer"><b>Посетители</b></a>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-6">
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3><?= $countResults ?></h3>
                                    <p><?= $newResults ?> новых</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="javascript:void(0)" class="small-box-footer"><b>Ответы</b></a>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-6">
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3><?= round($conversion) ?>%</h3>
                                    <p>посетители / ответы</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="javascript:void(0)" class="small-box-footer"><b>Конверсия</b></a>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-6">
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <span><b>Chrome: </b><?= $browser['chrome'] ?></span><br>
                                            <span><b>Firefox: </b><?= $browser['firefox'] ?></span><br>
                                            <span><b>Safari: </b><?= $browser['safari'] ?></span><br>
                                            <span><b>Opera: </b><?= $browser['opera'] ?></span>
                                        </div>
<!--                                        <div class="col-sm-4">-->
<!--                                            <span><b>Пк: </b>--><?//= $device['desktop'] ?><!--</span><br>-->
<!--                                            <span><b>Планшеты: </b>--><?//= $device['tablet'] ?><!--</span><br>-->
<!--                                            <span><b>Мобильные: </b>--><?//= $device['smartphone'] ?><!--</span><br>-->
<!--                                        </div>-->
                                        <div class="col-sm-6">
                                            <span><b>Linux: </b><?= $os['linux'] ?></span><br>
                                            <span><b>Windows: </b><?= $os['windows'] ?></span><br>
                                            <span><b>Android: </b><?= $os['android'] ?></span><br>
                                            <span><b>iOS: </b><?= $os['ios'] ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="icon">
<!--                                    <i class="ion ion-bag"></i>-->
                                </div>
                                <span href="javascript:void(0)" class="small-box-footer"><b>Данные посетителей</b></span>
                            </div>
                        </div>
                    </div>
                    <?php if ($statistics) : ?>
                        <hr>
                        <div class="row">
                        <div class="col-md-8">
                            <!-- Custom Tabs -->
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
<!--                                    <li class="active"><a href="#tab_1" data-toggle="tab">За неделю</a></li>-->
                                    <li class="active"><a href="#tab_2" data-toggle="tab">Посещаемость</a></li>
                                    <li><a href="#tab_3" data-toggle="tab">Конверсия</a></li>
                                </ul>
                                <div class="tab-content">
<!--                                    <div class="tab-pane active" id="tab_1">-->
<!--                                        <div class="chart">-->
<!--                                            <canvas id="weekChart" style="height:250px"></canvas>-->
<!--                                        </div>-->
<!--                                    </div>-->
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane active" id="tab_2">
                                        <div class="chart">
                                            <canvas id="monthChart" style="height:250px"></canvas>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_3">
                                        <div class="chart">
                                            <canvas id="conversionChart" style="height:250px"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_browser" data-toggle="tab"><i class="fa fa-firefox"></i></a></li>
                                    <li><a href="#tab_device" data-toggle="tab"><i class="fa fa-television"></i></a></li>
                                    <li><a href="#tab_os" data-toggle="tab"><i class="fa fa-mouse-pointer"></i></a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_browser">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="chart-responsive">
                                                    <canvas id="browserChart" height="150"></canvas>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <ul class="chart-legend clearfix">
                                                    <li><i class="fa fa-circle-o text-red"></i> Chrome</li>
                                                    <li><i class="fa fa-circle-o text-green"></i> IE</li>
                                                    <li><i class="fa fa-circle-o text-yellow"></i> FireFox</li>
                                                    <li><i class="fa fa-circle-o text-aqua"></i> Safari</li>
                                                    <li><i class="fa fa-circle-o text-light-blue"></i> Opera</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_device">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="chart-responsive">
                                                    <canvas id="deviceChart" height="150"></canvas>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <ul class="chart-legend clearfix">
                                                    <li><i class="fa fa-circle-o text-red"></i> ПК</li>
                                                    <li><i class="fa fa-circle-o text-green"></i> Планшеты</li>
                                                    <li><i class="fa fa-circle-o text-yellow"></i> Мобильные</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_os">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="chart-responsive">
                                                    <canvas id="osChart" height="150"></canvas>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <ul class="chart-legend clearfix">
                                                    <li><i class="fa fa-circle-o text-red"></i> Linux</li>
                                                    <li><i class="fa fa-circle-o text-green"></i> Windows</li>
                                                    <li><i class="fa fa-circle-o text-yellow"></i> Android</li>
                                                    <li><i class="fa fa-circle-o text-aqua"></i> iOS</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Новые заказы звонков</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <?php if ($calls) : ?>
                    <table class="table no-margin table-striped" id="table">
                        <thead>
                        <tr>
                            <th style="width: 30px">№</th>
                            <th>Имя</th>
                            <th>Номер телефона</th>
                            <th style="width: 400px">Дата/время</th>
                            <th>Состояние</th>
                        </tr>
                        </thead>
                        <?php foreach ($calls as $call) : ?>
                            <tr>
                                <td><?= $callNum++ ?></td>
                                <td><i class="fa fa-user text-muted"></i> <?= $call['name'] ?></td>
                                <td><i class="fa fa-phone"></i> <?= $call['phone'] ?></td>
                                <td>
                                    <i class="fa fa-fw fa-calendar"></i><?= $call['date'] ?>
                                    <i class="fa fa-fw fa-clock-o"></i><?= substr($call['time'], 0, '-3') ?>
                                </td>
                                <td>
                                    <a href="javascript:void(0)" id="<?= $call['id'] ?>" class="status-change">
                                        <span class="label label-danger">Не обработанный</span>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php else : ?>
                    <center><h4>Новых заказов звонков нет</h4></center>
                <?php endif; ?>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
            <a href="<?= ADMIN ?>/calls" class="btn btn-sm btn-info btn-flat pull-right">Открыть все</a>
        </div>
        <!-- /.box-footer -->
    </div>

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Новые ответы</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <?php if ($results) : ?>
                    <table class="table no-margin table-striped">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th style="width: 15%">Просмотр</th>
                            <th style="width: 200px">Дата</th>
                            <th style="width: 200px">Время</th>
                            <th style="width: 200px">Статус</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($results as $result) : ?>
                            <tr>
                                <td><?= $resultNum++ ?></td>
                                <td>
                                    <a href="javascript:void(0)" class="btn btn-xs btn-primary open"
                                       id="<?= $result['id'] ?>" data-toggle="modal" data-target="#modal-default">
                                        <i class="fa fa-eye"></i> Открыть
                                    </a>
                                </td>
                                <td><i class="fa fa-fw fa-calendar"></i><?= $result['date'] ?></td>
                                <td><i class="fa fa-fw fa-clock-o"></i><?= substr($result['time'], 0, '-3') ?></td>
                                <td><span class="label label-danger">Новый</span></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <center><h4>Новых ответов нет</h4></center>
                <?php endif; ?>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
            <a href="<?= ADMIN ?>/result" class="btn btn-sm btn-info btn-flat pull-right">Открыть все</a>
        </div>
        <!-- /.box-footer -->
    </div>
</section>
<!-- /.content -->

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- ChartJS -->
<script src="bower_components/chart.js/Chart.js"></script>

<script>
    $(document).ready(function () {
        // Данные графика за неделю
        // var weekChartData = {
        //     labels  : ['Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб', 'Нд'],
        //     datasets: [
        //         {
        //             label               : 'Electronics',
        //             fillColor           : 'rgba(210, 214, 222, 1)',
        //             strokeColor         : 'rgba(210, 214, 222, 1)',
        //             pointColor          : 'rgba(210, 214, 222, 1)',
        //             pointStrokeColor    : '#c1c7d1',
        //             pointHighlightFill  : '#fff',
        //             pointHighlightStroke: 'rgba(220,220,220,1)',
        //             data                : [65, 59, 80, 81, 56, 55, 40]
        //         },
        //         {
        //             label               : 'Digital Goods',
        //             fillColor           : 'rgba(60,141,188,0.9)',
        //             strokeColor         : 'rgba(60,141,188,0.8)',
        //             pointColor          : '#3b8bba',
        //             pointStrokeColor    : 'rgba(60,141,188,1)',
        //             pointHighlightFill  : '#fff',
        //             pointHighlightStroke: 'rgba(60,141,188,1)',
        //             data                : [28, 48, 40, 19, 86, 27, 90]
        //         }
        //     ]
        // };
        // Данные графика за месяц
        var monthChartData = {
            labels  : [<?php
                            foreach ($statistics as $statistic) {
                                echo "'" . mb_substr($statistic['date'], -5)  . "', ";
                            }
                        ?>],
            datasets: [
                {
                    label               : 'Ответы',
                    fillColor           : 'rgba(210, 214, 222, 1)',
                    strokeColor         : 'rgba(210, 214, 222, 1)',
                    pointColor          : 'rgba(210, 214, 222, 1)',
                    pointStrokeColor    : '#c1c7d1',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data                : [<?php
                                                foreach ($statistics as $statistic) {
                                                    echo "'" . $statistic['result_count'] . "', ";
                                                }
                                            ?>]
                },
                {
                    label               : 'Посещения',
                    fillColor           : 'rgba(60,141,188,0.9)',
                    strokeColor         : 'rgba(60,141,188,0.8)',
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(60,141,188,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data                : [<?php
                                                foreach ($statistics as $statistic) {
                                                    echo "'" . $statistic['visit_count'] . "', ";
                                                }
                                            ?>]
                }
            ]
        };
        // Данные графика конверсии
        var conversionChartData = {
            labels  : [<?php
                            foreach ($statistics as $statistic) {
                                echo "'" . mb_substr($statistic['date'], -5)  . "', ";
                            }
                        ?>],
            datasets: [
                // {
                //     label               : 'Electronics',
                //     fillColor           : 'rgba(210, 214, 222, 1)',
                //     strokeColor         : 'rgba(210, 214, 222, 1)',
                //     pointColor          : 'rgba(210, 214, 222, 1)',
                //     pointStrokeColor    : '#c1c7d1',
                //     pointHighlightFill  : '#fff',
                //     pointHighlightStroke: 'rgba(220,220,220,1)',
                //     data                : [65, 59, 80, 81, 56, 55, 40]
                // },
                {
                    label               : 'Конверсия',
                    fillColor           : 'rgba(60,141,188,0.9)',
                    strokeColor         : 'rgba(60,141,188,0.8)',
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(60,141,188,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data                : [<?php
                                                foreach ($statistics as $statistic) {
                                                    $result = ($statistic['result_count'] / $statistic['visit_count']) * 100;
                                                    echo "'" . round($result) . "', ";
                                                }
                                            ?>]
                }
            ]
        };
        // Данные о браузерах
        var browserData        = [
            {
                value    : <?= $browser['chrome'] ?>,
                color    : '#f56954',
                highlight: '#f56954',
                label    : 'Chrome'
            },
            {
                value    : <?= $browser['ie'] ?>,
                color    : '#00a65a',
                highlight: '#00a65a',
                label    : 'IE'
            },
            {
                value    : <?= $browser['firefox'] ?>,
                color    : '#f39c12',
                highlight: '#f39c12',
                label    : 'FireFox'
            },
            {
                value    : <?= $browser['safari'] ?>,
                color    : '#00c0ef',
                highlight: '#00c0ef',
                label    : 'Safari'
            },
            {
                value    : <?= $browser['opera'] ?>,
                color    : '#3c8dbc',
                highlight: '#3c8dbc',
                label    : 'Opera'
            }
        ];
        // Данные об устройствах
        var deviceData        = [
            {
                value    : <?= $device['desktop'] ?>,
                color    : '#f56954',
                highlight: '#f56954',
                label    : 'ПК'
            },
            {
                value    : <?= $device['tablet'] ?>,
                color    : '#00a65a',
                highlight: '#00a65a',
                label    : 'Планшеты'
            },
            {
                value    : <?= $device['smartphone'] ?>,
                color    : '#f39c12',
                highlight: '#f39c12',
                label    : 'Мобильные'
            }
        ];
        // Данные операционных систем
        var osData        = [
            {
                value    : <?= $os['linux'] ?>,
                color    : '#f56954',
                highlight: '#f56954',
                label    : 'Linux'
            },
            {
                value    : <?= $os['windows'] ?>,
                color    : '#00a65a',
                highlight: '#00a65a',
                label    : 'Windows'
            },
            {
                value    : <?= $os['android'] ?>,
                color    : '#f39c12',
                highlight: '#f39c12',
                label    : 'Android'
            },
            {
                value    : <?= $os['ios'] ?>,
                color    : '#00c0ef',
                highlight: '#00c0ef',
                label    : 'iOS'
            }
        ];

        var areaChartOptions = {
            //Boolean - If we should show the scale at all
            showScale               : true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines      : false,
            //String - Colour of the grid lines
            scaleGridLineColor      : 'rgba(0,0,0,.05)',
            //Number - Width of the grid lines
            scaleGridLineWidth      : 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines  : true,
            //Boolean - Whether the line is curved between points
            bezierCurve             : true,
            //Number - Tension of the bezier curve between points
            bezierCurveTension      : 0.3,
            //Boolean - Whether to show a dot for each point
            pointDot                : true,
            //Number - Radius of each point dot in pixels
            pointDotRadius          : 2,
            //Number - Pixel width of point dot stroke
            pointDotStrokeWidth     : 1,
            //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
            pointHitDetectionRadius : 20,
            //Boolean - Whether to show a stroke for datasets
            datasetStroke           : true,
            //Number - Pixel width of dataset stroke
            datasetStrokeWidth      : 2,
            //Boolean - Whether to fill the dataset with a color
            datasetFill             : true,
            //String - A legend template
            legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
            //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio     : true,
            //Boolean - whether to make the chart responsive to window resizing
            responsive              : true
        };
        var pieOptions     = {
            //Boolean - Whether we should show a stroke on each segment
            segmentShowStroke    : true,
            //String - The colour of each segment stroke
            segmentStrokeColor   : '#fff',
            //Number - The width of each segment stroke
            segmentStrokeWidth   : 2,
            //Number - The percentage of the chart that we cut out of the middle
            percentageInnerCutout: 50, // This is 0 for Pie charts
            //Number - Amount of animation steps
            animationSteps       : 100,
            //String - Animation easing effect
            animationEasing      : 'easeOutBounce',
            //Boolean - Whether we animate the rotation of the Doughnut
            animateRotate        : true,
            //Boolean - Whether we animate scaling the Doughnut from the centre
            animateScale         : false,
            //Boolean - whether to make the chart responsive to window resizing
            responsive           : true,
            // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio  : true,
            //String - A legend template
            legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
        };

        // График за неделю
        // var weekChartCanvas          = $('#weekChart').get(0).getContext('2d');
        // var weekChart                = new Chart(weekChartCanvas);
        // var weekChartOptions         = areaChartOptions;
        // weekChartOptions.datasetFill = false;
        // weekChart.Line(weekChartData, weekChartOptions);

        // График за месяц
        var monthChartCanvas          = $('#monthChart').get(0).getContext('2d');
        var monthChart                = new Chart(monthChartCanvas);
        var monthChartOptions         = areaChartOptions;
        monthChartOptions.datasetFill = false;
        monthChart.Line(monthChartData, monthChartOptions);

        // График конверсии
        var conversionChartCanvas          = $('#conversionChart').get(0).getContext('2d');
        var conversionChart                = new Chart(conversionChartCanvas);
        var conversionChartOptions         = areaChartOptions;
        conversionChartOptions.datasetFill = false;
        conversionChart.Line(conversionChartData, conversionChartOptions);

        // График браузеров
        var browserChartCanvas = $('#browserChart').get(0).getContext('2d');
        var browserChart       = new Chart(browserChartCanvas);
        browserChart.Doughnut(browserData, pieOptions);

        // График устройств
        var deviceChartCanvas = $('#deviceChart').get(0).getContext('2d');
        var deviceChart       = new Chart(deviceChartCanvas);
        deviceChart.Doughnut(deviceData, pieOptions);

        // График опепационных систем
        var osChartCanvas = $('#osChart').get(0).getContext('2d');
        var osChart       = new Chart(osChartCanvas);
        osChart.Doughnut(osData, pieOptions);

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
                    status.text('Обработаный');
                }
            });
        })
    })
</script>