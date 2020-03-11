<!DOCTYPE html>
<html>
<head>
    <base href="/adminlte/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?= $this->getMeta(); ?>
    <link rel="shortcut icon" href="../images/logo.png" type="image/png"/>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link href="css/toastr.css" rel="stylesheet"/>
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- Checkbox style -->
    <link rel="stylesheet" href="dist/css/checkbox/checkbox.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">

    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="plugins/iCheck/all.css">

    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="plugins/color-picker/palette-color-picker.css">

    <!-- Date Picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

    <link rel="stylesheet" href="css/dropzone.css">
    <link rel="stylesheet" href="css/admin.css">

    <!-- jQuery 3 -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="bower_components/jquery-ui/jquery-ui.min.js"></script>

    <script src="js/toastr.min.js"></script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="https://iceberg.vn.ua" class="logo" target="_blank">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Ice</b>Quiz</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li>
                        <a href="/">Вернутся на сайт</a>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <?php if (!empty($_SESSION['user'])): ?>
                                <span class="hidden-xs">
                                    <?= $_SESSION['user']['username'] ?>
                                </span>
                            <?php endif; ?>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                <p>
                                    <?php if (!empty($_SESSION['user'])): ?>
                                        <?= $_SESSION['user']['username'] ?>
                                    <?php endif; ?>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?= ADMIN ?>/user/edit?id=<?= $_SESSION['user']['id'] ?>"
                                       class="btn btn-default btn-flat">Изменить</a>
                                </div>
                                <div class="pull-right">
                                    <a href="/user/logout" class="btn btn-default btn-flat">Выйти</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <!--                    <li>-->
                    <!--                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>-->
                    <!--                    </li>-->
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->

            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">Главное меню</li>
                <li data-widget="tree">
                    <a href="<?= ADMIN ?>">
                        <i class="fa fa-dashboard"></i><span>Панель управления</span>
                    </a>
                </li>
                <li data-widget="tree">
                    <a href="<?= ADMIN ?>/global">
                        <i class="fa fa-commenting"></i><span>Стартовая страница</span>
                    </a>
                </li>
                <li data-widget="tree">
                    <a href="<?= ADMIN ?>/question">
                        <i class="fa fa-check-square-o"></i><span>Вопросы & ответы</span>
                    </a>
                </li>
                <li data-widget="tree">
                    <a href="<?= ADMIN ?>/form">
                        <i class="fa fa-file-text-o"></i><span>Форма опроса</span>
                    </a>
                </li>
                <li data-widget="tree">
                    <a href="<?= ADMIN ?>/bonus">
                        <i class="fa fa-th-large"></i><span>Бонусы</span>
                    </a>
                </li>
                <li data-widget="tree">
                    <a href="<?= ADMIN ?>/contact">
                        <i class="fa fa-user"></i><span>Контакты</span>
                    </a>
                </li>
                <li class="header">Настройки</li>
<!--                <li data-widget="tree">-->
<!--                    <a href="--><?//= ADMIN ?><!--/colors">-->
<!--                        <i class="fa fa-asterisk"></i><span>Внешний вид</span>-->
<!--                    </a>-->
<!--                </li>-->
                <li data-widget="tree">
                    <a href="<?= ADMIN ?>/user/edit?id=1">
                        <i class="fa fa-lock"></i><span>Пользователь</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-puzzle-piece"></i> <span>Интеграция</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?= ADMIN ?>/integration/mail"><i class="fa fa-circle-o"></i> Почта</a></li>
                        <li><a href="<?= ADMIN ?>/integration/google"><i class="fa fa-circle-o"></i> Google
                                Аналитика</a></li>
                        <li><a href="<?= ADMIN ?>/integration/yandex"><i class="fa fa-circle-o"></i> Yandex метрика</a></li>
                    </ul>
                </li>
                <li class="header">Клиентская сторона</li>
                <li data-widget="tree">
                    <a href="<?= ADMIN ?>/calls">
                        <i class="fa fa-phone"></i><span>Обратный звонок</span>
                        <?php if ($_SESSION['callBackCount']) : ?>
                            <span class="pull-right-container">
                            <span class="label label-danger pull-right"><?= $_SESSION['callBackCount'] ?></span>
                        </span>
                        <?php endif; ?>
                    </a>
                </li>
                <li data-widget="tree">
                    <a href="<?= ADMIN ?>/result">
                        <i class="fa fa-list-ul"></i><span>Ответы</span>
                        <?php if ($_SESSION['resultCount']) : ?>
                            <span class="pull-right-container">
                            <span class="label label-danger pull-right"><?= $_SESSION['resultCount'] ?></span>
                        </span>
                        <?php endif; ?>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?php if (isset($_SESSION['errors'])): ?>
            <div class="alert alert-danger">
                <?php echo $_SESSION['errors'];
                unset($_SESSION['errors']); ?>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?php echo $_SESSION['success'];
                unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>


        <?= $content ?>
    </div>
    <!-- /.content-wrapper -->
<!--    <footer class="main-footer">-->
<!--        <div class="pull-right hidden-xs">-->
<!--            <b>Version</b> 2.4.0-->
<!--        </div>-->
<!--        <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights-->
<!--        reserved.-->
<!--    </footer>-->

    <!-- Control Sidebar -->
    <!-- /.control-sidebar -->

    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<script>
    var path = "<?=PATH?>",
        public_path = "<?=PATH?>",
        adminPath = "<?=ADMIN?>";
</script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<!--<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>-->
<!--<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>-->

<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<!--<script src="bower_components/morris.js/morris.min.js"></script>-->
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>

<!-- jvectormap -->
<!--<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>-->
<!--<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>-->
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<!--<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>-->
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="bower_components/bootstrap-datepicker/js/locales/bootstrap-datepicker.ru.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<!--<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>-->
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.js"></script>
<!-- Bootstrap CKeditor -->
<script src="bower_components/ckeditor/ckeditor.js"></script>
<script src="bower_components/ckeditor/adapters/jquery.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>

<!-- FastClick -->
<!--<script src="bower_components/fastclick/lib/fastclick.js"></script>-->
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="dist/js/pages/dashboard.js"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script src="js/validator.min.js"></script>
<script src="js/dropzone.js"></script>
<script src="js/admin.js"></script>
</body>
</html>

<?php
//$logs = \R::getDatabaseAdapter()
//    ->getDatabase()
//    ->getLogger();
//
//debug( $logs->grep( 'SELECT' ) );
//?>