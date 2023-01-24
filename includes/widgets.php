<?php
class searchform extends WP_Widget
{

    function __construct()
    {

        parent::__construct(false, 'searchform');
    }

    function widget($args, $instance)
    {

        echo $args['before_widget'];
        echo $args['before_title'];
        echo $instance['title'];
        echo $args['after_title'];
        ?>
        <div class="search-articles">
<form action="<?php echo home_url('/'); ?>" method="get" class="articles-search-form">

            
                <input type="text" class="archive-search-field" name="s" placeholder="<?php echo esc_attr_x('جستجو کنید', 'placeholder') ?>" value="<?php the_search_query(); ?>">
				<input type="hidden" value="post" name="post_type" id="post_type" />
                <button type="submit" name="button" class="button-searchform button">
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 21L19 19M10.5 20C11.7476 20 12.9829 19.7543 14.1355 19.2769C15.2881 18.7994 16.3354 18.0997 17.2175 17.2175C18.0997 16.3354 18.7994 15.2881 19.2769 14.1355C19.7543 12.9829 20 11.7476 20 10.5C20 9.25244 19.7543 8.0171 19.2769 6.86451C18.7994 5.71191 18.0997 4.66464 17.2175 3.78249C16.3354 2.90033 15.2881 2.20056 14.1355 1.72314C12.9829 1.24572 11.7476 1 10.5 1C7.98044 1 5.56408 2.00089 3.78249 3.78249C2.00089 5.56408 1 7.98044 1 10.5C1 13.0196 2.00089 15.4359 3.78249 17.2175C5.56408 18.9991 7.98044 20 10.5 20V20Z" stroke="#50598C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                </button>
           </form></div>

        <?php
        echo $args['after_widget'];
    }

    function update($new_instance, $old_instance)
    {

        $instance = [];
        $instance['title'] = !empty($new_instance['title']) ? sanitize_text_field($new_instance['title']) : '';
        return $instance;
    }

    function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : 'New title';
        ?>



        <?php

        return ' ';
    }
}

function register_Custom_widgetb()
{
    register_widget('searchform');
}

add_action('widgets_init', 'register_Custom_widgetb');


?>
<?php
class My_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'my-text',  // Base ID
            'Categoriesarticles'   // Name
        );
        add_action( 'widgets_init', function() {
            register_widget( 'My_Widget' );
        });
    }

    public $args = array(
        'before_title'  => '<h3 class="grouping-article">',
        'after_title'   => '</h3>',
        'before_widget' => '<div class="widget-wrap">',
        'after_widget'  => '</div></div>',
    );

    public function widget( $args, $instance ) {
		echo'<div class="grouping-article ">';
        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];

        }
      echo '<svg class="icon-article-svg " width="36" height="5" viewBox="0 0 36 5" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 1C1 1 3.19583 4.00338 5.20369 4C7.20684 3.99663 7.38945 1.00337 9.3926 1C11.4005 0.996622 11.5884 4 13.5963 4C15.6042 4 15.7921 0.996618 17.8 1C19.8031 1.00337 19.9858 3.99663 21.9889 4C23.9968 4.00338 24.1847 0.999998 26.1926 1C28.2005 1 28.3884 4 30.3963 4C32.4042 4 34.6 1 34.6 1" stroke="#28B992" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
        ';
        echo '</svg>';
		$the_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => '3')); ?>

        <?php if ($the_query->have_posts()) : $the_query->the_post();?>
           
<?php the_category(); ?>
   
        <?php else : ?>
       
       <?php endif; ?>
        <?php
        echo '</div>';
        echo $args['after_widget'];
		
    }


    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'text_domain' );
       ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>

        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance          = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
}
$my_widget = new My_Widget();
?>
<?php
class Latest_articles extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'Latest_articles',  // Base ID
            'Latestarticles'   // Name
        );
        add_action( 'widgets_init', function() {
            register_widget( 'Latest_articles' );
        });
    }

    public $args = array(
        'before_title'  => '<h3 >',
        'after_title'   => '</h3>',
        'before_widget' => '<div class="widget-wrap">',
        'after_widget'  => '</div></div>',
    );

    public function widget( $args, $instance ) {
        echo'<div class="Lately-article ">';
        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];

        }
        echo '<svg class="icon-article-svg " width="36" height="5" viewBox="0 0 36 5" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 1C1 1 3.19583 4.00338 5.20369 4C7.20684 3.99663 7.38945 1.00337 9.3926 1C11.4005 0.996622 11.5884 4 13.5963 4C15.6042 4 15.7921 0.996618 17.8 1C19.8031 1.00337 19.9858 3.99663 21.9889 4C23.9968 4.00338 24.1847 0.999998 26.1926 1C28.2005 1 28.3884 4 30.3963 4C32.4042 4 34.6 1 34.6 1" stroke="#28B992" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
        ';
        echo '</svg>';


        $the_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => '5')); ?>

        <?php if ($the_query->have_posts()) : ?>
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                <div class="">
                    <div class="side-article-2  d-flex">
                        <div class="side-article-box">
                            <?php the_post_thumbnail('articlethumb2'); ?>
                        </div>
                        <div class="info-article-box-2">
                            <a href="<?php the_permalink(); ?>">
                                <h4><?php echo wp_trim_words(get_the_title(), 7); ?>
                                </h4>
                            </a>
                            <p><?php echo get_the_date(); ?></p>
                        </div>
                    </div>
                </div>

                <hr class="Separator">
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>

        <?php else : ?>
            <p><?php _e('متاسفانه متنی وجود ندارد.'); ?></p>
        <?php endif; ?>
        <?php
        echo '</div>';
        echo $args['after_widget'];

    }


    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'text_domain' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>

        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance          = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
}
$my_widget = new Latest_articles();

