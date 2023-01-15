<?php 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
class video_slider extends Elementor\Widget_Base{

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
            'label'=>'محتوا',
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);
     
        $repeater_video = new \Elementor\Repeater();
        $repeater_video->add_control(
          'video',
              [
                'label' => esc_html__( 'فیلم', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['video'],
              ],
          );
          $repeater_video->add_control(
            'image',
                [
                  'label' => esc_html__( 'تصویر زمینه', 'textdomain' ),
                  'type' => \Elementor\Controls_Manager::MEDIA,
                  'media_types' => ['image'],
                ],
            );
            $repeater_video->add_control(
              'icon_video',
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
            $this->add_control(
              'slider_video',
              [
                  'label' => esc_html__( 'اسلایدر ویدیو', 'textdomain' ),
                  'type' => \Elementor\Controls_Manager::REPEATER,
                  'fields' => $repeater_video->get_controls(),
                  
              ]
          );         

		$this->end_controls_section();



    $this->start_controls_section('title_sec_arrow',[
      'label'=>'اسلایدر',
      'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
  ]);

  $this->add_control(
    'show_arrow',
    [
      'label' => esc_html__( 'نمایش پیکان', 'textdomain' ),
      'type' => \Elementor\Controls_Manager::SWITCHER,
      'label_on' => esc_html__( 'نمایش', 'textdomain' ),
      'label_off' => esc_html__( 'عدم نمایش', 'textdomain' ),
      'return_value' => 'yes',
      'default' => 'yes',
    ]
  );
  	$this->add_control(
			'show_pagination',
			[
				'label' => esc_html__( 'نمایش نقطه ها', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'نمایش', 'textdomain' ),
				'label_off' => esc_html__( 'عدم نمایش', 'textdomain' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
  
  
  $this->end_controls_section();
  // 




  $this->start_controls_section('title_sec_style',[
    'label'=>'استایل باکس',
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
]);

$this->add_control(
  'text_color',
  [
    'label' => esc_html__( 'رنگ ایکون', 'textdomain' ),
    'type' => \Elementor\Controls_Manager::COLOR,
    'selectors' => [
      '{{WRAPPER}} .video_slider .swiper .video-slider-button .swiper-button-next::after, .video_slider .swiper .video-slider-button .swiper-button-prev::after' => 'color: {{VALUE}}',
    ],
  ]
);
$this->add_group_control(
  \Elementor\Group_Control_Background::get_type(),
  [
    'label' => esc_html__( 'رنگ پس زمینه ایکون', 'textdomain' ),
    'name' => 'background',
    'types' => [ 'classic', 'gradient'],
    'selector' => '{{WRAPPER}} .video_slider .swiper .video-slider-button .swiper-button-next::after, .video_slider .swiper .video-slider-button .swiper-button-prev::after',
  ]
);
$this->add_group_control(
  \Elementor\Group_Control_Box_Shadow::get_type(),
  [
    'name' => 'box_shadow_video',
    'selector' => '{{WRAPPER}} .box',
  ]
);
$this->add_group_control(
  \Elementor\Group_Control_Border::get_type(),
  [
    'name' => 'border_video',
    'selector' => '{{WRAPPER}} .box',
  ]
);

$this->end_controls_section();
    }

 
  
	protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
	
        <div class="video_slider">
          <div class="swiper swiper_video">
            <div class="swiper-wrapper">
      <?php foreach ($settings['slider_video'] as $video) { ?>
              <div class="swiper-slide">
                <div class="box">
                <video  id="vid" poster="<?php echo $video['image']['url'] ?>">
              <source  src="<?php echo $video ['video']['url'] ?>"></video>
              <div id="hide" class="show_icon"><?php \Elementor\Icons_Manager::render_icon( $video['icon_video']); ?></div>
                </div>
              </div>
              <?php 
      } ?>
            </div>
            <?php
             if ( 'yes' === $settings['show_pagination'] ) { ?>
            <div class="video_slider_pagination">
              <div class="swiper-pagination"></div>
            </div>
            <?php
        }
        ?>
            <?php
            if ( 'yes' === $settings['show_arrow'] ) { ?>
         <div class="video-slider-button">
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div>
        <?php
        }
        ?>
           
          </div>
        </div>

<script>
  $(document).ready(function () {
  const video_slider = new Swiper(".swiper_video", {
    spaceBetween: 20,
    slidesPerView: 3,
    centeredSlides: true,
    
    pagination: {
      el: ".swiper-pagination",
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
});


  </script>
      <?php 
	}

  

	protected function content_template() {}

}


Plugin::instance()->widgets_manager->register_widget_type( new video_slider() );