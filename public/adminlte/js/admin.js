if ($('div').is('.file-upload-wrap')) {

    let fileName = '';
    let form = $('#form');
    let add_image_url = form.data('add_url');
    let remove_image_url = form.data('remove_url');

    function removeFile() {
        $.ajax({
            type: 'POST',
            url: remove_image_url,
            data: {name: fileName},
            success: function (data) {

            }
        });
        return true;
    }

    $(document).ready(function () {

        var myDropzone = new Dropzone("#upload", {
            url: add_image_url,
            maxFiles: 1,
            autoProcessQueue: true,
            addRemoveLinks: true,
            acceptedFiles: ".png,.jpg,.jpeg",
            maxFilesize: 5, //mb
            dictMaxFilesExceeded: "Достигнут лимит на количество загруженных картинок. Максимальное количество загрузки  {{maxFiles}} шт.",
            dictDefaultMessage: '<div class="dz-message">Нажмите здесь или перетащите сюда файлы для загрузки</div>',
            dictRemoveFile: '<div class="remove-link-dropzone-image" id="remove-image-file" onclick="removeFile();">Удалить фото</div>',
            init: function () {
                $(this.element).html(this.options.dictDefaultMessage);


                // var dzClosure = this; // Makes sure that 'this' is understood inside the functions below.
                //
                // // for Dropzone to process the queue (instead of default form behavior):

                //
                //
                // //send all the form data along with the files:
                // this.on("sending", function(data, xhr, formData) {
                //     formData.append("title", jQuery("#title").val());
                //     formData.append("price_old", jQuery("#price_old").val());
                //     formData.append("price_new", jQuery("#price_new").val());
                //     formData.append("link", jQuery("#link").val());
                //     formData.append("description", jQuery("#editor1").val());
                // });


                this.on("maxfilesexceeded", function () {
                    if (this.files[1] != null) {
                        this.removeFile(this.files[1]);
                    }
                });

            },
            success: function (file, response) {
                response = $.parseJSON(response);
                fileName = response.file;
            },
        });

        // myDropzone.on("addedfile", function(file) {
        //
        //
        // });


        // myDropzone.on("removedfile", function(file) {

        // });
    });

}

$(".edit-form-wrap").on("click", ".remove_image", function () {
    let name = $(this).data('name');
    let id = $(this).data('id');
    let form = $('#form');
    let url = form.data('remove_photo_db_url');

    $.ajax({
        url: url,
        method: "POST",
        data: {
            name: name,
            id: id,
        },
        success: function (data) {
            document.location.reload(true);
        }
    });

});


// alert before delete item
$('.delete').click(function () {
    let res = confirm('Вы действительно хотите это сделать?');
    if (!res) {
        return false;
    }
});


$('.sidebar-menu a').each(function () {
    let currentLocation = window.location.protocol + '//' + window.location.host + window.location.pathname;
    let link = this.href;
    if (link == currentLocation) {
        $(this).parent().addClass(' active'); //parent
        $(this).closest('.treeview').addClass(' active'); //child
    }
});


// CKEDITOR.replace('editor1');
$('#editor1').ckeditor();
$('#editor2').ckeditor();


//datepicker
$('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    inline: true,
    language: 'ru',
    changeYear: true,
    changeMonth: true,
    todayHighlight: true,
    autoclose: true
});
