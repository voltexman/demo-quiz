<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="limiter mt-5">
                <div class="container-login100">
                    <div class="wrap-login100 p-t-50 p-b-20">
                        <form class="login100-form validate-form" action="<?=PATH;?>/user/confirm" method="post">
                            <span class="login100-form-title">Подтверждение номера телефона</span>
                            <div class="wrap-input100 validate-input m-t-50 m-b-35" data-validate="Введите код">
                                <input class="input100" type="text" maxlength="4" name="code"
                                       required>
                                <span class="focus-input100" data-placeholder="Введите код с смс"></span>
                            </div>
                            <div class="container-login100-form-btn">
                                <button class="login100-form-btn" type="submit">Подтвердить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>