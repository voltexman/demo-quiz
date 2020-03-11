<section class="content-header">
    <h1>Пользователь <?=$user->first_name?> <?=$user->last_name?></h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN?>"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li><a href="<?=ADMIN?>/user"><i class="fa fa-dashboard"></i>Пользователи</a></li>
        <li class="active"><?=$user->first_name?> <?=$user->last_name?></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form action="<?=ADMIN?>/user/edit" method="post" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="username">Логин</label>
                            <input type="text" class="form-control" name="username" id="username"
                                   value="<?=h($user->username)?>"
                                   data-error="Minimum of 3 chars" data-minlength="4"
                                   required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Если хотите изменить пароль, просто введите новый пароль">
                        </div>
                        <div class="form-group has-feedback">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                   value="<?=h($user->email)?>"
                                   data-error="Bruh, that email address is invalid">
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>
                        <input type="hidden" name="id" value="<?=$user->id?>">
                        <button type="submit" class="btn btn-success">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
