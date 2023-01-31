// $(document).ready(function () {
//   const video_slider = new Swiper(".swiper_video", {
//     spaceBetween: 20,
//     slidesPerView: 3,
//     centeredSlides: true,
    
//     pagination: {
//       el: ".swiper-pagination",
//     },
//     navigation: {
//       nextEl: ".swiper-button-next",
//       prevEl: ".swiper-button-prev",
//     },
//   });
// });

// $(document).ready(function () {
//   const comment_slider = new Swiper(".swiper_comment", {
//     slidesPerView: 2,
//     loop:true,
//     });
// });
jQuery(document).ready(function () {

    jQuery(document).ready(function () {
        var $temp = $("<input>");
        var $url = $(location).attr('href');
        jQuery('#share-article').click(function () {
        jQuery("body").append($temp);
        $temp.val($url).select();
        document.execCommand("copy");
        $temp.remove();
        $('#share-article').append('<div><strong>لینک مقاله با موفقیت کپی شد</strong></div>');
        });
        jQuery('#icon-share-article').click(function () {
          jQuery("body").append($temp);
          $temp.val($url).select();
          document.execCommand("copy");
          $temp.remove();
          $('#share-article').append('<div><strong>لینک مقاله با موفقیت کپی شد</strong></div>');
          });
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
var image_field;
jQuery(function($){
  $(document).on('click', 'input.select-img', function(evt){
    image_field = $(this).siblings('.img');
    tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
    return false;
  });
  window.send_to_editor = function(html) {
    imgurl = $('img', html).attr('src');
    image_field.val(imgurl);
    tb_remove();
  }
});


// آموزشی 

      $(document).ready(function(){
        $("#hide").click(function(){
          $(".Social-Networks").show();
        });
        $("#show").click(function(){
          $(".Social-Networks").hide();
        });
      });

      // 
      var swiper = new Swiper(".mySwiper", {
        pagination: {
            el: ".swiper-pagination",
            type: "fraction",
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

   
  // 
  jQuery(document).ready(function(){
    jQuery('#form_widget').on('submit',function(e){
      e.preventDefault();
      let username = jQuery('#username').val();
      let number = jQuery('#number').val();
      let text = jQuery('#text').val();
      let type = jQuery('#type').val();
      let text_form = jQuery('#text_form').val();
      console.log(username);
    });
  });