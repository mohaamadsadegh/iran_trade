<?php
require_once __DIR__ . "/inc/elementor-widget/register.php";


if (!function_exists('iran_trade_register_nav_menu')) {
    function iran_trade_register_nav_menu()
    {
        register_nav_menus(array(
            'primary_menus' => __('منوی اصلی', 'iran_trade'),
            'side_menu' => __('منوی کناری', 'iran_trade'),
            'footer_menu' => __('منوی فوتر', 'iran_trade'),
        ));
    }
    add_action('after_setup_theme', 'iran_trade_register_nav_menu', 0);
}
add_theme_support('menus');
function loadfiles()
{
    // style files
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', false);
    wp_enqueue_style('Responsive', get_template_directory_uri() . '/assets/css/responsive.css', false);
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', false);
    wp_enqueue_style('swiper', get_template_directory_uri() . '/assets/css/swiper.css', false);
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css', false);
    wp_enqueue_style('styleNew', get_template_directory_uri() . './assets/css/styleNew.css', false);
    //    script files
    wp_enqueue_script('bootstrap.min', get_template_directory_uri() . '/assets/js/bootstrap.min.js');
    wp_enqueue_script('jquery-3.6.0', get_template_directory_uri() . '/assets/js/jquery-3.6.0.min.js');
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/swiper.js');
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js');
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/script.js');
}
add_action('wp_enqueue_scripts', 'loadfiles');



add_theme_support('post-thumbnails');
add_image_size('articlethumb', 266, 130, true);
add_image_size('articlethumb2', 50, 50, true);
add_image_size('Singlearticle', 926, 452, true);


function widgetregister()
{
    register_sidebar(array(
        'name'          => 'سایدبار آرشیو مقالات',
        'id'            => 'leftsidebar2',
        'before_widget' => '<div class="Lately-article>',
        'after_widget'  => '</div>',
        'before_title'  => ' <div class="Lately-article><h3 class="title-sidebar"> ',
        'after_title'   => '</h3>',
    ));
    register_sidebar(array(
        'name'          => 'سایدبار سینگل مقالات',
        'id'            => 'leftsidebar3',
        'before_widget' => '<div class="Lately-article>',
        'after_widget'  => '</div>',
        'before_title'  => ' <div class="Lately-article><h3 class="title-sidebar"> ',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'widgetregister');


require_once __DIR__ . '/includes/widgets.php';
require_once __DIR__ . '/includes/breadcrumb.php';

function wpdocs_theme_slug_widgets_init()
{
    register_sidebar(array(
        'name'          => __('Main Sidebar', 'textdomain'),
        'id'            => 'sidebar-1',
        'description'   => __('Widgets in this area will be shown on all posts and pages.', 'textdomain'),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'wpdocs_theme_slug_widgets_init');






function advanced_comment($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment; ?>
    <div class="box-comment-article">
        <div class="box-comment-single-article">
            <div class="row d-flex">
                <div class="col-md-3">
                    <div class="info-user  d-flex">
                        <?php echo get_avatar($comment, 75); ?>
                        <p><?php echo get_comment_author_link(); ?><?php printf(__('%1$s'), get_comment_date('j F Y '), get_comment_time()) ?> </p>
                    </div>
                </div>
                <div class="col-md-8 d-flex icon-comment">
                    <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                    <div class="icon-comment-user">
                        <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17 11V9.8C17 8.11984 17 7.27976 16.673 6.63803C16.3854 6.07354 15.9265 5.6146 15.362 5.32698C14.7202 5 13.8802 5 12.2 5H1M1 5L5 1M1 5L5 9" stroke="#929AC1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="text-user">
                <p><?php comment_text(); ?></p> <?php if ($comment->comment_approved == '0') : ?>
                    <p>
                        <em>دیدگاه شما منتظر تایید مدیریت است.</em><br />
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php }

/**
 * get post views 
 */
function gt_get_post_view()
{
    $count = get_post_meta(get_the_ID(), 'post_views_count', true);
    return "$count بازدید";
}
function gt_set_post_view()
{
    $key = 'post_views_count';
    $post_id = get_the_ID();
    $count = (int) get_post_meta($post_id, $key, true);
    $count++;
    update_post_meta($post_id, $key, $count);
}
function gt_posts_column_views($columns)
{
    $columns['post_views'] = 'بازدید';
    return $columns;
}
function gt_posts_custom_column_views($column)
{
    if ($column === 'post_views') {
        echo gt_get_post_view();
    }
}
add_filter('manage_posts_columns', 'gt_posts_column_views');
add_action('manage_posts_custom_column', 'gt_posts_custom_column_views');
