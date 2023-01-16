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