?>
<?php
class search_form extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'search_form',  // Base ID
            'searchform'   
        );
        add_action( 'widgets_init', function() {
            register_widget( 'Latest_articles' );
        });
    }

    public $args = array(
        'before_title'  => '<h3 class="Lately-article">',
        'after_title'   => '</h3>',
        'before_widget' => '<div class="widget-wrap">',
        'after_widget'  => '</div>',
    );

    public function widget( $args, $instance ) {
        echo'<div class="search-articles">';
        echo $args['before_widget'];?>
        <form action="<?php echo home_url('/'); ?>" method="get" class="articles-search-form">

            <form action="<?php echo home_url('/'); ?>" method="get" class="articles-search-form">
                <input type="text" class="archive-search-field" name="s" placeholder="<?php echo esc_attr_x('جستجو کنید', 'placeholder') ?>" value="<?php echo get_search_query()?>">
                <button type="submit" name="button" class="button-searchform button">
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 21L19 19M10.5 20C11.7476 20 12.9829 19.7543 14.1355 19.2769C15.2881 18.7994 16.3354 18.0997 17.2175 17.2175C18.0997 16.3354 18.7994 15.2881 19.2769 14.1355C19.7543 12.9829 20 11.7476 20 10.5C20 9.25244 19.7543 8.0171 19.2769 6.86451C18.7994 5.71191 18.0997 4.66464 17.2175 3.78249C16.3354 2.90033 15.2881 2.20056 14.1355 1.72314C12.9829 1.24572 11.7476 1 10.5 1C7.98044 1 5.56408 2.00089 3.78249 3.78249C2.00089 5.56408 1 7.98044 1 10.5C1 13.0196 2.00089 15.4359 3.78249 17.2175C5.56408 18.9991 7.98044 20 10.5 20V20Z" stroke="#50598C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                </button>
            </form></form><?php
        echo $args['after_widget'];

    }


    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'text_domain' );
        ?>
        
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance          = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
}
$my_widget = new search_form();


?><?php
class searchformsingle extends WP_Widget
{

    function __construct()
    {

        parent::__construct(false, 'searchformsingle');
    }

    function widget($args, $instance)
    {

        echo $args['before_widget'];
        echo $args['before_title'];
        echo $instance['title'];
        echo $args['after_title'];
        ?>
        <div class="search-single">
<form action="<?php echo home_url('/'); ?>" method="get" class="articles-search-form">

            
                <input type="text" class="archive-search-field" name="s" placeholder="<?php echo esc_attr_x('جستجو کنید', 'placeholder') ?>" value="<?php the_search_query(); ?>">
				<input type="hidden" value="post" name="post_type" id="post_type" />
                <button type="submit" name="button" class="button-searchform button">
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 21L19 19M10.5 20C11.7476 20 12.9829 19.7543 14.1355 19.2769C15.2881 18.7994 16.3354 18.0997 17.2175 17.2175C18.0997 16.3354 18.7994 15.2881 19.2769 14.1355C19.7543 12.9829 20 11.7476 20 10.5C20 9.25244 19.7543 8.0171 19.2769 6.86451C18.7994 5.71191 18.0997 4.66464 17.2175 3.78249C16.3354 2.90033 15.2881 2.20056 14.1355 1.72314C12.9829 1.24572 11.7476 1 10.5 1C7.98044 1 5.56408 2.00089 3.78249 3.78249C2.00089 5.56408 1 7.98044 1 10.5C1 13.0196 2.00089 15.4359 3.78249 17.2175C5.56408 18.9991 7.98044 20 10.5 20V20Z" stroke="#50598C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                </button>
           </form></div>

        <?php
        echo $args['after_widget'];
    }

    function update($new_instance, $old_instance)
    {

        $instance = [];
        $instance['title'] = !empty($new_instance['title']) ? sanitize_text_field($new_instance['title']) : '';
        return $instance;
    }

    function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : 'New title';
        ?>



        <?php

        return ' ';
    }
}

function register_Custom_widgeti()
{
    register_widget('searchformsingle');
}

add_action('widgets_init', 'register_Custom_widgeti');


?>