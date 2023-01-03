<div class="container sidebar-Archives-articles" >
    <div class="row">
        <div class="sidebar-article col-md-3">
        <aside>
            <div class="grouping-article ">
                    <h3>دسته بندی مقالات
                    <?php dynamic_sidebar( 'leftsidebar' ); ?>
                    
                    </h3>
            </div>
            <div class="Lately-article text-right">
                <h3>مقالات اخیر</h3>
                <?php
                    // the query
                    $the_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => '5')); ?>
                    <?php if ($the_query->have_posts()) : ?>
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <div class="side-article  d-flex">
                    <div class="side-article-box">
                    <?php the_post_thumbnail('articlethumb2'); ?>
                    </div>
                    <div class="info-article-box">
                        <h4><?php the_title(); ?></h4>
                        <p><?php echo get_the_date(); ?></p>
                    </div>
                </div>
                <hr class="Separator">
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php else : ?>
                        <p><?php _e('متاسفانه متنی وجود ندارد.'); ?></p>
                    <?php endif; ?>
                
            </div>
            <div class="advertising-banner">
                <a href="#">
                    <img src="./img/Rectangle 75.png" alt="">
                </a>
            </div>
        </aside>
        </div>
    </div>
</div>