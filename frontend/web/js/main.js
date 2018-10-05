$(document).ready(function () {

    "use strict";

    var height = $('.top-catalog div:last').offset().top-350;
    $('.top-catalog').css('height', height);

    $('.hamburger').mouseover(function () {
        $('.top-catalog').css('opacity', '0.99');
        $('.top-catalog').css('z-index', '99');
    });
    $('.main-content,.header-img').mouseover(function () {
        $('.top-catalog').css('opacity', '0');
        $('.top-catalog').css('z-index', '-1');
    });



    $(window).resize(function(){
        var height = $('.top-catalog div:last').offset().top-350;
        $('.top-catalog').css('height', height);
    });

});