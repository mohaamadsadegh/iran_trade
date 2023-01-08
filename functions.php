<?php 
require_once __DIR__. "/inc/elementor-widget/register.php";
add_theme_support('menu');
// ?>
<?php

use Automattic\Jetpack\Search\Customizer;

function loadfiles()
{
  wp_enqueue_style('style', get_template_directory_uri() . './assets/css/style.css', false);
  wp_enqueue_style('bootstrap', get_template_directory_uri() . './assets/css/bootstrap.min.css', false);
  wp_enqueue_style('Responsive', get_template_directory_uri() . './assets/css/responsive.css', false);
  wp_enqueue_style('font-awesome', get_template_directory_uri() . './assets/css/font-awesome.min.css', false);
 
}
add_action('wp_enqueue_scripts', 'loadfiles');



add_theme_support('post-thumbnails');
add_image_size('articlethumb', 266, 130, true);
add_image_size('articlethumb2', 50, 50, true);
add_image_size('Singlearticle', 926, 452, true);


function widgetregister() {

	register_sidebar( array(
		'name'          => 'ستون سمت راست قالب',
		'id'            => 'leftsidebar',
		'before_widget' => '<div class="grouping-article>',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="grouping-article><h3>',
		'after_title'   => '</h3>',
	) );
    register_sidebar( array(
		'name'          => 'ستون سمت چپ قالب',
		'id'            => 'leftsidebar2',
		'before_widget' => '<div class="Lately-article>',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="Lately-article text-right">
        <h3 class="rounded"> ',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => 'ستون تبلیغات راست قالب',
		'id'            => 'leftsidebar3',
		'before_widget' => '<div class="Lately-article>',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="Lately-article text-right">
        <h3 class="rounded"> ',
		'after_title'   => '</h3>',
	) );
    register_sidebar( array(
		'name'          => 'بخش سرچ فرم',
		'id'            => 'searchform',
		'before_widget' => '<div class="Lately-article>',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="Lately-article text-right">
        <h3 class="rounded"> ',
		'after_title'   => '</h3>',
	) );


}
add_action( 'widgets_init', 'widgetregister' );


require_once __DIR__.'/includes/widgets.php' ;

function wpdocs_theme_slug_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Main Sidebar', 'textdomain' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'wpdocs_theme_slug_widgets_init' );




function the_breadcrumb() {

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
        if (is_category() || is_single() ){
            the_category('>');
        } elseif (is_archive() || is_single()){
            if ( is_day() ) {
                printf( __( '%s', 'text_domain' ), get_the_date() );
            } elseif ( is_month() ) {
                printf( __( '%s', 'text_domain' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'text_domain' ) ) );
            } elseif ( is_year() ) {
                printf( __( '%s', 'text_domain' ), get_the_date( _x( 'Y', 'yearly archives date format', 'text_domain' ) ) );
            } else {
                _e( 'Blog Archives', 'text_domain' );
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
        if (is_home()){
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ( $page_for_posts_id ) { 
                $post = get_post($page_for_posts_id);
                setup_postdata($post);
                the_title();
                rewind_posts();
            }
        }

        echo '</div>';
    }
}


