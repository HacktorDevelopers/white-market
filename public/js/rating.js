$(document).ready(function(){
    var rating = $("#rating");
    var rater = $('.rater');

    rater.click(function(){
        var rate = $(this).attr('rate');
        // alert(rate);
        
        $.post(url)
    });
});