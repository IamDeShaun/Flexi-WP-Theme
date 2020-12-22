$(document).ready(function(){

  $(".menu-toggle .fa-times").hide();

$(".menu-toggle .fa-bars").click(function(){
  $(this).hide();
  $(".menu-toggle .fa-times").show();
  $("nav").addClass("active");
});

$('ul li.sub-menu').click(function(){
    $(this).siblings().removeClass('active');
    $(this).toggleClass('active');
  });

$(".menu-toggle .fa-times").click(function(){
  $(this).hide();
  $(".menu-toggle .fa-bars").show();
  $("nav").removeClass("active");
});
   
  $(".fa-search").click(function() {
     $(".search-box").toggle();
     $("input[type='text']").focus();
   });

});