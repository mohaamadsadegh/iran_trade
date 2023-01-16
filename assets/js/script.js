$(document).ready(function () {
  const video_slider = new Swiper(".swiper_video", {
    spaceBetween: 20,
    slidesPerView: 3,
    centeredSlides: true,
    pagination: {
      el: ".swiper-pagination",
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
});

$(document).ready(function () {
  const comment_slider = new Swiper(".swiper_comment", {
    slidesPerView: 2,
    loop:true,
    });
});
