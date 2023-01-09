<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Plugin;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
// moh
class widget_custom_comment_slider extends Elementor\Widget_Base
{

    public function get_name()
    {
        return 'comment';
    }

    public function get_title()
    {
        return esc_html__('اسلایدر نظرات', 'textdomain');
    }
    public function get_icon()
    {
        return 'eicon-slider-push';
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
        ['کامنت', 'اسلایدر'];
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
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'user',
                [
                    'label' => esc_html__( 'نام کاربر', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'نام کاربر', 'textdomain' ),
                    'placeholder' => esc_html__( 'نام کاربر....', 'textdomain' ),
                ],
            );
            $repeater->add_control(
                'category',
                [
                    'label' => esc_html__( 'دسته بندی', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'دسته بندی خدمت', 'textdomain' ),
                    'placeholder' => esc_html__( 'دسته بندی...', 'textdomain' ),
                ]
                );
                $repeater->add_control(
                    'item',
                         [
                  'label' => esc_html__('کپشن', 'textdomain'),
                  'type' => \Elementor\Controls_Manager::TEXTAREA,
                     ]
                );
                $repeater->add_control(
                    'image',
                [
                    'name' => 'image',
                    'label' => esc_html__( 'تصویر کاربر', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'media_types' => ['image'],
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );
            $this->add_control(
                'slider',
                [
                    'label' => esc_html__( 'اسلایدر کامنت', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    
                ]
            );
       
        
        $this->end_controls_section();
      
            $this->start_controls_section(
                'title_section_STYLE',
                [
                    'label' => 'استایل محتوای متن',
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'text_color_cop',
                [
                    'label' => esc_html__( 'رنگ متن  ', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .box_comment_cop' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'text_color_user',
                [
                    'label' => esc_html__( 'رنگ متن کاربر', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .box_comment_user' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'text_color_cat',
                [
                    'label' => esc_html__( 'رنگ متن دسته بندی ', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .box_comment_cat' => 'color: {{VALUE}}',
                    ],
                ]
            );
        $this->end_controls_section();
        $this->start_controls_section(
            'title_section_STYLE_hover',
            [
                'label' => 'تنظیمات هاور',
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'text_color_cop_hover',
            [
                'label' => esc_html__( 'هاور رنگ متن کامنت ', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .box_comment_cop:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'text_color_user:hover',
            [
                'label' => esc_html__( 'هاور رنگ متن کاربر', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .box_comment_user:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'text_color_cat:hover',
            [
                'label' => esc_html__( 'هاور رنگ متن دسته بندی ', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .box_comment_cat:hover' => 'color: {{VALUE}}',
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

        <!-- start card shop  ->moh<- -->
        <div class="comment_slider">
            <div class="swiper_comment">
                <div class="swiper-wrapper">

                    <?php foreach ($settings['slider'] as $text) { ?>

                        <div class="swiper-slide">
                            <div class="box_comment">
                                <p class="box_comment_cop"> <?php echo $text ['item'] ?> </p>
                                <div class="box_comment_content d-flex">
                                    <div class="d-flex align-items-center">
                                        <a class="box_comment_user" href=""><?php echo $text['user'] ?></a>
                                        <a class="box_comment_cat" href=""><?php echo $text['category'] ?></a>
                                    </div>
                                    <a  href=""><img class="user_image" src="<?php echo $text['image']['url'] ?>"></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                const comment_slider = new Swiper('.swiper_comment', {
                    slidesPerView: 3,
                    
                });

            });
        </script>

        <!-- ind card shop  ->moh<- -->

        <!-- End rendering the output -->

<?php
    }
    protected function content_template()
    {
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new widget_custom_comment_slider());
