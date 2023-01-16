<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Plugin;

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
// moh
class widget_custom_cart extends Elementor\Widget_Base
{

  public function get_name()
  {
    return 'cart';
  }

  public function get_title()
  {
    return esc_html__('سبد خرید', 'textdomain');
  }
  public function get_icon()
  {
    return 'eicon-product-add-to-cart';
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
    ['سبد', 'خرید'];
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
        'icon',
        [
            'label' => esc_html__( 'Icon', 'textdomain' ),
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
                'value' => 'fa fa-cart-plus',
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
        'title_section_style',
        [
          'label' => 'استایل',
          'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
      );
  	
		$this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'رنگ آیکون', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .card_shop_button' => 'color: {{VALUE}}',
				],
			]
		);
    $this->add_control(
			'border-radius',
			[
				'label' => esc_html__( 'انحنای مرز', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', '' ],
				'selectors' => [
					'{{WRAPPER}} .card_shop_button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
    $this->add_group_control(
      \Elementor\Group_Control_Box_Shadow::get_type(),
      [
        'name' => 'box_shadow',
        'selector' => '{{WRAPPER}} .card_shop_button',
      ]
    );
    
    $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .card_shop_button',
			]
		);

    $this->add_control(
			'icon_hover',
			[
				'label' => esc_html__( 'تنظیمات هاور', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
    	$this->add_control(
			'text_color_hover',
			[
				'label' => esc_html__( 'رنگ هاور آیکون', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .card_shop_button:hover' => 'color: {{VALUE}}',
				],
			]
		);
    $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background_hover',
				'types' => [ 'classic', 'gradient', '' ],
				'selector' => '{{WRAPPER}} .card_shop_button:hover',
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

    <!-- start card shop  ->moh<- -->
  <div class="card_shop">
    <button class="card_shop_button">
    			<?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
    </button>
  </div>
  
<!-- ind card shop  ->moh<- -->

    <!-- End rendering the output -->

<?php
  }
  protected function content_template()
  {
  }
}
Plugin::instance()->widgets_manager->register_widget_type(new widget_custom_cart());
