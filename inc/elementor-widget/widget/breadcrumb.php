<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Plugin;

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}


	class breadcrumb extends \Elementor\Widget_Base {
		public function get_name() {
			return 'breadcrumb';
		}

		public function get_title() {
			return __( 'breadcrumb', 'text-domain' );
		}
		
		public function get_icon()
		{
		  return ' eicon-product-breadcrumbs';
		}
		
		public function get_categories()
		{
			return [ 'basic' ];
		}
		
		protected function _register_controls() {
			$this->start_controls_section(
				'content_section',
				[
					'label' => esc_html__( 'محتوا', 'textdomain' ),
					'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
					
				]
			);
			$this->add_control(
				'widget_title',
				[
					'label' => esc_html__( 'عنوان صفحه اصلی', 'textdomain' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( '', 'textdomain' ),
					'placeholder' => esc_html__( '', 'textdomain' ),
				]
			);
			
			$this->end_controls_section();
			$this->start_controls_section(
				'section_icon',
				[
					'label' => esc_html__( 'Icon', 'textdomain' ),
					'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				]
			);
	
			$this->add_control(
				'icon',
				[
					'label' => esc_html__( 'Icon', 'textdomain' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'fas fa-circle',
						'library' => 'fa-solid',
					],
					'recommended' => [
						'fa-solid' => [
							'circle',
							'dot-circle',
							'square-full',
						],
						'fa-regular' => [
							'circle',
							'dot-circle',
							'square-full',
						],
					],
				]
			);
	
			$this->end_controls_section();
			$this->start_controls_section(
				'style_section',
				[
					'label' => esc_html__( 'استایل', 'textdomain' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);
			$this->add_control(
				'text_align',
				[
					'label' => esc_html__( 'چینش افقی', 'textdomain' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => esc_html__( 'Left', 'textdomain' ),
							'icon' => 'eicon-text-align-left',
						],
						'center' => [
							'title' => esc_html__( 'Center', 'textdomain' ),
							'icon' => 'eicon-text-align-center',
						],
						'right' => [
							'title' => esc_html__( 'Right', 'textdomain' ),
							'icon' => 'eicon-text-align-right',
						],
					],
					'default' => 'center',
					'toggle' => true,
					'selectors' => [
						'{{WRAPPER}} .breadcrumbs-articles' => 'text-align: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'text_color',
				[
					'label' => esc_html__( 'رنگ متن صفحه اصلی', 'textdomain' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .bread' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_control(
				'text_color2',
				[
					'label' => esc_html__( 'رنگ متن صفحه داخلی', 'textdomain' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}}  .br-pagee' => 'color: {{VALUE}}',
					],
				]
			);
		
			$this->add_control(
				'font_family',
				[
					'label' => esc_html__( 'Font Family', 'textdomain' ),
					'type' => \Elementor\Controls_Manager::FONT,
					'default' => "'Open Sans', sans-serif",
					'selectors' => [
						'{{WRAPPER}} .breadcrumbs-articles' => 'font-family: {{VALUE}}',
					],
				]
			);
			$this->end_controls_section();			
		}
		

		protected function render() {
			$settings = $this->get_settings_for_display();
			?>
		<div class="breadcrumbs-articles">
			<?php 


    $sep = '<svg width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg">
	<path d="M5.33337 1.66675L1.33337 5.66675L5.33337 9.66675" stroke="#929AC1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
	</svg>';

    if (!is_front_page()) {
        echo '<div class="bread">';
        echo '<a class="bread" href="';
        echo get_option('home');
        echo '">';
		if(!$settings['widget_title']){
			bloginfo('name');
			
		}
		else{
			echo $settings['widget_title']; 
			
		}
		
        echo '</a>' ;
		 if(!$settings['icon']){
			echo '<svg width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M5.33337 1.66675L1.33337 5.66675L5.33337 9.66675" stroke="#929AC1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>';
		}
		else{
			
			 \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] );
			 	
		}
		
        if (is_single()) {

            echo '<a class="br-pagee href="';
            echo get_option('single');
            echo '">';
            echo the_title();
            echo '</a>';
        }

        // If the current page is a static page, show its title.
        if (is_page()) {

			
            echo '<a class="br-pagee';
            echo get_option('page');
            echo '">';
            echo the_title();
            echo '</a>';
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
    
}?>
					
                </div>
				
		<?php
			
		}

		protected function _content_template() {
			
		}
	}
	// register widget
	Plugin::instance()->widgets_manager->register_widget_type(new breadcrumb());
