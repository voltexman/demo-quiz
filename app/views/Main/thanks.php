<?php

if ($contacts->viber && $contacts->telegram) {
    $messengerPostfix = 'мессенджеры';
} else {
    $messengerPostfix = 'мессенджер';
}

?>

<div class="thank-you-page-wrapper">
    <div class="quize-main-item">
        <div class="quize-left-column">
            <div class="quize-logo-phone">
                <a href="<?= PATH ?>" class="logo">
                    <?= $contacts->company_name ?>
                    <!--                    <img src="/img/logo.png" alt="Логотип комапии Iceberg">-->
                </a>
                <div class="mobile-contacts-menu">
                    <span class="mobile-icon-content button">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                             id="Capa_1" x="0px" y="0px" width="348.077px" height="348.077px"
                             viewBox="0 0 348.077 348.077" style="enable-background:new 0 0 348.077 348.077;"
                             xml:space="preserve"><path
                                    d="M340.273,275.083l-53.755-53.761c-10.707-10.664-28.438-10.34-39.518,0.744l-27.082,27.076     c-1.711-0.943-3.482-1.928-5.344-2.973c-17.102-9.476-40.509-22.464-65.14-47.113c-24.704-24.701-37.704-48.144-47.209-65.257     c-1.003-1.813-1.964-3.561-2.913-5.221l18.176-18.149l8.936-8.947c11.097-11.1,11.403-28.826,0.721-39.521L73.39,8.194     C62.708-2.486,44.969-2.162,33.872,8.938l-15.15,15.237l0.414,0.411c-5.08,6.482-9.325,13.958-12.484,22.02     C3.74,54.28,1.927,61.603,1.098,68.941C-6,127.785,20.89,181.564,93.866,254.541c100.875,100.868,182.167,93.248,185.674,92.876     c7.638-0.913,14.958-2.738,22.397-5.627c7.992-3.122,15.463-7.361,21.941-12.43l0.331,0.294l15.348-15.029     C350.631,303.527,350.95,285.795,340.273,275.083z"></path></svg>
                    </span>
                </div>
                <ul class="quize-phone-list list-style-none">
                    <li class="quize-phone-item has-drop">
                        <a href="tel:<?= $contacts->phone ?>" class="has-drop-link">
                            <?= $contacts->phone ?>
                        </a>
                        <ul class="quize-drop-list">
                            <?php foreach ($phones as $phone) : ?>
                                <li>
                                    <a href="tel:<?= $phone ?>">
                                        <?= $phone ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="thank-you-in-page">
                <div class="thank-you-in-page-image">
                    <svg xmlns="http://www.w3.org/2000/svg" width="73" height="65" viewBox="0 0 73 65">
                        <g>
                            <g>
                                <path fill="#185cfb"
                                      d="M5.55 35.235c-.126 0-.252 0-.504.126a6.135 6.135 0 0 1-1.387-.504c.378-.252 1.008-.126 1.891.378zM69.475 1.318c-3.278-1.765-6.934 1.64-9.078 3.657-4.917 4.791-9.078 10.339-13.743 15.382-5.17 5.548-9.96 11.096-15.256 16.517-3.026 3.027-6.305 6.305-8.322 10.087-4.539-4.413-8.448-9.204-13.491-13.113-3.657-2.773-9.709-4.79-9.583 1.892.253 8.7 7.944 18.03 13.618 23.956 2.395 2.521 5.547 5.17 9.204 5.295 4.413.253 8.952-5.043 11.6-7.943 4.665-5.043 8.448-10.717 12.734-15.887 5.548-6.808 11.222-13.49 16.643-20.426 3.405-4.286 14.122-14.878 5.674-19.417z"/>
                            </g>
                        </g>
                    </svg>
                </div>
                <p class="question-headline">
                    <?= $form->thanks_text ?>
                </p>
                <?php if ($form->thanks_button) : ?>
                    <a href="<?= $form->thanks_link ?>" class="standart-blue price-icon">
                        <?= $form->thanks_button ?>
                    </a>
                <?php endif; ?>
                <p class="question-promo">
                    <?php if ($form->thanks_title) : ?>
                        <?= $form->thanks_title ?>
                    <?php endif; ?>
                </p>
            </div>
            <div class="hidden-bonus-block">
                <?php if ($form->thanks_video) : ?>
                    <div class="bonus-video">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $form->thanks_video ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="quize-right-column background-grey">

            <?php if ($contacts->viber || $contacts->telegram) : ?>
            <div class="quize-right-social-wrapper">
                <p class="quize-right-text">
                    Можете написать
                    нам в <?= $messengerPostfix ?>
                </p>
                <p class="quize-right-social">
                    <?php if ($contacts->viber) : ?>
                    <a href="<?= $contacts->viber ?>" class="viber-social social-button"
                       class="viber-social social-button">
                        Viber
                    </a>
                    <?php endif; ?>
                    <?php if ($contacts->telegram) : ?>
                    <a href="<?= $contacts->telegram ?>" class="telegram-social social-button">
                        Telegram
                    </a>
                    <?php endif; ?>
                </p>
            </div>
            <?php endif; ?>

            <div class="quize-maneger-wrpper">
                <div class="quize-maneger-top">

                    <?php if ($contacts->image) : ?>
                    <div class="quize-maneger-avatar">
                        <img src="/upload/manager/<?= $contacts->image ?>" class="manager-picture" alt="Фото менеджера"
                             width="100" height="100">
                        <span class="maneger-status status-online"></span>
                    </div>
                    <?php else : ?>
                    <div class="quize-maneger-avatar">
                        <img src="/img/no-image.png" class="manager-picture" alt="Фото менеджера"
                             width="100" height="100">
                        <span class="maneger-status status-online"></span>
                    </div>
                    <?php endif; ?>

                    <div class="quize-maneger-info">
                        <p class="quize-manager-name">
                            <?= $contacts->manager_name ?>
                        </p>
                        <p class="quize-position">
                            <?= $contacts->manager_position ?>
                        </p>
                    </div>
                </div>

                <?php if ($form->thanks_video) : ?>
                    <div class="bonus-video">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $form->thanks_video ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!--Contacts Navigation-->
<div class="mobile-main-contacts-navigation">
    <button class="btn-close-menu">
        <span class="visually-hidden">
            Закрыть окно
        </span>
    </button>
    <ul class="mobile-social">
        <li>
            <a href="tel:0962965202">
                +38 (096) 296-52-02
            </a>
        </li>
        <li>
            <a href="tel:0634583320">
                +38 (063) 458-33-20
            </a>
        </li>
        <li>
            <a href="tel:0956840176">
                +38 (095) 684-01-76
            </a>
        </li>
    </ul>
    <div class="mobile-messengers">
        <a href="https://viber://pa?chatURI=icebergstudio" class="viber-social social-button">
            Viber
        </a>
        <a href="https://telegram.me/Iceberg_studio_bot" class="telegram-social social-button">
            Telegram
        </a>
    </div>
</div>