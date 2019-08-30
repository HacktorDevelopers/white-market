$(document).ready(function(){
    var pimages = $('.product_images');
    var product_image_preview = $('#product_image_preview');

    pimages.click(function(){
        var src = $(this).attr('src');
        // $(this).focus();
        product_image_preview.removeClass('fadeIn').addClass('fadeIn').attr('src', src);
    });
});