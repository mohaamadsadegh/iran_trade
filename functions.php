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
 
}
add_action('wp_enqueue_scripts', 'loadfiles');



add_theme_support('post-thumbnails');
add_image_size('articlethumb', 266, 130, true);
add_image_size('articlethumb2', 50, 50, true);


function widgetregister() {

	register_sidebar( array(
		'name'          => 'ستون سمت راست قالب',
		'id'            => 'leftsidebar',
		'before_widget' => '<div class="grouping-article>',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="grouping-article ">
        <h3 class="rounded">',
		'after_title'   => '</h3>',
	) );
    register_sidebar( array(
		'name'          => 'ستون سمت راست قالب',
		'id'            => 'leftsidebar1',
		'before_widget' => '<div class="Lately-article>',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="Lately-article text-right">
        <h3 class="rounded"> ',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'widgetregister' );
