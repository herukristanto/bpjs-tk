$(document).ready(function(){

  AOS.init();

  $(window).scroll(function(){
    var scroll = $(window).scrollTop();
    if (scroll > 72) {
      $('.navbar').removeClass('shadow-none').addClass("shadow mx-lg-5 mx-2 my-2 rounded");
    } else {
      $('.navbar').removeClass('shadow mx-lg-5 mx-2 my-2 rounded').addClass('shadow-none');
    }
  })

  $('.first-button').on('click', function () {
    $('.animated-icon1').toggleClass('open');
  });

});