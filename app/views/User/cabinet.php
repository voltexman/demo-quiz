<div class="container">
    <div class="row">
        <div class="col-12 text-center py-3">
            <h1 class="programs-title cabinet-welcome">Добро пожаловать в обучающий центр Meri & Meri</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-8 offset-2">
            <form action="<?=PATH;?>/user/cabinet" method="post" autocomplete="off">
                <div class="form-group user-image-wrap">
                    <div class="form-group user-image perscab-photoedit-img-cabinet">
                        <img src="upload/<?=$user->photo_profile;?>" alt="">
                    </div>
                    <a href="" class="text-center add-photo-cabinet">Изменить изображение</a>
                    <input type="file" id="c_input_24_cabinet" name="file" multiple="false" style="display: none">
                    <input type="hidden" name="photo_origin_cabinet" multiple="false" value="" style="display: none">
                    <input type="hidden" name="photo_profile_cabinet" multiple="false" value="" style="display: none">
                </div>
                <div class="form-group row">
                    <label for="first_name" class="col-sm-3 col-form-label">Имя</label>
                    <div class="col-sm-9">
                        <input type="text" name="first_name" class="form-control" id="first_name" value="<?=h($user->first_name);?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="last_name" class="col-sm-3 col-form-label">Фамилия</label>
                    <div class="col-sm-9">
                        <input type="text" name="last_name" class="form-control" id="last_name" value="<?=h($user->last_name);?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-sm-3 col-form-label">Телефон</label>
                    <div class="col-sm-9">
                        <input type="text" name="phone" readonly class="form-control" id="phone" value="<?=h($user->phone);?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="text" name="email" class="form-control" id="email" value="<?=h($user->email);?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label">Пароль</label>
                    <div class="col-sm-9">
                        <input type="password" name="password" class="form-control profile-password" id="password">
                    </div>
                </div>
                <div class="form-group row profile-confirm-password">
                </div>
                <input type="hidden" name="id" value="<?=$user->id?>">
                <div class="form-group row">
                    <div class="col-sm-9 offset-sm-3">
                        <button type="submit" class="btn btn-block programs-show-all course-btn">Редактировать данные</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php if (!empty($courses)): ?>
        <div class="row">
            <div class="col-12">
                <div class="horizontal-line">
                    <div class="row">
                        <div class="col-4">
                            <div class="horizontal-line-left"></div>
                        </div>
                        <div class="col-4">
                            <div class="horizontal-line-text horizontal-line-text-md">Выбранные курсы</div>
                        </div>
                        <div class="col-4">
                            <div class="horizontal-line-right"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Названия</th>
                            <th scope="col">Дата</th>
                            <th scope="col">Цена</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($courses as $key => $course): ?>
                            <tr>
                                <td><?=h($course['name']);?></td>
                                <td><?=dateFormat($course['date_start']);?> - <?=dateFormat($course['date_end']);?></td>
                                <td><?=h($course['price']);?>грн</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>
    <?php if (!empty($nearest_courses)): ?>
        <div class="row">
            <div class="col-12">
                <div class="horizontal-line">
                    <div class="row">
                        <div class="col-4">
                            <div class="horizontal-line-left"></div>
                        </div>
                        <div class="col-4">
                            <div class="horizontal-line-text horizontal-line-text-md">ближайшие курсы</div>
                        </div>
                        <div class="col-4">
                            <div class="horizontal-line-right"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-12 carousel-course">
                <div class="nearest_courses">
                    <?php foreach ($nearest_courses as $nearest_course):?>
                        <div class="nearest">
                            <a href="<?=PATH?>/category/<?=$nearest_course['category_id']?>">
                                <div class="nearest-img">
                                    <img src="upload/<?=h($nearest_course['img']);?>" alt="image">
                                </div>
                            </a>
                            <h4 class="nearest-title"><?=h($nearest_course['name']);?></h4>
                            <small class="d-block"><?=h(dateFormat($nearest_course['date_start']));?></small>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<div class="art-modal" style="display: none">
    <div class="profile-modal-photo-cabinet box-modal w-75">
        <div class="box_modal_close arcticmodal-close"></div>
        <div>
            <img class="profile_photo_i" src="#" alt="">
        </div>
        <div class="modal-footer center-wrap">
            <button class="reg-btn reg-btn_empty reg-btn_empty-wth reg-btn_blk-hover btn btn-outline-dark js-main-image">Сохранить</button>
        </div>
    </div>
</div>