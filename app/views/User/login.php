<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="limiter">
                <div class="container-login100">
                    <div class="wrap-login100 p-t-70 p-b-20">
                        <form class="login100-form validate-form" action="<?=PATH;?>/user/login" method="post">
                            <span class="login100-form-title">Вход на сайт</span>
                            <div class="wrap-input100 validate-input m-t-50 m-b-35" data-validate="Введите свой телефон">
                                <input class="input100" data-mask="callback-catalog-phone" type="text" name="phone" required>
                                <span class="focus-input100" data-placeholder="Телефон"></span>
                            </div>
                            <div class="wrap-input100 validate-input m-b-50" data-validate="Введите пароль">
                                <input class="input100" type="password" name="password">
                                <span class="focus-input100" data-placeholder="Пароль"></span>
                            </div>
                            <div class="container-login100-form-btn">
                                <button class="login100-form-btn" type="submit">Вход</button>
                            </div>
                            <ul class="login-more p-t-90">
                                <li class="m-b-8">
                                    <span class="txt1">Восстановить </span>
                                    <a href="<?=PATH;?>/user/recovery" class="txt2">пароль</a>
                                </li>
                                <li>
                                    <span class="txt1">Если у вас нет акаунта</span>
                                    <a href="<?=PATH;?>/user/registration" class="txt2">зарегистрируйтесь</a>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>