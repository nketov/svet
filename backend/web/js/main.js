$(document).ready(function () {
    "use strict";

    $.uploadPreview({
        input_field: "#image-upload",   // Default: .image-upload
        preview_box: "#image-preview",  // Default: .image-preview
        label_field: "#image-label",    // Default: .image-label
        label_default: "Выберите фото",   // Default: Choose File
        label_selected: "Измените фото",  // Default: Change File
        no_label: false                 // Default: false
    });


    $('#excel-upload').on('beforeSubmit ', function () {

        $('#upload-overlay').css({"display": "grid", "animation-name": "show"});

        var formData = new FormData($('#excel-upload')[0]);

        $.ajax({
            type: "POST",
            url: '/admin/upload',
            enctype: 'multipart/form-data',
            data: formData,
            processData: false,
            contentType: false,

            success: function (report) {

                $('.uploader-panel').html(report).css({"width": "100%", "text-align": "left", "top": "-25px"});
                $(".content-header h1").html('Отчёт о загрузке');
                $('#upload-overlay').html('');
                $('#upload-overlay').css({"animation-name": "hide"});
            }

        });

        return false;

    });


    // $('#image-preview').css('background-image', 'url("/images/lamps/lamp007.jpg")')
});