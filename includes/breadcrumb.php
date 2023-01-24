<?php 
//  Start the breadcrumb
function the_breadcrumb()
{

    $sep = ' <svg width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5.33325 1.66675L1.33325 5.66675L5.33325 9.66675" stroke="#929AC1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg> ';

    if (!is_front_page()) {

        // Start the breadcrumb with a link to your homepage
        echo '<div class="breadcrumbs">';
        echo '<a href="';
        echo get_option('home');
        echo '">';
        bloginfo('name');
        echo '</a>' . $sep;



        // If the current page is a single post, show its title with the separator
        if (is_single()) {

            echo '<a href="';
            echo get_option('single');
            echo '">';
            echo the_title();
            echo '</a>';
        }

        // If the current page is a static page, show its title.
        if (is_page()) {


            echo '<a class="br-page';
            echo get_option('page');
            echo '">';
            echo the_title();
            echo '</a>';
        }

        // if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
        if (is_home()) {
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ($page_for_posts_id) {
                $post = get_post($page_for_posts_id);
                setup_postdata($post);
                the_title();
                rewind_posts();
            }
        }

        echo '</div>';
    }
}