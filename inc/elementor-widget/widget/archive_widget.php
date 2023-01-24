<?php 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
class archive_slider extends Elementor\Widget_Base{

    public function get_name(){
        return 'archive';
    }
    
    public function get_title(){
        return 'اسلایدر مقالات';
    }
    
    public function get_icon(){
        return ' eicon-slider-3d';
    }
    
    public function get_keywords(){
        return ['archive' , 'ارشیو', 'اسلایدر'];
    }
    
    public function get_categories(){
        return [ 'themsah' ];
    }

    protected function register_controls(){
        $this->start_controls_section('title_sec',[
            'label'=>'محتوا',
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
          
                $this->add_control(
                    'icon',
                    [
                        'label' => esc_html__( 'آیکون', 'textdomain' ),
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
        // 
        $this->start_controls_section('title_sec_style',[
            'label'=>'باکس',
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);
        $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'selector' => '{{WRAPPER}} .archive_slider_swiper .swiper-wrapper .box',
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .archive_slider_swiper .swiper-wrapper .box',
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .archive_slider_swiper .swiper-wrapper .box',
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label'=>'تایپوگرافی عنوان',
				'name' => 'content_typography_title',
				'selector' => '{{WRAPPER}} .archive_slider_swiper .swiper-wrapper .box .title',
			]
		);
          $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label'=>'تایپوگرافی متن',
				'name' => 'content_typography_cop',
				'selector' => '{{WRAPPER}} .archive_slider_swiper .swiper-wrapper .box .cap',
			]
		);
        $this->add_control(
			'text_color_title',
			[
				'label' => esc_html__( 'رنگ عنوان', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .archive_slider_swiper .swiper-wrapper .box .title' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'text_color_cop',
			[
				'label' => esc_html__( 'رنگ متن', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .archive_slider_swiper .swiper-wrapper .box .cap' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->end_controls_section();
        $this->start_controls_section('title_sec_style_box_hover',[
            'label'=>'تنظیمات هاور باکس',
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);
        $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow_hover',
				'selector' => '{{WRAPPER}} .archive_slider_swiper .swiper-wrapper .box:hover',
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background_hover',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .archive_slider_swiper .swiper-wrapper .box:hover',
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border_hover',
				'selector' => '{{WRAPPER}} .archive_slider_swiper .swiper-wrapper .box:hover',
			]
		);
        $this->add_control(
			'text_color_title_hover',
			[
				'label' => esc_html__( 'هاور رنگ عنوان', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .archive_slider_swiper .swiper-wrapper .box .title:hover' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'text_color_cop_hover',
			[
				'label' => esc_html__( 'هاور رنگ متن', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .archive_slider_swiper .swiper-wrapper .box .cap:hover' => 'color: {{VALUE}}',
				],
			]
		);
      
        $this->end_controls_section();
        $this->start_controls_section('title_sec_deta',[
            'label'=>'تاریخ',
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);
        $this->add_control(
			'text_color_deta',
			[
				'label' => esc_html__( 'رنگ تاریخ', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .archive_slider_swiper .swiper-wrapper .box .view_deta' => 'color: {{VALUE}}',
				],
			]
		);
        $this->end_controls_section();
        $this->start_controls_section('title_sec_deta_hover',[
            'label'=>'تنظیمات هاور تاریخ',
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);
        $this->add_control(
			'text_color_deta_hover',
			[
				'label' => esc_html__( 'هاور رنگ تاریخ', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .archive_slider_swiper .swiper-wrapper .box .view_deta:hover' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background_deta_hover',
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .archive_slider_swiper .swiper-wrapper .box .view_deta:hover',
			]
		);
        $this->end_controls_section();
        $this->start_controls_section('title_sec_arrow_icon',[
            'label'=>'دکمه',
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);
        $this->add_control(
			'text_arrow_icon',
			[
				'label' => esc_html__( 'رنگ ایکون', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .archive_slider_swiper .swiper-wrapper .box .arrow_icon' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'more_options',
			[
				'label' => esc_html__( 'دکمه اسلایدر', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_control(
			'text_arrow_icon',
			[
				'label' => esc_html__( 'رنگ ایکون اسلایدر', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .archive_slider_swiper .swiper-button-next::after, .archive_slider_swiper .swiper-button-prev::after' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background_arrow_icon',
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .archive_slider_swiper .swiper-wrapper .box .arrow_icon',
			]
		);
        $this->add_control(
			'more_options',
			[
				'label' => esc_html__( 'هاور دکمه اسلایدر', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background_btn_icon_',
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .archive_slider_swiper .swiper-button-next::after, .archive_slider_swiper .swiper-button-prev::after'
			]
		);
        $this->end_controls_section();
        $this->start_controls_section('title_sec_arrow_icon_hover',[
            'label'=>'تنظیمات هاور دکمه',
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);
        $this->add_control(
			'text_arrow_icon_hover',
			[
				'label' => esc_html__( 'هاور ایکون', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .archive_slider_swiper .swiper-wrapper .box .arrow_icon:hover' => 'color: {{VALUE}}',
				],
			]
		);


        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background_arrow_icon_hover',
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .archive_slider_swiper .swiper-wrapper .box .arrow_icon:hover',
			]
		);
        $this->end_controls_section();
            }

	protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
	                   

       
        <div class="archive_slider_swiper">
            <?php if('yes' === $settings['show_arrow']){ ?>

        <div class="archive_slider_btn">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
<?php } ?>
            <div class="swiper-wrapper">
        
            <?php 
                 $post = new WP_Query(array(
                'post-type' => 'post',
                'post_per_page' => '4',
                
            )
         );  
            ?>
            <?php if ( $post->have_posts() ) : ?>

          	<?php while ( $post->have_posts() ) : $post->the_post(); ?>

                <div class="swiper-slide">
                    <div class="box">
                        <div class="image"><?php the_post_thumbnail('articlethumb') ?></div>
                        <div class="content">
                            <h3 class="title"><?php the_title(); ?></h3>
                            <p class="cap"><?php echo get_the_excerpt() ?></p>
                            <div class="felx">
                                <div class="release_date">
                                <h3 class="view_deta"> <?php the_time('j F Y') ?></h3>
                                </div>
                                <div class="arrow_icon"><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
              <?php endwhile; ?>
              <?php endif; ?>
            </div>
            <?php
             if ( 'yes' === $settings['show_pagination'] ) { ?>
            <div class="swiper-pagination"></div>
            <?php } ?>
        </div>
        <script>
        $(document).ready(function () {
  const archive = new Swiper('.archive_slider_swiper', {
    loop:true,
    
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
      
      breakpoints: {
        '@0.75': {
          slidesPerView: 1,
          spaceBetween: 1,
        },
        '@1.00': {
          slidesPerView: 2,
          spaceBetween: 5,
        },
        '@1.50': {
          slidesPerView: 4,
          spaceBetween: 5,
        },
      }
  });
});
</script>
      <?php 
	}

protected function content_template() {}
}


Plugin::instance()->widgets_manager->register_widget_type( new archive_slider() );
















