<div class="login-box">
    <div class="login-logo">
        <a href="index2.html"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <?php if (isset($_SESSION['errors'])): ?>
            <div class="alert alert-danger">
                <?php echo $_SESSION['errors']; unset($_SESSION['errors']); ?>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>
        <p class="login-box-msg">Восстановление пароля</p>

        <form action="<?=ADMIN?>/user/recovery" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="username" placeholder="Username">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-7">
                    <a href="<?= ADMIN ?>/user/login-admin">Назад</a>
                </div>
                <!-- /.col -->
                <div class="col-xs-5">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Восстановить</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->