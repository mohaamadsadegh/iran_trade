<?php 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
class movie_slider extends Elementor\Widget_Base{

    public function get_name(){
        return 'اسلایدر فیلم';
    }
    
    public function get_title(){
        return 'اسلایدر فیلم';
    }
    
    public function get_icon(){
        return 'eicon-slider-video';
    }
    
    public function get_keywords(){
        return [  'tabs' , 'toggle'];
    }
    
    public function get_categories(){
        return [ 'themsah' ];
    }

    protected function register_controls(){

        $this->start_controls_section('title_sec',[
            'label'=>'عنوان',
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);
        $this->add_control(
			'title',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Title', 'textdomain' ),
				'placeholder' => esc_html__( 'Enter your title', 'textdomain' ),
			]
		);
		$this->add_control(
			'move',
			[
				'label' => esc_html__( 'ویدیو', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(''),
				],
			]
		);
		$this->end_controls_section();


    }

    
	protected function render() {}

	protected function content_template() {}

}


Plugin::instance()->widgets_manager->register_widget_type( new movie_slider() );