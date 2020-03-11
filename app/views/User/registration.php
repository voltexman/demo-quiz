<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="limiter">
                <div class="container-login100">
                    <div class="wrap-login100 p-t-50 p-b-20">
                        <form class="login100-form validate-form" action="<?=PATH;?>/user/registration" method="post">
                            <span class="login100-form-title">Регистрация</span>
                            <div class="wrap-input100 validate-input m-t-50 m-b-35" data-validate="Введите имя">
                                <input class="input100" type="text" name="first_name" required>
                                <span class="focus-input100" data-placeholder="Имя *"></span>
                            </div>
                            <div class="wrap-input100 validate-input m-t-50 m-b-35" data-validate="Введите фамилию">
                                <input class="input100" type="text" name="last_name" required>
                                <span class="focus-input100" data-placeholder="Фамилия *"></span>
                            </div>
                            <div class="wrap-input100 validate-input m-t-50 m-b-35" data-validate="Введите телефон">
                                <input class="input100" data-mask="callback-catalog-phone" type="text" name="phone" required>
                                <span class="focus-input100" data-placeholder="Телефон *"></span>
                            </div>
                            <div class="wrap-input100 m-t-50 m-b-35">
                                <input class="input100" type="email" name="email">
                                <span class="focus-input100" data-placeholder="E-mail"></span>
                            </div>
                            <div class="wrap-input100 validate-input m-b-50" data-validate="Введите пароль">
                                <input class="input100" type="password" name="password">
                                <span class="focus-input100" data-placeholder="Пароль *"></span>
                            </div>
                            <div class="m-b-50  reg-upload-photo">
                                <a href="#" class="add-photo">Загрузить фото</a>
                                <input type="file" id="c_input_24" name="file" multiple="false" style="display: none">
                                <input type="hidden"  name="photo_origin" multiple="false" value="" style="display: none">
                                <input type="hidden"  name="photo_profile" multiple="false" value="" style="display: none">
                            </div>
                            <div class="perscab-photoedit-img mb-2 reg-upload-photo">
                                <img src="#" alt="">
                            </div>
                            <div class="container-login100-form-btn">
                                <button class="login100-form-btn" type="submit">Зарегистрироваться</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="art-modal" style="display: none">
                <div class="profile-modal-photo box-modal w-75">
                    <div class="box_modal_close arcticmodal-close"></div>
                    <div>
                        <img class="profile_photo_i" src="#" alt="">
                    </div>
                    <div class="modal-footer center-wrap">
                        <button class="reg-btn reg-btn_empty reg-btn_empty-wth reg-btn_blk-hover btn btn-outline-dark js-main-image-registration">Сохранить</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>