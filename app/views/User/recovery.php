<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="limiter mt-5">
                <div class="container-login100">
                    <div class="wrap-login100 p-t-50 p-b-20">
                        <form class="login100-form validate-form" action="<?=PATH;?>/user/recovery" method="post">
                            <span class="login100-form-title">Восстановления пароля</span>
                            <div class="wrap-input100 validate-input m-t-50 m-b-35" data-validate="Введите номер телефона">
                                <input class="input100" data-mask="callback-catalog-phone" type="text" name="phone" required>
                                <span class="focus-input100" data-placeholder="Введите номер телефона"></span>
                            </div>
                            <div class="container-login100-form-btn">
                                <button class="login100-form-btn" type="submit">Восстановить</button>
                            </div>
                            <ul class="login-more p-t-90">
                                <li class="m-b-8" style="list-style: none">
                                    <span class="txt1">На указаный телефон прийдет смс с Вашим паролем.</span>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>