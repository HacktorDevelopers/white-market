(function($) {
  "use strict"; // Start of use strict

  // Toggle the side navigation
  $("#sidebarToggle").on('click', function(e) {
    e.preventDefault();
    // alert("hello where are you going")
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
  });

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });

  // Scroll to top button appear
  $(document).on('scroll', function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(event) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    event.preventDefault();
  });



  // alert("I am here from admin js");
  $('.delete_btn').click(function(e){
    e.preventDefault();
    var msg = '';
    if($(this).attr('msg')){
      msg = $(this).attr('msg');
    }else{
      msg = "Do you want to delete?";
    }
    var ask = confirm(msg);
    if(ask){
      $.notify("Action in progress", 'info');
      $.get($(this).attr('href'), (res)=>{
        console.log(res);
        var data = JSON.parse(res);
        if(data.status ==  1){
          $.notify(data.msg, 'success');
          setTimeout(()=>{
            window.location.reload();
          }, 500);
        }else{
          // console.log(data);
          $.notify(data.msg, 'danger');
        }
      });
    }else{
      return false;
    }
  });


  $('.slink').click(function(e){
    e.preventDefault();
    var ask = confirm($(this).attr('msg'));
    if(ask){
      $.notify("Delete action in progress", 'info');
      $.get($(this).attr('href'), (res)=>{
        console.log(res);
        var data = JSON.parse(res);
        if(data.status ==  1){
          $.notify(data.msg, 'success');
          setTimeout(()=>{
            window.location.reload();
          }, 500);
        }else{
          // console.log(data);
          $.notify(data.msg, 'danger');
        }
      });
    }else{
      return false;
    }
  });

  $("input").addClass("input-sm");

})(jQuery); // End of use strict