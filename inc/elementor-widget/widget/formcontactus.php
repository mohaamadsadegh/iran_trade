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
				'section_icon_input',
				[
					'label' => esc_html__( 'آیکن', 'textdomain' ),
					'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				]
			);
	
			$this->add_control(
				'icon-name',
				[
					'label' => esc_html__( 'آیکن ورودی اطلاعات کاربر', 'textdomain' ),
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
			$this->add_control(
				'icon-tel',
				[
					'label' => esc_html__( 'آیکن ورودی اطلاعات کاربر', 'textdomain' ),
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
			$this->add_control(
				'icon-text',
				[
					'label' => esc_html__( 'آیکن ورودی اطلاعات کاربر', 'textdomain' ),
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
			$this->add_control(
				'icon-type',
				[
					'label' => esc_html__( 'آیکن ورودی اطلاعات کاربر', 'textdomain' ),
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
						'{{WRAPPER}} .box-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}} .box-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				' padding',
				[
					'label' => esc_html__( 'فاصله داخلی', 'textdomain' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em', 'custom' ],
					'selectors' => [
						'{{WRAPPER}} .box-name' => ' padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}} textarea' => ' padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						
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
						'{{WRAPPER}} .box-name' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'selector' =>'{{WRAPPER}} .box-name',
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border2',
					'selector' =>'{{WRAPPER}} .box-text',
				]
			);
			
			
			
			
			$this->end_controls_section();
			$this->start_controls_section(
                'style_section_Button',
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
				'text_color_Button',
				[
					'label' => esc_html__( 'رنگ متن دکمه', 'textdomain' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						
						'{{WRAPPER}}  .box-submit' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border-submit',
					'selector' =>'{{WRAPPER}} .box-submit',
				]
			);
			$this->add_control(
				' padding-submit',
				[
					'label' => esc_html__( 'فاصله داخلی', 'textdomain' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em', 'custom' ],
					'selectors' => [
						'{{WRAPPER}} .box-submit' => ' padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						
					],
				]
			);
			$this->add_control(
				'text_align_submit',
				[
					'label' => esc_html__( 'چینش افقی متن دکمه', 'textdomain' ),
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
						'{{WRAPPER}} .box-submit' => 'text-align: {{VALUE}};',
					],
				]
			);
			
			$this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'box_shadow',
					'selector' => '{{WRAPPER}} .box-submit',
				]
			);
	
			$this->add_control(
				' border-radius-submit',
				[
					'label' => esc_html__( 'انحنای حاشیه ها', 'textdomain' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em', 'custom' ],
					'selectors' => [
						'{{WRAPPER}} .box-submit' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->end_controls_section();
			
			
				
		}   
		protected function render() {
			$settings = $this->get_settings_for_display();
			
			?>
		
		<div class="form ">
        <div class="form-widget">
			<div class="contactus-widget">
				<form action="" id="form_widget">
            <div class="d-flex">
                <div class="box-name">
                    <label for="username"></label>
                    <input type="text" id="username" placeholder="نام ونام خانوادگی">
                    <?php \Elementor\Icons_Manager::render_icon( $settings['icon-name'], [ 'aria-hidden' => 'true' ] ); ?>
                </div>
                <div class="box-name">
                    <label for="number"></label>
                    <input type="tel" id="number" placeholder="شماره همراه">
                    <?php \Elementor\Icons_Manager::render_icon( $settings['icon-tel'], [ 'aria-hidden' => 'true' ] ); ?>
                </div>
            </div>
            <div class="d-flex">
                <div class="box-name">
                    <label for="text"></label>
                    <input type="text" id="text" placeholder="دپارتمان شرکت">
                    <?php \Elementor\Icons_Manager::render_icon( $settings['icon-text'], [ 'aria-hidden' => 'true' ] ); ?>
                </div>
                <div class="box-name">
                    <label for="type"></label>
                    <input type="tel" id="type" placeholder="موضوع">
                    <?php \Elementor\Icons_Manager::render_icon( $settings['icon-type'], [ 'aria-hidden' => 'true' ] ); ?>
                </div>
            </div>
			<div class="d-flex">
			<label for="text_form"></label>
            <textarea class="box-text" name="type" id="text_form" cols="30" rows="10" placeholder="دپارتمان شرکت"></textarea></div>
			<div class="d-flex submit-widget">
			<input class="box-submit" type="submit" name="" id="submit" placeholder="ارسال درخواست"
                            value="ارسال درخواست">
		</div>
		</form>
        </div>
	</div>
    </div>
	<script> 
	 jQuery(document).ready(function(){
    jQuery('#form_widget').on('submit',function(e){
      e.preventDefault();
      let username = jQuery('#username').val();
      let number = jQuery('#number').val();
      let text = jQuery('#text').val();
      let type = jQuery('#type').val();
      let text_form = jQuery('#text_form').val();
      console.log(username);
	  jQuery.ajax({
		
	  });
    });
  });</script>

		<?php echo do_shortcode('[contact-form-7 id="'. $settings['border_style'].'" title="Contact form 1 "]'); ?>
		</div>
		<?php
			
		}

		protected function _content_template() {
			
		}
	}
	// register widget
	Plugin::instance()->widgets_manager->register_widget_type(new Contact_Form());