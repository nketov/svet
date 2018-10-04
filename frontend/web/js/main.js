$(document).ready(function () {

    "use strict";
    $('.logo').hover(function () {
        $('.top-catalog').css('opacity', '0.99');
    });
    $('.main-content').hover(function () {
        $('.top-catalog').css('opacity', '0');
    });
});