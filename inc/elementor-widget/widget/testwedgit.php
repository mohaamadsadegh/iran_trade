<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
class widget_custom_search extends Elementor\Widget_Base{
   
    public function get_name(){
    return 'search';
   }

   public function get_title(){
    return esc_html__('search' , 'textdomain');
   }
   public function get_icon(){
    return 'eicon-site-search';
   }
   public function get_custom_help_uri(){
   return 'https://essentialwebapps.com/category/elementor-tutorial/'; 
   }
   public function get_categories(){
        return ['themsah'];
   }
   public function get_keywords()
   {
    [ 'card' , 'servis' ];
   }
   public function register_controls(){
    $this-> start_controls_section(
        'title_section',
        [
            'label'=>'پاپ آپ',
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );
  
    $this->add_control(
        'widget_title',
        [
            'label' => esc_html__( 'متن دکمه', 'textdomain' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__( 'جستجو', 'textdomain' ),
            'placeholder' => esc_html__( 'جستجو', 'textdomain' ),
        ]
    );
    $this->add_control(
        'text_color',
        [
            'label' => esc_html__( 'رنگ متن', 'textdomain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .search_form_btn' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'text_color_hover',
        [
            'label' => esc_html__( 'هاور رنگ متن', 'textdomain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .search_form_btn:hover' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'background',
            'types' => [ 'classic', 'gradient', 'video' ],
            'selector' => '{{WRAPPER}} .search_form_btn',
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'background_hover',
            'types' => [ 'classic', 'gradient', 'video' ],
            'selector' => '{{WRAPPER}} .search_form_btn:hover',
        ]
    );
   
   
    $this->end_controls_section();

     // Tabs style Section    
     $this -> start_controls_section('tabs_style_section',
     [
         'label' => 'استایل دکمه',
         'tab'   => Elementor\Controls_Manager::TAB_STYLE,
     ]);
     $this->add_control(
        'icon',
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
    $this->add_group_control(
        \Elementor\Group_Control_Border::get_type(),
        [
            'label' => 'کادر',
            'name' => 'border',
            'selector' => '{{WRAPPER}} .search-btn',
        ]
    );
    $this->add_control(
        'more_options',
        [
            'label' => esc_html__( 'تنظیمات هاور', 'textdomain' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Border::get_type(),
        [
            'label' => 'هاور کادر',
            'name' => 'border_hover',
            'selector' => '{{WRAPPER}} .search-btn:hover',
        ]
    );
     $this->add_control(
        'text_color_icon',
        [
            'label' => esc_html__( 'رنگ ایکون', 'textdomain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .search-btn' => 'color: {{VALUE}}',
            ],
        ]
    );
  
    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'background_icon',
            'types' => [ 'classic', 'gradient', 'video' ],
            'selector' => '{{WRAPPER}} .search-btn',
        ]
    );
  
    $this->add_control(
        'more_options',
        [
            'label' => esc_html__( 'تنظیمات هاور', 'textdomain' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'label' => esc_html__( 'هاور متن ', 'textdomain' ),
            'name' => 'background_icon_hover',
            'types' => [ 'classic', 'gradient', 'video' ],
            'selector' => '{{WRAPPER}} .search-btn:hover',
        ]
    );
    $this->add_control(
        'text_color_icon_hover',
        [
            'label' => esc_html__( 'هاور ایکون', 'textdomain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .search-btn:hover' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Border::get_type(),
        [
            'label' => 'هاور کادر',
            'name' => 'border_hover',
            'selector' => '{{WRAPPER}} .search-btn:hover',
        ]
    );
    $this->end_controls_section();
   }
   


   

   protected function render() {


        // get our input from the widget settings.
        $settings = $this->get_settings_for_display();
     
	// get the individual values of the input


?>

        <!-- Start rendering the output -->
        <form class="header_search_form"  method="get" action="" >
           
           <!-- Button trigger modal -->
       <button type="button"  class="search-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
       <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
         </button>
         <!-- Modal -->
         <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog">
             <div class="modal-content">
               <div class="">
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <input type="text" placeholder="" value="" name="s"  value="">
               <div class="text-center pt-3">
                 <button type="button" class="search_form_btn"><?php echo $settings['widget_title'];  ?></button>
               </div>
             </div>
           </div>
         </div>
               </form>  
        <!-- End rendering the output -->

        <?php
   }
   protected function content_template() {}
  
}
Plugin::instance()->widgets_manager->register_widget_type( new widget_custom_search() );