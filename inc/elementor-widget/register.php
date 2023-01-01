<?php
namespace Elementor;
defined('ABSPATH') || die();

/*! ADD THEME WIDGETS
------------------------------------------------->*/
add_action( 'elementor/widgets/widgets_registered', 'Elementor\register_widgets' );
function register_widgets() {
    $widgets = glob( get_template_directory() . '/inc/elementor-widget/widget/*.php' );
    foreach( $widgets as $key ){
        if ( file_exists( $key ) ) {
            require_once $key;
        }
    }
}
function themsah_cat($elements_manager){
    $elements_manager -> add_category('themsah',
[
    'title' => esc_html__('تمساح','themsah'),
    'icon' => '',
]);
}

add_action( 'elementor/elements/categories_registered', 'Elementor\themsah_cat' );
?>