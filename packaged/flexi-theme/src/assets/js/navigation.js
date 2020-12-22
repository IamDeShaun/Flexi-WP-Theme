/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 * 
 * 
 */


const searchIcon = document.getElementById("search");
const searchBox = document.getElementById("searchbox");

searchIcon.addEventListener('click', function () {
  if (searchBox.style.top == '50px') {
    searchBox.style.top = '-65px';
    searchBox.style.pointerEvents = 'none';
  } else {
    searchBox.style.top = '50px';
    searchBox.style.pointerEvents = 'auto';
  }
});



$(document).ready(function(){

  $(".menu-toggle .fa-times").hide();

$(".menu-toggle .fa-bars").click(function(){
  $(this).hide();
  $(".menu-toggle .fa-times").show();
  $("nav").addClass("active");
});

$('ul li').click(function(){
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



