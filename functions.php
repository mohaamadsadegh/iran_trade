<?php
require_once __DIR__ . "/inc/elementor-widget/register.php";


if (! function_exists( 'iran_trade_register_nav_menu') ) {
    function iran_trade_register_nav_menu(){
        register_nav_menus(array(
            'primary_menus' => __('منوی اصلی' , 'iran_trade'),
            'side_menu' => __('منوی کناری' , 'iran_trade'),
            'footer_menu' => __('منوی فوتر' , 'iran_trade'),
        ) );
    }
    add_action('after_setup_theme','iran_trade_register_nav_menu', 0);
}
add_theme_support('menus');
function loadfiles()
{
    // style files
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css', false);
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', false);
    wp_enqueue_style('Responsive', get_template_directory_uri() . '/assets/css/responsive.css', false);
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', false);
    wp_enqueue_style('swiper', get_template_directory_uri() . '/assets/css/swiper.css', false);

//    script files
    wp_enqueue_script('bootstrap.min', get_template_directory_uri() . '/assets/js/bootstrap.min.js');
    wp_enqueue_script('jquery-3.6.0', get_template_directory_uri() . '/assets/js/jquery-3.6.0.min.js');
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/script.js');
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/swiper.js');
}
add_action('wp_enqueue_scripts', 'loadfiles');



add_theme_support('post-thumbnails');
add_image_size('articlethumb', 266, 130, true);
add_image_size('articlethumb2', 50, 50, true);
add_image_size('Singlearticle', 926, 452, true);


function widgetregister()
{

    register_sidebar(array(
        'name'          => 'سومین ابزارک',
        'id'            => 'leftsidebar',
        'before_widget' => '<div class="grouping-article>',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="grouping-article><h3>',
        'after_title'   => '</h3>',
    ));
    register_sidebar(array(
        'name'          => 'دومین ابزارک',
        'id'            => 'leftsidebar2',
        'before_widget' => '<div class="Lately-article>',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="Lately-article text-right">
        <h3 class="title-sidebar"> ',
        'after_title'   => '</h3>',
    ));
    register_sidebar(array(
        'name'          => 'ستون تبلیغات راست قالب',
        'id'            => 'leftsidebar3',
        'before_widget' => '<div class="Lately-article>',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="Lately-article text-right">
        <h3 class="rounded"> ',
        'after_title'   => '</h3>',
    ));
    register_sidebar(array(
        'name'          => 'بخش سرچ فرم',
        'id'            => 'searchform',
        'before_widget' => '<div class="Lately-article>',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="Lately-article text-right">
        <h3 class="rounded"> ',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'widgetregister');


require_once __DIR__ . '/includes/widgets.php';

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




function the_breadcrumb()
{

    $sep = ' > ';

    if (!is_front_page()) {

        // Start the breadcrumb with a link to your homepage
        echo '<div class="breadcrumbs">';
        echo '<a href="';
        echo get_option('home');
        echo '">';
        bloginfo('name');
        echo '</a>' . $sep;

        // Check if the current page is a category, an archive or a single page. If so show the category or archive name.
        if (is_category() || is_single()) {
            the_category('>');
        } elseif (is_archive() || is_single()) {
            if (is_day()) {
                printf(__('%s', 'text_domain'), get_the_date());
            } elseif (is_month()) {
                printf(__('%s', 'text_domain'), get_the_date(_x('F Y', 'monthly archives date format', 'text_domain')));
            } elseif (is_year()) {
                printf(__('%s', 'text_domain'), get_the_date(_x('Y', 'yearly archives date format', 'text_domain')));
            } else {
                _e('Blog Archives', 'text_domain');
            }
        }

        // If the current page is a single post, show its title with the separator
        if (is_single()) {
            echo $sep;
            the_title();
        }

        // If the current page is a static page, show its title.
        if (is_page()) {
            echo the_title();
        }

        // if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
        if (is_home()) {
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ($page_for_posts_id) {
                $post = get_post($page_for_posts_id);
                setup_postdata($post);
                the_title();
                rewind_posts();
            }
        }

        echo '</div>';
    }
}

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
