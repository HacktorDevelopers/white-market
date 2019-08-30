$(document).ready(function(){
    $("#header").css('box-shadow', '2px 1px 6px black');
    // $.notify("Hello World");
    $('#goup').click(function(){
        $(document).scrollTop(0);
    });
    $(document).scroll(function(){
        var height = $(document).scrollTop();
        // console.log(height);
        if(height > 100){
            $("#header").addClass('navbar-fixed-top animated slideInDown faster');
            $('#goup').show().addClass('animated slideInDown');
            $('.info_links').hide();
        }else{
            $("#header").addClass('fadeInDown faster');
            $("#header").removeClass('navbar-fixed-top slideInDown');
            $('#goup').hide().addClass('fadeOut');
            $('.info_links').show();
        }
    })

    // alert("I am ready to work");

    $('.ajax').click(function(e){e.preventDefault();})
    $('.option-menu').addClass('card  bg-success');

    $('#total_cart_content').text();

    $('.more').click(function(){
        // alert();
        //opm = Option Menu Page
        $('.option-menu').hide();
        var opm = $(this).attr('option_menu');
        $('#'+opm).show();
    });

    $("input").addClass("input-sm");

});


function toast(options){
    var toastElem = $('#toast');
    var toastHeader = $('#toast-header');
    var toastBody = $('#toast-body');

    toastElem.addClass(options.c);
    toastBody.html(options.b);
    toastHeader.html(options.h);

    toastElem.show();

    if(options.t == 0){
        return toastElem;
    }else{
        setTimeout(()=>{
            toastElem.hide();
        }, options.t)
    }
}

