jQuery(document).ready(function () {
    jQuery('.share-article').on('click', function (e) {
        e.preventDefault();
        jQuery('.share-article').hide();
    })
})

// jQuery(document).ready(function () {

//     jQuery(document).ready(function () {
//         var $temp = $("<input>");
//         var $url = $(location).attr('href');
//         jQuery('#icon-share-article').click(function () {
//         jQuery("body").append($temp);
//         $temp.val($url).select();
//         document.execCommand("copy");
//         $temp.remove();

//         });
//     });
// });
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