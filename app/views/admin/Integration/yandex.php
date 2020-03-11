<?php $num = 1; ?>

<section class="content">
    <div class="row">
        <div class="col-xs-6">
            <div class="box">

                <div class="box-header">
                    <h3 class="box-title">Данные Yandex метрики</h3>
                </div>

                <div class="box-body table-responsive">
                    <form method="post" id="form" action="<?= ADMIN ?>/integration/yandex"
                          data-toggle="validator" role="form" autocomplete="off">

                        <div class="form-group has-feedback">
                            <label for="tag-id">Идентификатор</label>
                            <input type="text" name="tag_id" class="form-control" id="tag-id"
                                   placeholder="Yandex идентификатор" value="<?= $yandex->tag_id ?>">
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
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
