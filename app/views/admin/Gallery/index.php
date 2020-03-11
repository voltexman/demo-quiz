<section class="content-header">
    <h1>Галерея изображений</h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN?>"><i class="fa fa-dashboard"></i>Главная</a></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="gallery-wrap" id="gallery-wrap">
                        <form action="<?=ADMIN?>/gallery/upload" id="dropzoneForm">
                            <div class="form-group">
                                <div class="upload" id="upload">

                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="row gallery-container" data-delete_url="<?=ADMIN?>/gallery/delete">
                        <?php if (!empty($gallery)): ?>

                            <?php foreach ($gallery as $item): ?>
                                <div class="col-md-2 gallery-item">
                                    <a href="<?= PATH ?>/upload/<?= $item->image ?>" target="_blank">
                                        <img src="<?= PATH ?>/upload/<?= $item->image ?>" class="img-responsive" alt="image"/>
                                    </a>
                                    <button type="button" class="btn btn-link remove_image" data-name="<?= $item->image ?>" data-id="<?= $item->id ?>">Удалить</button>
                                </div>
                            <?php endforeach; ?>

                        <?php endif; ?>

                    </div>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>