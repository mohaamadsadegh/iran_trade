<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Plugin;

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
// moh
class widget_custom_menu extends Elementor\Widget_Base
{

  public function get_name()
  {
    return 'menu';
  }

  public function get_title()
  {
    return esc_html__('منو', 'textdomain');
  }
  public function get_icon()
  {
    return 'eicon-menu-toggle';
  }
  public function get_custom_help_uri()
  {
    return '';
  }
  public function get_categories()
  {
    return ['themsah'];
  }
  public function get_keywords()
  {
    ['منو', 'meno'];
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
        'menu_list',
        [
            'label' => __('انتخاب منو', 'themsah'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '',
        ]
    );

   
$this->end_controls_section();
    $this->start_controls_section(
        'title_section_style',
        [
          'label' => 'استایل',
          'tab' => \Elementor\Controls_Manager::TAB_STYLE,
          ]
        );

        $this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'رنگ متن', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .menu_desktop .custom_menu_widget_des .menu-item a' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .menu_desktop .custom_menu_widget_des .menu-item a',
			]
		);
    $this->end_controls_section();
    $this->start_controls_section(
        'title_section_style_hover',
        [
          'label' => 'هاور',
          'tab' => \Elementor\Controls_Manager::TAB_STYLE,
          ]
        );

        $this->add_control(
			'text_color_hover',
			[
				'label' => esc_html__( 'هاور رنگ متن', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .menu_desktop .custom_menu_widget_des .menu-item a:hover' => 'color: {{VALUE}}',
				],
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
    <div class="menu_desktop">
    <div class="d-flex custom_menu_widget_des">
  
                
   <?php
    $nav_menu = $settings['menu_list'];
    $nav_menu_args = array(
    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'fallback_cb' => '',
    'menu' => $nav_menu,
    'container' => ' ',
    'menu_class' => '',
    'link_before' => '<span class="">',
    'link_after' => '</span>',
);
wp_nav_menu($nav_menu_args);        

?>
</div>
</div>
   
    <!-- End rendering the output -->

<?php
  }
  protected function content_template()
  {
  }
}
Plugin::instance()->widgets_manager->register_widget_type(new widget_custom_menu());
