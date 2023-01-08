<?php
class Latestarticles extends WP_Widget
{

    function __construct()
    {

        parent::__construct(false, 'Latestarticles');
    }

    function widget($args, $instance)
    {

        echo $args['before_widget'];
        echo $args['before_title'];
        echo $instance['title'];
        echo $args['after_title'];
?><?php
            // the query
            $the_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => '5')); ?>
<?php if ($the_query->have_posts()) : ?>
    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
        <div class="">
            <div class="side-article-2  d-flex">
                <div class="side-article-box">
                    <?php the_post_thumbnail('articlethumb2'); ?>

                </div>
                <div class="info-article-box-2">
                    <h4><?php the_title(); ?></h4>
                    <p><?php echo get_the_date(); ?></p>
                </div>
            </div>
        </div>
        <hr class="Separator">
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
<?php else : ?>
    <p><?php _e('متاسفانه متنی وجود ندارد.'); ?></p>
    <?php endif; ?><?php

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

            function register_Custom_widgett()
            {
                register_widget('Latestarticles');
            }

            add_action('widgets_init', 'register_Custom_widgett');

?>

<?php
class Categoriesarticles extends WP_Widget
{

    function __construct()
    {

        parent::__construct(false, 'Categoriesarticles');
    }

    function widget($args, $instance)
    {


        echo $args['before_widget'];
        echo $args['before_title'];
        echo $instance['title'];
        echo $args['after_title'];
        // echo $title ->display_name;
?>
        <?php
        // the query
        $the_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => '3')); ?>
        <?php if ($the_query->have_posts()) : ?>
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <div class="side-article  d-flex">

                    <div class="info-article-box">
                        <h4><?php the_category(); ?></h4>

                    </div>
                </div>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p><?php _e('متاسفانه متنی وجود ندارد.'); ?></p>
            <?php endif; ?><?php
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

                    function register_Custom_widget()
                    {
                        register_widget('Categoriesarticles');
                    }

                    add_action('widgets_init', 'register_Custom_widget');

    ?>
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
            <form action="<?php echo home_url('/'); ?>" method="get" class="articles-search-form">
                <input type="text" class="archive-search-field" name="s" placeholder="<?php echo esc_attr_x('جستجو کنید', 'placeholder') ?>" value="<?php the_search_query(); ?>">
                <button type="submit" name="button" class="button">
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 21L19 19M10.5 20C11.7476 20 12.9829 19.7543 14.1355 19.2769C15.2881 18.7994 16.3354 18.0997 17.2175 17.2175C18.0997 16.3354 18.7994 15.2881 19.2769 14.1355C19.7543 12.9829 20 11.7476 20 10.5C20 9.25244 19.7543 8.0171 19.2769 6.86451C18.7994 5.71191 18.0997 4.66464 17.2175 3.78249C16.3354 2.90033 15.2881 2.20056 14.1355 1.72314C12.9829 1.24572 11.7476 1 10.5 1C7.98044 1 5.56408 2.00089 3.78249 3.78249C2.00089 5.56408 1 7.98044 1 10.5C1 13.0196 2.00089 15.4359 3.78249 17.2175C5.56408 18.9991 7.98044 20 10.5 20V20Z" stroke="#50598C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                </button>
            </form><?php
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