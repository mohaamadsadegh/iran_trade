<div class="container sidebar-Archives-articles">
    <div class="row">
        <div class="sidebar-article col-md-3">
            <aside>
                <div class="grouping-article ">
                    <h3>دسته بندی مقالات
                        <?php dynamic_sidebar('leftsidebar'); ?>
                    </h3>
                </div>
                <div class="Lately-article text-right">
                    <h3>مقالات اخیر
                        <svg width="36" height="5" viewBox="0 0 36 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1C1 1 3.19583 4.00338 5.20369 4C7.20684 3.99663 7.38945 1.00337 9.3926 1C11.4005 0.996622 11.5884 4 13.5963 4C15.6042 4 15.7921 0.996618 17.8 1C19.8031 1.00337 19.9858 3.99663 21.9889 4C23.9968 4.00338 24.1847 0.999998 26.1926 1C28.2005 1 28.3884 4 30.3963 4C32.4042 4 34.6 1 34.6 1" stroke="#28B992" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </h3>
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