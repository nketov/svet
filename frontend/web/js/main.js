function topCatalogResize() {
    "use strict";
    var height = $('.top-catalog div:last').offset().top - 375;
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

    var image = document.getElementById('image');
    image.addEventListener('mousemove', function(e){
        var x = e.offsetX==undefined?e.layerX:e.offsetX;
        var y = e.offsetY==undefined?e.layerY:e.offsetY;
        var parent = this.parentNode;
        var parentPosInfo = parent.getBoundingClientRect();

        var alphaWidth = 0.34*parentPosInfo.width;
        var alphaHeight = 0.34*parentPosInfo.height;

        var posCalibrateX = 0;
        var posCalibrateY = 0;

        if(x > parentPosInfo.width/2){
            var deltaX = x - parentPosInfo.width/2;
            posCalibrateX =  alphaWidth * (deltaX / (parentPosInfo.width / 2));
        }else if(x < parentPosInfo.width/2){
            var deltaX = x - parentPosInfo.width/2;
            posCalibrateX =  alphaWidth * (deltaX / (parentPosInfo.width / 2));
        }else{
            posCalibrateX = 0;
        }

        if(x > parentPosInfo.width/2){
            var deltaX = x - parentPosInfo.width/2;
            posCalibrateX =  -1*alphaWidth * (deltaX / (parentPosInfo.width / 2));
        }else if(x < parentPosInfo.width/2){
            var deltaX = x - parentPosInfo.width/2;
            posCalibrateX =  -1*alphaWidth * (deltaX / (parentPosInfo.width / 2));
        }else{
            posCalibrateX = 0;
        }

        if(y > parentPosInfo.height/2){
            var deltaY = y - parentPosInfo.height/2;
            posCalibrateY =  -1*alphaHeight * (deltaY / (parentPosInfo.height / 2));
        }else if(y < parentPosInfo.height/2){
            var deltaY = y - parentPosInfo.height/2;
            posCalibrateY =  -1*alphaHeight * (deltaY / (parentPosInfo.height / 2));
        }else{
            posCalibrateY = 0;
        }

        this.style.transform = 'scale(3) translateX('+posCalibrateX+'px) translateY('+posCalibrateY+'px)';
    });

    image.addEventListener('mouseout', function(){
        this.style.transform = 'none';
    });



    $(window).resize(function () {
        topCatalogResize();
    });

});