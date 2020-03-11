<?php

/**
 * @var $main MainPage
 * @var $logo Logo
 * @var $bonuses Bonus
 * @var $contacts Contact
 * @var $questions Question
 * @var $answers Answer
 * @var $form Form
 * @var $phones Contact
 */

use app\models\admin\MainPage;
use app\models\admin\Logo;
use app\models\admin\Bonus;
use app\models\admin\Contact;
use app\models\admin\Question;
use app\models\admin\Answer;
use app\models\admin\Form;

$phone  = new Contact();

$pictureNum = 0;
$answerNum = 0;
$questionNum = 0;

?>

<div class="wrapper">
    <section class="home" style="background-image: url('/upload/main/<?= $main->image ?>');">
        <div class="home__inner container">
            <div class="home__top">
                <div class="logo logo--home">
                    <?php if ($logo->image) : ?>
                        <picture>
                            <img src="/upload/main/<?= $logo->image ?>" width="71" height="81" alt="Логотип Сайта" class="logo__img">
                        </picture>
                    <?php endif; ?>
                    <p class="logo__description">
                        <?= $logo->logo_text ?>
                    </p>
                </div>
                <div class="contacts <?= (empty($contacts->phone)) ? 'contacts—hidden' : '' ?>">
                    <p class="contacts__text">
                        Телефоны для консультации:
                    </p>
                    <ul class="contacts__list">
                        <?php if ($contacts->phone) : ?>
                            <li>
                                <a href="tel:<?= $phone->phoneToTel($contacts->phone) ?>" class="contacts__link">
                                    <svg width="18" height="18">
                                    <use xlink:href="#icon-contacts-list"></use>
                                    </svg>
                                    <?= $contacts->phone ?>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty($phones)) : ?>
                            <?php foreach ($phones as $i => $phoneItem): ?>
                                <li>
                                    <a href="tel:<?= $phone->phoneToTel($phoneItem) ?>" class="contacts__link">
                                        <svg width="18" height="18">
                                            <use xlink:href="#icon-contacts-list"></use>
                                        </svg>
                                        <?= $phoneItem ?>
                                    </a>
                                </li>
                                <?php if ($i === 1) break; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="home__info-block">
                    <h1 class="h1 h1--home">
                        <?= $main->right_title ?>
                    </h1>
                    <p class="home__text">
                        <?= $main->sub_title ?>
                    </p>
                </div>
                <div class="home__action">
                    <a href="#" class="button button--glare button-calculate">
                        <svg width="21" height="21">
                            <use xlink:href="#icon-checked-button"></use>
                        </svg>
                        <?= $main->button_name ?>
                    </a>
                    <?php if ($bonuses) : ?>
                        <div class="bonus-modal">
                            <a href="#" class="button button--present" aria-label="Подарки">
                                <svg width="34" height="32">
                                    <use xlink:href="#icon-present"></use>
                                </svg>
                            </a>
                            <div class="bonus-modal__info-block">
                                <ul class="present">
                                    <?php foreach ($bonuses as $bonus) : ?>
                                        <li class="present__item">
                                            <div class="present__banner" style="background-image: url('/public/upload/bonus/<?= $bonus['image'] ?>')">
                                                <p class="present__text">
                                                    <?= $bonus['text'] ?>
                                                </p>
                                                <div class="present-status">
                                                    <svg width="17" height="14">
                                                        <use xlink:href="#icon-lock"></use>
                                                    </svg>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <ul class="advantage">
                    <?php if ($main->line_one) : ?>
                        <li class="advantage__item">
                            <?= $main->line_one ?>
                        </li>
                    <?php endif; ?>
                    <?php if ($main->line_two) : ?>
                        <li class="advantage__item">
                            <?= $main->line_two ?>
                        </li>
                    <?php endif; ?>
                    <?php if ($main->line_three) : ?>
                        <li class="advantage__item">
                            <?= $main->line_three ?>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="home__bottom">
                <div class="social social--row">
                    <?php if ($contacts->viber || $contacts->telegram || $contacts->whatsapp) : ?>
                        <p class="social__text">
                            Задайте вопрос напрямую в:
                        </p>
                    <?php endif; ?>
                    <ul class="social__list">
                        <?php if ($contacts->viber || $contacts->telegram || $contacts->whatsapp) : ?>
                            <?php if ($contacts->viber) : ?>
                                <li class="social__item">
                                    <a href="<?= $contacts->viber ?>" class="social__link social__link--viber" aria-label="Viber">
                                        <svg width="27" height="27">
                                            <use xlink:href="#icon-viber"></use>
                                        </svg>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if ($contacts->telegram) : ?>
                                <li class="social__item">
                                    <a href="<?= $contacts->telegram ?>" class="social__link social__link--telegram" aria-label="Telegram">
                                        <svg width="29" height="26">
                                            <use xlink:href="#icon-telegram"></use>
                                        </svg>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if ($contacts->whatsapp) : ?>
                                <li class="social__item">
                                    <a href="<?= $contacts->whatsapp ?>" class="social__link social__link--whatsapp" aria-label="WhatsApp">
                                        <svg width="27" height="27">
                                            <use xlink:href="#icon-whatsapp"></use>
                                        </svg>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                        <li class="social__item social__item--phone <?= empty($contacts->phone) ? 'social__item--phone-hidden' : '' ?>">
                            <a href="#" class="social__link" aria-label="Phone">
                                <svg width="27" height="27">
                                    <use xlink:href="#icon-phone"></use>
                                </svg>
                            </a>
                            <div class="social__sub">
                                <p class="social__consultation">
                                Телефоны для консультации:
                                </p>
                                <ul class="social__sub-list">
                                    <?php if (!empty($contacts->phone)): ?>
                                        <li>
                                            <a href="tel:<?= $contacts->phone ?>">
                                                <?= $contacts->phone ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($phones)) : ?>
                                        <?php foreach ($phones as $i => $phoneItem): ?>
                                            <li>
                                                <a href="tel:<?= $phoneItem ?>">
                                                    <?= $phoneItem ?>
                                                </a>
                                            </li>
                                            <?php if ($i === 1) break; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="quiz">
        <div class="quiz__inner">
            <button type="button" class="quiz__close" aria-label="Закрыть окно"></button>
            <div class="quiz__left">
                <div class="quiz__top">
                    <h2 class="visually-hidden">
                        Викторина
                    </h2>
                    <p class="quiz__promo">
                        <svg width="25" height="22">
                            <use xlink:href="#icon-todo-list"></use>
                        </svg>
                        <?= $main['right_title'] ?>
                    </p>
                    <div class="progress-bar progress-bar--in-content">
                        <p class="progress-bar__text">
                            <span class="progress-bar__complete">Готово:</span>
                            <span class="progress-bar__count">0</span>
                        </p>
                        <p class="progress-bar__last-step">
                            Последний шаг!
                        </p>
                        <div class="progress-bar__line">
                            <div class="progress-bar__indicator"></div>
                        </div>
                    </div>
                    <div class="quiz__change-content">
                        <p class="quiz__headline">
                            Какой Вам нужен сайт?
                        </p>
                        <div class="manager manager--online">
                            <div class="manager__inner">
                                <?php if ($contacts->manager_name) : ?>
                                    <div class="manager__img">
                                        <picture>
                                            <source media="(min-width: 768px)" srcset="upload/manager/<?= $contacts->image ?>">
                                            <img src="upload/manager/<?= $contacts->image ?>" width="44" height="44" alt="Сергей">
                                        </picture>
                                    </div>
                                <?php endif; ?>
                                <div class="manager__decor"></div>
                                <div class="manager__content">
                                    <?php if ($contacts->manager_name) : ?>
                                        <div class="manager__info">
                                            <p class="manager__name">
                                                <?= $contacts->manager_name ?>
                                            </p>
                                            <?php if ($contacts->manager_position) : ?>
                                                <p class="manager__position">
                                                    <?= $contacts->manager_position ?>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="manager__text">
                                        <p>
                                            Этот этап очень важен, нужно понять какие у Вас цели продать или рассказать о себе.
                                            Этот этап очень важен, нужно понять какие у Вас цели продать или рассказать о себе.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="manager__toggle" aria-label="Открыть комментарий">
                                <svg width="15" height="8">
                                    <use xlink:href="#icon-manager-arrow"></use>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <form method="post" class="quiz__main-form" action="<?= PATH . '/main/response-result' ?>" autocomplete="off">

                    <div class="slider-main">

                        <?php foreach ($questions as $question) : ?>
                            <div class="slider-main__item <?= $question['required'] ? 'slider-main__item--required' : '' ?>" data-title="<?= $question['question'] ?>" data-comment="<?= $question['comment'] ?>">
                                <?php if ($question['type'] == 'image') : ?>
                                    <div class="picture-quiz form-main-group picture-quiz--<?= $question['multi'] ? 'checkbox' : 'radio' ?>">
                                        <?php foreach ($answers[$question['id']] as $answer) : ?>
                                            <div class="picture-quiz__item">
                                                <div class="input-wrap input-wrap--picture">
                                                    <input type="<?= $question['multi'] ? 'checkbox' : 'radio' ?>" name="answer-<?= $question['id'] ?>[]" class="visually-hidden input-wrap__<?= $question['multi'] ? 'checkbox' : 'radio' ?>" value="<?= $answer['text'] ?>" id="picture-<?= $pictureNum ?>">
                                                    <label for="picture-<?= $pictureNum ?>" class="input-wrap__content input-wrap__content--<?= $question['multi'] ? 'checkbox' : 'radio' ?>">
                                                    <span class="picture-quiz__photo">
                                                        <img src="/public/upload/answers/images/<?= $answer['file'] ?>" width="225" height="220" alt="Информационный">
                                                    </span>
                                                        <span><?= $answer['text'] ?></span>
                                                    </label>
                                                </div>
                                            </div>
                                        <?php $pictureNum++; endforeach; ?>

                                        <?php if ($question['other']) : ?>
                                            <li class="options__item">
                                                <div class="input-wrap input-wrap--text-field">
                                                    <input type="<?= $question['multi'] ? 'checkbox' : 'radio' ?>" name="answer-<?= $question['id'] ?>[]" class="visually-hidden input-wrap__input input-wrap__<?= $question['multi'] ? 'checkbox' : 'radio' ?>" id="selling-<?= $question['id'] . $questionNum ?>" disabled="">
                                                    <label for="selling-<?= $question['id'] . $questionNum ?>" class="input-wrap__content input-wrap__content--<?= $question['multi'] ? 'checkbox' : 'radio' ?>">
                                                        <span class="visually-hidden">Продающий</span>
                                                    </label>
                                                    <input type="text" name="answer-<?= $question['id'] ?>[]" id="selling-text-<?= $question['id'] . $questionNum ?>" class="input-wrap__content input-wrap__content--text-field" placeholder="Другое...">
                                                    <label for="selling-text-<?= $question['id'] . $questionNum ?>" class="visually-hidden">Другое</label>
                                                </div>
                                            </li>
                                        <?php endif; ?>
                                    </div>
                                    <button type="button" class="picture-quiz__arrow picture-quiz__arrow--prev" aria-label="Назад">
                                        <svg width="18" height="11">
                                        <use xlink:href="#icon-arrow-prev"></use>
                                        </svg>
                                    </button>
                                    <button type="button" class="picture-quiz__arrow picture-quiz__arrow--next" aria-label="Вперед">
                                        <svg width="18" height="11">
                                        <use xlink:href="#icon-arrow-next"></use>
                                        </svg>
                                    </button>

                                <?php elseif ($question['type'] == 'text') : ?>

                                    <ul class="options form-main-group">
                                        <?php foreach ($answers[$question['id']] as $answer) : ?>
                                            <li class="options__item">
                                                <div class="input-wrap">
                                                    <input type="<?= $question['multi'] ? 'checkbox' : 'radio' ?>" name="answer-<?= $question['id'] ?>[]" value="<?= $answer['text'] ?>" class="visually-hidden input-wrap__<?= $question['multi'] ? 'checkbox' : 'radio' ?>" id="answer-<?= $question['id'] . $answerNum ?>">
                                                    <label for="answer-<?= $question['id'] . $answerNum ?>" class="input-wrap__content input-wrap__content--<?= $question['multi'] ? 'checkbox' : 'radio' ?>">
                                                        <?= $answer['text'] ?>
                                                    </label>
                                                </div>
                                            </li>
                                        <?php $answerNum++; endforeach; ?>

                                        <?php if ($question['other']) : ?>
                                            <li class="options__item">
                                                <div class="input-wrap input-wrap--text-field">
                                                    <input type="<?= $question['multi'] ? 'checkbox' : 'radio' ?>" name="answer-<?= $question['id'] ?>[]" class="visually-hidden input-wrap__input input-wrap__<?= $question['multi'] ? 'checkbox' : 'radio' ?>" id="selling-<?= $question['id'] . $questionNum ?>" disabled="">
                                                    <label for="selling-<?= $question['id'] . $questionNum ?>" class="input-wrap__content input-wrap__content--<?= $question['multi'] ? 'checkbox' : 'radio' ?>">
                                                        <span class="visually-hidden">Продающий</span>
                                                    </label>
                                                    <input type="text" name="answer-<?= $question['id'] ?>[]" id="selling-text-<?= $question['id'] . $questionNum ?>" class="input-wrap__content input-wrap__content--text-field" placeholder="Другое...">
                                                    <label for="selling-text-<?= $question['id'] . $questionNum ?>" class="visually-hidden">Другое</label>
                                                </div>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                <?php endif; ?>
                                <input type="hidden" name="question[]" value="<?= $question['question'] ?>">
                                <input type="hidden" name="id[]" value="<?= $question['id'] ?>">
                            </div>
                        <?php $questionNum++; endforeach; ?>

                    </div>
                    <div class="calculate-send calculate-send--social-method calculate-send--hide">
                        <?php if ($bonuses) : ?>
                            <div class="calculate-send__left">
                                <p class="calculate-send__bonus">
                                    Ваши бонусы
                                    <svg width="20" height="19">
                                        <use xlink:href="#icon-present-small"></use>
                                    </svg>
                                </p>
                                <ul class="present">
                                    <?php foreach ($bonuses as $bonus) : ?>
                                        <li class="present__item">
                                            <div class="present__banner" style="background-image: url('/public/upload/bonus/<?= $bonus['image'] ?>')">
                                                <p class="present__text">
                                                    <?= $bonus['text'] ?>
                                                </p>
                                                <div class="present-status">
                                                    <svg width="17" height="14">
                                                        <use xlink:href="#icon-un-lock"></use>
                                                    </svg>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <div class="calculate-send__description-wrap">
                            <p class="calculate-send__description">
                                <?= $form['text'] ?>
                            </p>
                        </div>
                        <div class="get-results get-results--<?= $form['form_type'] ?>">

                            <?php if ($form['form_type'] == 'standard') : ?>
                                <input type="hidden" name="form-type" value="standard">

                                <div class="get-results__wrap get-results__wrap--mail">
                                    <p class="get-results__text">
                                        <?= $form['title'] ?>
                                    </p>
                                    <ul class="get-results__list">
                                        <?php if ($form['standard_name']) : ?>
                                            <li class="get-results__item">
                                                <input type="text" name="get-results-name" class="get-results__input" placeholder="Имя<?= $form['standard_name_required'] ? '*' : '' ?>" minlength="2" id="get-results-name" autocomplete="off" <?= $form['standard_name_required'] ? 'required' : '' ?>>
                                                <label for="get-results-name" class="get-results__label">
                                                    <span class="visually-hidden">Имя</span>
                                                    <svg width="15" height="15">
                                                        <use xlink:href="#icon-get-results-user"></use>
                                                    </svg>
                                                </label>
                                            </li>
                                        <?php endif; ?>
                                        <?php if ($form['standard_email']) : ?>
                                            <li class="get-results__item">
                                                <input type="email" name="get-results-mail" class="get-results__input" placeholder="Email<?= $form['standard_email_required'] ? '*' : '' ?>" id="get-results-mail" autocomplete="off" <?= $form['standard_email_required'] ? 'required' : '' ?>>
                                                <label for="get-results-mail" class="get-results__label">
                                                    <span class="visually-hidden">Email</span>
                                                    <svg width="15" height="10">
                                                        <use xlink:href="#icon-get-results-mail"></use>
                                                    </svg>
                                                </label>
                                            </li>
                                        <?php endif; ?>
                                        <?php if ($form['standard_phone']) : ?>
                                            <li class="get-results__item">
                                                <input type="tel" name="get-results-phone" class="get-results__input" placeholder="Телефон<?= $form['standard_phone_required'] ? '*' : '' ?>" pattern="[0-9]{10}" id="get-results-phone" autocomplete="off" <?= $form['standard_phone_required'] ? 'required' : '' ?>>
                                                <label for="get-results-phone" class="get-results__label">
                                                    <span class="visually-hidden">Телефон</span>
                                                    <svg width="15" height="15">
                                                        <use xlink:href="#icon-get-results-phone"></use>
                                                    </svg>
                                                </label>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <?php if ($form['form_type'] == 'social') : ?>
                                <input type="hidden" name="form-type" value="social">

                                <div class="get-results__wrap get-results__wrap--social">
                                    <p class="get-results__text">
                                        <?= $form['title'] ?>
                                    </p>
                                    <ul class="social-option">
                                        <?php if ($form->by_phone) : ?>
                                            <li class="social-option__item">
                                                <input type="radio" name="social-option" value="phone" class="visually-hidden social-option__radio" id="social-option--phone">
                                                <label for="social-option--phone" class="social-option__label">
                                                    <svg width="21" height="21">
                                                        <use xlink:href="#icon-option-phone"></use>
                                                    </svg>
                                                    По телефону
                                                </label>
                                            </li>
                                        <?php endif; ?>
                                        <?php if ($form->viber) : ?>
                                            <li class="social-option__item">
                                                <input type="radio" name="social-option" value="viber" class="visually-hidden social-option__radio" id="social-option--viber">
                                                <label for="social-option--viber" class="social-option__label">
                                                    <svg width="21" height="21">
                                                        <use xlink:href="#icon-option-viber"></use>
                                                    </svg>
                                                    Viber
                                                </label>
                                            </li>
                                        <?php endif; ?>
                                        <?php if ($form->telegram) : ?>
                                            <li class="social-option__item">
                                                <input type="radio" name="social-option" value="telegram" class="visually-hidden social-option__radio" id="social-option--telegram">
                                                <label for="social-option--telegram" class="social-option__label">
                                                    <svg width="21" height="21">
                                                        <use xlink:href="#icon-option-telegram"></use>
                                                    </svg>
                                                    Telegram
                                                </label>
                                            </li>
                                        <?php endif; ?>
                                        <?php if ($form->whatsapp) : ?>
                                            <li class="social-option__item">
                                                <input type="radio" name="social-option" value="whatsapp" class="visually-hidden social-option__radio" id="social-option--whatsapp">
                                                <label for="social-option--whatsapp" class="social-option__label">
                                                    <svg width="21" height="21">
                                                        <use xlink:href="#icon-option-whatsapp"></use>
                                                    </svg>
                                                    WhatsApp
                                                </label>
                                            </li>
                                        <?php endif; ?>
                                        <?php if ($form->instagram) : ?>
                                            <li class="social-option__item">
                                                <input type="radio" name="social-option" value="instagram" class="visually-hidden social-option__radio" id="social-option--instagram">
                                                <label for="social-option--instagram" class="social-option__label">
                                                    <svg width="21" height="21">
                                                        <use xlink:href="#icon-option-instagram"></use>
                                                    </svg>
                                                    Instagram
                                                </label>
                                            </li>
                                        <?php endif; ?>
                                        <?php if ($form->facebook) : ?>
                                            <li class="social-option__item">
                                                <input type="radio" name="social-option" value="facebook" class="visually-hidden social-option__radio" id="social-option--facebook">
                                                <label for="social-option--facebook" class="social-option__label">
                                                    <svg width="21" height="21">
                                                        <use xlink:href="#icon-option-facebook"></use>
                                                    </svg>
                                                    Facebook
                                                </label>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                    <div class="user-date">
                                        <div class="user-date__icon">
                                            <svg width="40" height="40">
                                                <use xlink:href="#icon-option-phone"></use>
                                            </svg>
                                        </div>
                                        <div class="user-date__info-block user-date__info-block--number user-date__info-block--hide">
                                            <label for="user-date-phone-number" class="visually-hidden">
                                                Введите ваш номер
                                            </label>
                                            <input type="tel" name="user-date-phone" class="user-date__phone-input" id="user-date-phone-number" placeholder="Номер телефона">
                                        </div>
                                        <div class="user-date__info-block user-date__info-block--nickname user-date__info-block--hide">
                                            <label for="user-date-nickname" class="visually-hidden">
                                                Введите ваш логин
                                            </label>
                                            <input type="text" name="user-date-name" class="user-date__nick-input" id="user-date-nickname" placeholder="Логин">
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="get-results__privacy-policy">
                                <input type="checkbox" id="privacy-policy-standard" class="visually-hidden" checked="">
                                <label for="privacy-policy-standard">
                                    C <a href="#" class="get-results__link">политикой конфиденциальности</a> ознакомлен
                                </label>
                            </div>
                            <button type="submit" class="button button--submit button--glare">
                                <svg width="21" height="21">
                                    <use xlink:href="#icon-checked-button"></use>
                                </svg>
                                Узнать стоимость
                            </button>
                            <p class="get-results__another--another-messenger">
                                <a href="#">
                                    Выбрать другой мессенджер
                                </a>
                            </p>
                        </div>
                    </div>

                </form>

                <div class="thank-you thank-you--hidden">
                    <div class="thank-you__left">
                        <div class="thank-you--info-block">
                            <p class="thank-you__text">
                                <svg width="80" height="80">
                                    <use xlink:href="#icon-thank-you"></use>
                                </svg>
                                <?= $form['thanks_text'] ?>
                            </p>
                            <?php if ($bonuses) : ?>
                                <p class="thank-you__bonus">
                                    Ваши бонусы
                                    <svg width="20" height="19">
                                        <use xlink:href="#icon-present-small"></use>
                                    </svg>
                                </p>
                            <?php endif; ?>
                            <?php if ($bonuses) : ?>
                                <ul class="present present--thank-you">
                                    <?php foreach ($bonuses as $bonus) : ?>
                                        <li class="present__item">
                                            <div class="present__banner" style="background-image: url('/public/upload/bonus/<?= $bonus['image'] ?>')">
                                                <p class="present__text">
                                                    <?= $bonus['text'] ?>
                                                </p>
                                                <div class="present-status">
                                                    <svg width="17" height="14">
                                                        <use xlink:href="#icon-un-lock"></use>
                                                    </svg>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="thank-you__right">
                        <div class="thank-you__video-block">
                            <iframe width="354" height="231" class="thank-you__video <?= !$form->thanks_video ? 'thank-you__video--hidden' : ''?> " src="https://www.youtube.com/embed/<?= $form['thanks_video'] ?>" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <svg width="50" height="50" class="thank-you__play" tabindex="0">
                                <use xlink:href="#icon-play-video"></use>
                            </svg>
                            <div class="thank-you__portfolio">
                                <?php if ($form['thanks_button']) : ?>
                                    <a href="<?= $form['thanks_link'] ?>" class="button button--glare button--portfolio">
                                        <?= $form['thanks_button'] ?>
                                        <svg width="14" height="17">
                                            <use xlink:href="#icon-arrow-for-portfolio"></use>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                                <p>
                                    <?= $form['thanks_title'] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="quiz__right">
                <?php if ($bonuses) : ?>
                    <ul class="present">
                        <?php foreach ($bonuses as $bonus) : ?>
                            <li class="present__item">
                                <div class="present__banner" style="background-image: url('/public/upload/bonus/<?= $bonus['image'] ?>')">
                                    <p class="present__text">
                                        <?= $bonus['text'] ?>
                                    </p>
                                    <div class="present-status">
                                        <svg width="12" height="16">
                                            <use xlink:href="#icon-lock"></use>
                                        </svg>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
            <div class="navigation">
                <div class="navigation__buttons">
                    <button type="button" class="navigation__button navigation__button--prev button">
                        <svg width="18" height="11">
                            <use xlink:href="#icon-arrow-prev"></use>
                        </svg>
                        <span>Назад</span>
                    </button>
                    <button type="button" class="navigation__button navigation__button--next button">
                        <svg width="17" height="15">
                            <use xlink:href="#icon-checked-button"></use>
                        </svg>
                        <span>Далее</span>
                    </button>
                </div>
            </div>
            <div class="load">
                <div class="load__wrapper">
                <div class="load__line"></div>
                <div class="load__line"></div>
                <div class="load__line"></div>
                </div>
            </div>
        </div>
    </section>
</div>
