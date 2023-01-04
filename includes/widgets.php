<?php
class CustomWidget extends WP_Widget
{

    function __construct()
    {

        parent::__construct(false, 'CustomWidget');
    }

    function widget($args, $instance)
    {
        $title=wp_get_current_user();
        echo $args['before_widget'];
        echo $args['before_title'];
        echo $instance['title'];
        echo $args['after_title'];
        echo $title ->display_name;
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
    register_widget('CustomWidget');
}

add_action('widgets_init', 'register_Custom_widget');

?>