function topCatalogResize() {
    "use strict";
    var height = $('.top-catalog div:last').offset().top - 350;
    $('.top-catalog').css('height', height);
}

$(document).ready(function () {

    "use strict";
    topCatalogResize();

    $('.hamburger').mouseover(function () {
        $('.top-catalog').css('opacity', '0.99');
        $('.top-catalog').css('z-index', '99');
    });
    $('.main-content,.header-img').mouseover(function () {
        $('.top-catalog').css('opacity', '0');
        $('.top-catalog').css('z-index', '-1');
    });

    $('input#price').on('change',function () {
        var prices = ($(this).val()).split(',');
        $('.bage-min').text(prices[0] +' грн');
        $('.bage-max').text(prices[1] +' грн');
    });




    $(window).resize(function () {
        topCatalogResize();
    });

});