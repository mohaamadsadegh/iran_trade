<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Plugin;

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
// moh
class widget_custom_log extends Elementor\Widget_Base
{

  public function get_name()
  {
    return 'login';
  }

  public function get_title()
  {
    return esc_html__('عضویت', 'textdomain');
  }
  public function get_icon()
  {
    return 'eicon-lock-user';
  }
  public function get_custom_help_uri()
  {
    return 'https://essentialwebapps.com/category/elementor-tutorial/';
  }
  public function get_categories()
  {
    return ['themsah'];
  }
  public function get_keywords()
  {
    ['login', 'فرم عضویت'];
  }
  public function register_controls()
  {
    $this->start_controls_section(
      'title_section',
      [
        'label' => 'محتوا',
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );

    $this->add_control(
      'text_align',
      [
        'label' => esc_html__('تراز متن', 'textdomain'),
        'type' => \Elementor\Controls_Manager::CHOOSE,
        'options' => [
          'left' => [
            'title' => esc_html__('چپ', 'textdomain'),
            'icon' => 'eicon-text-align-left',
          ],
          'center' => [
            'title' => esc_html__('وسط', 'textdomain'),
            'icon' => 'eicon-text-align-center',
          ],
          'right' => [
            'title' => esc_html__('راست', 'textdomain'),
            'icon' => 'eicon-text-align-right',
          ],
        ],
        'default' => 'center',
        'toggle' => true,
        'selectors' => [
          '{{WRAPPER}} .login' => 'text-align: {{VALUE}};',
        ],
      ]
    );
    $this->add_control(
      'log_text',
      [
        'label' => esc_html__('عضویت', 'textdomain'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('عضویت', 'textdomain'),
        'placeholder' => esc_html__('عضویت', 'textdomain'),
      ]
    );
  $this->add_control(
      'log_text_admin',
      [
        'label' => esc_html__('ورود', 'textdomain'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('ورود', 'textdomain'),
        'placeholder' => esc_html__(' ورود ', 'textdomain'),
      ]
    );
    $this->end_controls_section();
    // start sec style
    $this->start_controls_section(
      'title_section_style',
      [
        'label' => 'استایل دکمه',
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );
    $this->add_control(
      'text_color',
      [
        'label' => esc_html__('رنگ متن', 'textdomain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .login_button' => 'color: {{VALUE}}',
        ],
      ]
    );
    // 
    $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .login_button',
			]
		);
    // 
    $this->add_group_control(
      \Elementor\Group_Control_Background::get_type(),
      [
        'name' => 'background',
        'types' => ['classic', 'gradient', ''],
        'selector' => '{{WRAPPER}} .login_button',
      ]
    );
    $this->add_control(
			'border-radius',
			[
				'label' => esc_html__( 'انحنای مرز', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', '' ],
				'selectors' => [
					'{{WRAPPER}} .login_button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
    $this->add_group_control(
      \Elementor\Group_Control_Box_Shadow::get_type(),
      [
        'name' => 'box_shadow',
        'selector' => '{{WRAPPER}} .login_button',
      ]
    );
    $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .login_button',
			]
		);
    $this->add_control(
      'tools_hover',
      [
        'label' => esc_html__('تنظیمات هاور دکمه', 'textdomain'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );
    $this->add_control(
      'text_color_hover',
      [
        'label' => esc_html__('رنگ هاور متن', 'textdomain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .login_button:hover' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography_hover',
				'selector' => '{{WRAPPER}} .login_button:hover',
			]
		);
    $this->add_group_control(
      \Elementor\Group_Control_Box_Shadow::get_type(),
      [
        'name' => 'box_shadow_hover',
        'selector' => '{{WRAPPER}} .login_button:hover',
      ]
    );
    $this->add_group_control(
      \Elementor\Group_Control_Background::get_type(),
      [
        'name' => 'background_hover',
        'types' => ['classic', 'gradient', ''],
        'selector' => '{{WRAPPER}} .login_button:hover',
      ]
    );
   
	
    $this->end_controls_section();
  }




  protected function render()
  {


    // get our input from the widget settings.
    $settings = $this->get_settings_for_display();
    // get the individual values of the input

?>

    <!-- Start rendering the output -->

    <div class="login">
      <button class="login_button">
        <?php
        if (!is_admin() ) {
          echo $settings['log_text_admin'];
          
        } else {
          echo $settings['log_text'];
        }
        ?>
      </button>
    </div>

    <!-- End rendering the output -->

<?php
  }
  protected function content_template()
  {
  }
}
Plugin::instance()->widgets_manager->register_widget_type(new widget_custom_log());
