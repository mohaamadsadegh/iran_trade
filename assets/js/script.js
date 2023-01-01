$(document).ready(function () {
  $(window).bind("scroll", function () {
    var navHeight = $(window).height() - 70;
    if ($(window).scrollTop() > navHeight) {
      $(".top-header").addClass("fixed-header");
    } else {
      $(".top-header").removeClass("fixed-header");
    }
  });
 
  $("#one").hover(function(){
    $(this).addClass("flip-box-front-1");
  });



var swiper = new Swiper(".mySwiper", {
  slidesPerView: 5,
  loop: true,
  autoplay: {
    delay: 1500,
    disableOnInteraction: false,
  },
  centeredSlides: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

var swiper = new Swiper(".mySwiper2", {
  slidesPerView: 1,
  loop: true,
  centeredSlides: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
var swiper = new Swiper(".mySwiper3", {
  slidesPerView: 2,
  pagination: {
    el: ".swiper-pagination",
  },
  loop: true,
  centeredSlides: true,
  spaceBetween: 30,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});
var swiper = new Swiper(".mySwiper4", {
  slidesPerView: 1,
  centeredSlides: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

////////////////////////////////////////////
var typed = new Typed(".type", {
  strings: [
    "تبلیغات ",

    "بازاریابی و فروش",

    "دیجتال مارکتینگ",

    "فروش",

    "دیده شدن",

    "کسب درآمد",
  ],
  stringsElement: null,
  typeSpeed: 110,
  loop: true,
});


});