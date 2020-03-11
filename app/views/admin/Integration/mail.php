<?php $num = 1; ?>

<section class="content">
    <div class="row">
        <div class="col-xs-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Данные почты</h3>
                </div>
                <div class="box-body table-responsive">
                    <form method="post" id="form" action="<?= ADMIN ?>/integration/mail"
                          data-toggle="validator" role="form" autocomplete="off">

                        <div class="box box-widget collapsed-box">
                            <div class="box-header with-border">
                                <div class="user-block">
                                    <div class="form-group has-feedback">
                                        <label for="email-to">E-Mail
                                            <small class="text-muted">почта получателя</small>
                                        </label>
                                        <input type="email" name="email_to" class="form-control" id="email-to"
                                               placeholder="Почта получателя"
                                               data-error="Нужно указать почту" data-minlength="3"
                                               required value="<?= $mail->email_to ?>">
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="box-default">
                                    <strong style="cursor:pointer;" data-widget="collapse">Дополнительные настройки SMTP</strong>
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="box-body">

                                <div class="form-group has-feedback">
                                    <label for="email-from">E-Mail
                                        <small class="text-muted">почта отправителя</small>
                                    </label>
                                    <input type="email" name="email_from" class="form-control" id="email-from"
                                           placeholder="Почта"
                                           data-error="Нужно указать почту" data-minlength="3"
                                           required value="<?= $mail->email_from ?>">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="smtp-host">SMTP Хост</label>
                                    <input type="text" name="smtp_host" class="form-control" id="smtp-host"
                                           placeholder="Хост"
                                           data-error="Нужно указать SMTP хост" data-minlength="3"
                                           required value="<?= $mail->smtp_host ?>">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="smtp-port">SMTP Порт</label>
                                    <input type="text" name="smtp_port" class="form-control" id="smtp-port"
                                           placeholder="Порт"
                                           data-error="Нужно указать SMTP порт" data-minlength="3"
                                           required value="<?= $mail->smtp_port ?>">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="smtp-protocol">SMTP Протокол</label>
                                    <input type="text" name="smtp_protocol" class="form-control" id="smtp-protocol"
                                           placeholder="Протокол"
                                           data-error="Нужно указать SMTP протокол" data-minlength="3"
                                           required value="<?= $mail->smtp_protocol ?>">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="smtp-login">SMTP Логин</label>
                                    <input type="text" name="smtp_login" class="form-control" id="smtp-login"
                                           placeholder="SMTP логин"
                                           data-error="Нужно указать SMTP логин" data-minlength="3"
                                           required value="<?= $mail->smtp_login ?>">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="password">SMTP Пароль</label>
                                    <input type="password" name="smtp_password" class="form-control" id="password"
                                           placeholder="SMTP пароль"
                                           data-error="Нужно указать SMTP пароль" data-minlength="3"
                                           required value="<?= $mail->smtp_password ?>">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group input-group">
                            <button type="submit" class="btn btn-block btn-success" id="submit-all">
                                Сохранить
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
