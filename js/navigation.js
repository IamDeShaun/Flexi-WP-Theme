/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 * 
 * 
 */

jQuery(document).ready(function() {
  jQuery(".sidebar-nav > ul").addClass("navbar-nav");
  jQuery("ul.navbar-nav > li").addClass("nav-item");
  jQuery("li.nav-item > a").addClass("nav-link");
});

jQuery(document).ready(function () {
  jQuery(function () {
    jQuery('.sidebar-nav > ul > li > a').click(function() {
          
          jQuery('a').removeClass('current');
          jQuery(this).addClass('current');
      });
  });
});

jQuery(document).ready(function(){

  jQuery(".menu-toggle .fa-times").hide();

  jQuery(".menu-toggle .fa-bars").click(function(){
  jQuery(this).hide();
  jQuery(".menu-toggle .fa-times").show();
  jQuery("nav").addClass("active");
});

jQuery('ul li').click(function(){
  jQuery(this).siblings().removeClass('active');
  jQuery(this).toggleClass('active');
  });

  jQuery(".menu-toggle .fa-times").click(function(){
    jQuery(this).hide();
  jQuery(".menu-toggle .fa-bars").show();
  jQuery("nav").removeClass("active");
});
   
  jQuery(".fa-search").click(function() {
     jQuery(".search-box").toggle();
     jQuery("input[type='text']").focus();
   });

});
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


