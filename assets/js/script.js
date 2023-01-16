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



$('.swiper_video .swiper-slide .box video').click(function() {
  if (this.paused) {
 $(this).get(0).play();
 $(this).siblings(".show_icon").hide();
  }
else{
  $(this).get(0).pause();
  $(".show_icon").show();
}
});
