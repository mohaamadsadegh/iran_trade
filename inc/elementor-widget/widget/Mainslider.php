<?php


add_action( 'elementor/widgets/widgets_registered', function( $widget_manager ) {
	class Business_slider extends \Elementor\Widget_Base {
		public function get_name() {
			return 'Business_slider';
		}

		public function get_title() {
			return __( 'Business slider', 'text-domain' );
		}
		
		public function get_icon()
		{
		  return 'eicon-product-add-to-cart';
		}
		
		public function get_categories()
		{
			return [ 'basic' ];
		}
		
		protected function _register_controls() {
			$this->start_controls_section(
				'section_icon',
				[
					'label' => __( 'Icon', 'text-domain' ),
				]
			);

			$this->add_control(
				'list',
				[
					'label' => esc_html__( 'Repeater List', 'textdomain' ),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => [
						[
							'name' => 'list_title',
							'label' => esc_html__( 'Title', 'textdomain' ),
							'type' => \Elementor\Controls_Manager::TEXT,
							'default' => esc_html__( 'List Title' , 'textdomain' ),
							'label_block' => true,
						],
						[
							'name' => 'list_content',
							'label' => esc_html__( 'Content', 'textdomain' ),
							'type' => \Elementor\Controls_Manager::WYSIWYG,
							'default' => esc_html__( 'List Content' , 'textdomain' ),
							'show_label' => false,
						],
						[
							'name' => 'list_color',
							'label' => esc_html__( 'Color', 'textdomain' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} {{CURRENT_ITEM}}' => 'color: {{VALUE}}'
							],
						]
					],
					'default' => [
						[
							'list_title' => esc_html__( 'Title #1', 'textdomain' ),
							'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'textdomain' ),
						],
						[
							'list_title' => esc_html__( 'Title #2', 'textdomain' ),
							'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'textdomain' ),
						],
					],
					'title_field' => '{{{ list_title }}}',
				]
			);

			$this->end_controls_section();
		}

		protected function render() {
			$settings = $this->get_settings_for_display();
			
			if ( $settings['list'] ) {
			echo '<dl>';
			?>
			  
            <div class="swiper-slide   slide-main">
                <div class="first-slider row">
                    <div class="col-md-5 sider-text-main">
                        <h1>راه اندازی حرفه ای و آسان</h1>
                        <h2>کـسـب‌ و کـار دیجـیتـال شما</h2>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                            چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.</p>
                        <div class="button-main">
                            <button class="help-button">جهت مشاوره کلیک کنید</button>
                        </div>
                    </div>
                    <div class="col-md-5 sider-img">
                        <img src="./assets/img/Rectangle 2713.png" alt="">
                    </div>

                </div>
            </div>

			<?php
			foreach (  $settings['list'] as $item ) {
				echo '<dt class="swiper-Widget' . esc_attr( $item['_id'] ) . '">' . $item['list_title'] . '</dt>';
				echo '<dd>' . $item['list_content'] . '</dd>';
			}
			echo '</dl>';
		}
			
		}

		protected function _content_template() {
			?>
			
			
			<?php
		}
	}
	// register widget
	$widget_manager->register_widget_type( new Business_slider() );
} );