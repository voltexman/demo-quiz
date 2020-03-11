<section class="content-header">
    <h1>Внещний вид</h1>
    <ol class="breadcrumb">
        <li><a href="<?= ADMIN ?>"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li><a href="<?= ADMIN ?>/colors"><i class="fa fa-folder"></i>Внешний вид</a></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <form action="<?= ADMIN ?>/colors" method="post">
                        <div class="form-group">
                            <label for="colors" style="width: 100%">Выбор цветовой схемы</label>
                            <input type="hidden" name="theme_color" id="colors" class="form-control" value="<?php if (!$theme->theme_color) {echo "default";} else {echo $theme->theme_color;} ?>">
                        </div>
                        <button type="submit" class="btn btn-success">Сохранить тему</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="plugins/color-picker/palette-color-picker.js"></script>
<script>
    // Basic usage, array of color values
    $(document).ready(function () {
        $('[name="theme_color"]').paletteColorPicker({
            colors: [
                {"green": "#51B905"},
                {"violet": "#d34085"},
                {"red": "#f83a4b"},
                {"orange": "#FF7544"},
                {"brown": "#CFA16A"},
                {"light-blue": "#3DC8F5"},
                {"yellow": "#EFCE36"},
                {"dark-blue": "#6161af"},
                {"default": "#185cfb"}
            ]
        });
    });
</script>