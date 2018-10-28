$(document).ready(function() {
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

         $(this).css('display','none');


    });
    // $('#image-preview').css('background-image', 'url("/images/lamps/lamp007.jpg")')

});