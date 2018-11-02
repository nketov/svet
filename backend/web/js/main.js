function markDeactivated(product) {
    "use strict";
    var row_tr = $('tr[data-key="' + product + '"]');
    var active = row_tr.find('select[name="active"]').val();
    var row_tds = row_tr.find('td:not(.td-active)');
    if (active == 1) {
        row_tds.css('opacity', 1);
        row_tds.css('color', '#222');
    } else {
        row_tds.css('opacity', 0.25);
        row_tds.css('color', '#722');
    }
    return active;
}

function checkDeactivated() {
    "use strict";
    $('#products-table tbody tr').each(function () {
        markDeactivated($(this).data('key'));
    });
}


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
            },
            error: function (xhr) {
                $('.uploader-panel').html(xhr.responseText).css({
                    "width": "100%",
                    "text-align": "left",
                    "top": "-25px"
                });
                $(".content-header h1").html('Отчёт о загрузке');
                $('#upload-overlay').html('');
                $('#upload-overlay').css({"animation-name": "hide"});
            }
        });
        return false;
    });

    $('body').on('change', '#products-table select[name="active"]',
        function () {
            var product = $(this).closest('tr').data('key');
            var active = markDeactivated(product);
            $.ajax({
                method: "POST",
                url: '/admin/products/active',
                data: {active: active, product: product}
            })
                .done(function (data) {
                    console.log('Status Changed');
                });
        }
    );

    $('body').on('click', '#products-table tbody tr td:not(.td-active)',
        function () {
            var product = $(this).closest('tr').data('key');
            location.href = '/admin/products/update?id=' + product;
        }
    );

    checkDeactivated();

    $('body').on(
        'click',
        '#images-form .image_icon, .btn-add-image',
        function () {
            var product = $(this).data('product');
            var key = $(this).data('key');

            location.href = '/admin/products/image-upload?product=' + product + '&key=' + key;
        }
    );

    // $('#image-preview').css('background-image', 'url("/images/lamps/lamp007.jpg")')
});


$(document).on('ready pjax:end', function (event) {
    "use strict"
    checkDeactivated();
});