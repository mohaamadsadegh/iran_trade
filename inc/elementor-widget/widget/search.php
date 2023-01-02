<?php 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
 class search extends Elementor\Widget_Base{

    public function get_name()
    {
        return  'جستجو';
    }
    public function get_title()
    {
        return 'جستجو';
    }
    public function get_icon()
    {
        return 'eicon-site-search';
    }
    public function get_keywords()
    {
        return ['search,SEARCH'];
    }
    public function get_categories()
    {
        return [ 'themsah' ];
    }
    protected function register_controls()
    {
        $this-> start_controls_section(
            'title_sec',
			[
                'label'=>'عنوان',
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);
      
		$this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Text Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .your-class' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'alignment',
			[
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'label' => esc_html__( 'Alignment', 'textdomain' ),
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
			]
		);

		$this->end_controls_section();


    }

    }
 
     
Plugin::instance()->widgets_manager->register_widget_type( new search() );