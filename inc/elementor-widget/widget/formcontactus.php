<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Plugin;

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}


	class Contact_Form extends \Elementor\Widget_Base {
		public function get_name() {
			return 'Contact-Form';
		}

		public function get_title() {
			return __( 'Contact Form ', 'text-domain' );
		}
		
		public function get_icon()
		{
		  return ' eicon-form-horizontal';
		}
		
		public function get_categories()
		{
			return [ 'basic' ];
		}
		
	   
		protected function _register_controls() {
			$this->start_controls_section(
				'section_icon',
				[
					'label' => esc_html__( 'محتوا', 'textdomain' ),
					'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				]
			);
	
			$this->add_control(
                'border_style',
                [
                    'label' => esc_html__( 'انتخاب فرم', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => cf7_themsah(),
                    
                ]
            );
	
			$this->end_controls_section();
			$this->start_controls_section(
                'style_section',
                [
                    'label' => esc_html__( 'محتوا', 'textdomain' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
			$this->add_control(
				'Margin',
				[
					'label' => esc_html__( 'فاصله خارجی', 'textdomain' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em', 'custom' ],
					'selectors' => [
						'{{WRAPPER}} .form' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				' border-radius',
				[
					'label' => esc_html__( 'انحنای حاشیه ها', 'textdomain' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em', 'custom' ],
					'selectors' => [
						'{{WRAPPER}} input' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}}  textarea' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
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
						'{{WRAPPER}} .form' => 'text-align: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'content_typography',
					'selector' => '{{WRAPPER}} .form',
				]
			);
			$this->add_control(
				'text_color',
				[
					'label' => esc_html__( 'رنگ متن نگهدارنده', 'textdomain' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}}  input::placeholder' => 'color: {{VALUE}}',
						'{{WRAPPER}}  textarea::placeholder' => 'color: {{VALUE}}',
					],
				]
			);
			
			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border',
					'selector' =>'{{WRAPPER}} input',
				]
			);
			
			
			
			
			$this->end_controls_section();
			$this->start_controls_section(
                'style_section2',
                [
                    'label' => esc_html__( 'دکمه', 'textdomain' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'background',
					'types' => [ 'classic', 'gradient', 'video' ],
					'selector' => '{{WRAPPER}} .box-submit',
				]
			);
			$this->add_control(
				'text_color12',
				[
					'label' => esc_html__( 'رنگ متن دکمه', 'textdomain' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						
						'{{WRAPPER}}  .box-submit' => 'color: {{VALUE}}',
					],
				]
			);
			$this->end_controls_section();
			
				
		}   
		protected function render() {
			$settings = $this->get_settings_for_display();
			
			?>
		
		<div class="form">
                    
		<?php echo do_shortcode('[contact-form-7 id="'. $settings['border_style'].'" title="Contact form 1 "]'); ?>
		</div>
		<?php
			
		}

		protected function _content_template() {
			
		}
	}
	// register widget
	Plugin::instance()->widgets_manager->register_widget_type(new Contact_Form());