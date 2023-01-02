<?php

/*
    Template Name: archives-articles
*/ ?>
<?php get_header(); ?>

<body id="bg_archives_articles">



    <br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-12  text-right">
                <div class="breadcrumbs-articles">
                    <span>
                        <a href="#" class="articles-breadcrumbs-link">
                            <span>صفحه اصلی</span>
                        </a>
                    </span>
                    <span class="articles-beadcrumbs-separator">></span>
                    <span class="articles-breadcrumbs-current">آرشیو مقالات</span>
                </div>
            </div>
        </div>
        <div class="row text-right">
            <div class="col-md-3">
                <div class="search-articles">
                    <?php get_search_form(); ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="title-page-articles">
                    <h1><?= the_title(); ?></h1>
                </div>
            </div>
            <div class="col-md-6  filter-articles">
                <?php if (!is_category()) { ?>
                    <div class="nice-select">
                        <span class="current">فیلتربندی:</span>
                        <?php $current_page = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
                        <select class="filter_new_articles" onchange="location = this.value;">
                            <option <?php echo (isset($_GET['order']) && $_GET['order'] == 'DESC') ? 'selected' : ''; ?> value="<?php echo add_query_arg(array('order' => 'DESC'), $current_page); ?>">
                                جدیدترین ها
                            </option>
                            <option <?php echo (isset($_GET['order']) && $_GET['order'] == 'ASC') ? 'selected' : ''; ?> value="<?php echo add_query_arg(array('order' => 'ASC'), $current_page); ?>">
                                قدیمی ترین
                            </option>
                            <option <?php echo (isset($_GET['order']) && $_GET['order'] == 'post_views_count') ? 'selected' : ''; ?> value="<?php echo add_query_arg(array('order' => 'post_views_count'), $current_page); ?>">
                                پربازدید
                            </option>
                        </select>
                    </div>
                <?php } ?>
                <?php
                if (!is_category()) {
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $order = 'DESC';
                    $orderby = 'publish_date';
                    $meta_key = false;
                    if (isset($_GET['order']) && $_GET['order'] == 'post_views_count') {
                        $meta_key = 'post_views_count';
                        $order = false;
                        $orderby = 'meta_value_num';
                    }
                    if (isset($_GET['order']) && $_GET['order'] == 'ASC') {
                        $order = 'ASC';
                    }
                    if (isset($_GET['order']) && $_GET['order'] == 'DESC') {
                        $order = 'DESC';
                    }
                    $blog_archive = new WP_Query(array(
                        'post_type' => 'post',
                        'paged' => $paged,
                        'meta_key' => $meta_key,
                        'orderby' => $orderby,
                        'order' => $order,
                    ));
                    if ($blog_archive->have_posts()) { ?>
                        <div class="archive_content">

                        <?php } ?>
                    <?php } ?>

                        </div>
            </div>
        </div>
        <br><br><br><br>
        <div class="container ">
            <div class="row">
                <div class="sidebar-article col-md-3">
                    <?php get_sidebar(); ?>
                    <!-- <div class="grouping-article text-right">
                
                    <h3>دسته بندی مقالات
                        <svg width="36" height="5" viewBox="0 0 36 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1C1 1 3.19583 4.00338 5.20369 4C7.20684 3.99663 7.38945 1.00337 9.3926 1C11.4005 0.996622 11.5884 4 13.5963 4C15.6042 4 15.7921 0.996618 17.8 1C19.8031 1.00337 19.9858 3.99663 21.9889 4C23.9968 4.00338 24.1847 0.999998 26.1926 1C28.2005 1 28.3884 4 30.3963 4C32.4042 4 34.6 1 34.6 1" stroke="#28B992" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </h3>
                    <ul>
                        <li>دسته بندی 1</li>
                        <li>دسته بندی 2</li>
                        <li>دسته بندی 3</li>
                        <li>دسته بندی 4</li>
                        <li>دسته بندی 5</li>
                    </ul>
                </div>
                <div class="Lately-article text-right">
                    <h3>مقالات اخیر
                        <svg width="36" height="5" viewBox="0 0 36 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1C1 1 3.19583 4.00338 5.20369 4C7.20684 3.99663 7.38945 1.00337 9.3926 1C11.4005 0.996622 11.5884 4 13.5963 4C15.6042 4 15.7921 0.996618 17.8 1C19.8031 1.00337 19.9858 3.99663 21.9889 4C23.9968 4.00338 24.1847 0.999998 26.1926 1C28.2005 1 28.3884 4 30.3963 4C32.4042 4 34.6 1 34.6 1" stroke="#28B992" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </h3>
                    <div class="side-article  d-flex">
                        <div class="side-article-box">
                            <img src="./img/Rectangle 30 (3).png" alt="">
                        </div>
                        <div class="info-article-box">
                            <h4>لورم ایپسوم متن ساختگی با تولید </h4>
                            <p>1401/08/07</p>
                        </div>

                    </div>
                    <hr class="Separator">
                    <div class="side-article  d-flex">
                        <div class="side-article-box">
                            <img src="./img/Rectangle 30 (3).png" alt="">
                        </div>
                        <div class="info-article-box">
                            <h4>لورم ایپسوم متن ساختگی با تولید </h4>
                            <p>1401/08/07</p>
                        </div>
                    </div>
                    <hr class="Separator">
                    <div class="side-article  d-flex">
                        <div class="side-article-box">
                            <img src="./img/Rectangle 30 (3).png" alt="">
                        </div>
                        <div class="info-article-box">
                            <h4>لورم ایپسوم متن ساختگی با تولید </h4>
                            <p>1401/08/07</p>
                        </div>
                    </div>
                    <hr class="Separator">
                    <div class="side-article  d-flex">
                        <div class="side-article-box">
                            <img src="./img/Rectangle 30 (3).png" alt="">
                        </div>
                        <div class="info-article-box">
                            <h4>لورم ایپسوم متن ساختگی با تولید </h4>
                            <p>1401/08/07</p>
                        </div>
                    </div>
                    <hr class="Separator">
                    <div class="side-article  d-flex">
                        <div class="side-article-box">
                            <img src="./img/Rectangle 30 (3).png" alt="">
                        </div>
                        <div class="info-article-box">
                            <h4>لورم ایپسوم متن ساختگی با تولید </h4>
                            <p>1401/08/07</p>
                        </div>
                    </div>

                </div>
                <div class="advertising-banner">
                    <a href="#">
                        <img src="./img/Rectangle 75.png" alt="">
                    </a>
                </div> -->
                </div>
                <div class="col-md-9">
                    <div class="articles-box d-flex">
                        <?php
                        // the query
                        $the_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => '3')); ?>
                        <?php if ($the_query->have_posts()) : ?>
                            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                <div class="box-article">
                                    <div class="article ">
                                        <?php the_post_thumbnail('articlethumb'); ?>
                                        <h2><?php the_title(); ?></h2>
                                        <p><?php the_excerpt(); ?></p>
                                        <div class="info-article d-flex">
                                            <div class="Date">
                                                <p><?php echo get_the_date(); ?></p>
                                            </div>
                                            <div class="icon-article">
                                                <button>
                                                    <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 6H13M1 6L6 1M1 6L6 11" stroke="#6C76AB" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>

                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php else : ?>
                            <p><?php _e('متاسفانه متنی وجود ندارد.'); ?></p>
                        <?php endif; ?>


                    </div>
                    <div class="articles-box d-flex">
                        <?php
                        // the query
                        $the_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => '3')); ?>
                        <?php if ($the_query->have_posts()) : ?>
                            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                <div class="box-article">
                                    <div class="article ">
                                        <?php the_post_thumbnail('articlethumb'); ?>
                                        <h2><?php the_title(); ?></h2>
                                        <p><?php the_excerpt(); ?> </p>
                                        <div class="info-article d-flex">
                                            <div class="Date">
                                                <p><?php echo get_the_date(); ?></p>
                                            </div>
                                            <div class="icon-article">
                                                <button>
                                                <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 6H13M1 6L6 1M1 6L6 11" stroke="#6C76AB" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php else : ?>
                            <p><?php _e('متاسفانه متنی وجود ندارد.'); ?></p>
                        <?php endif; ?>


                    </div>
                    <div class="articles-box d-flex">
                        <?php
                        // the query
                        $the_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => '3')); ?>
                        <?php if ($the_query->have_posts()) : ?>
                            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                <div class="box-article">
                                    <div class="article ">
                                        <?php the_post_thumbnail('articlethumb'); ?>
                                        <h2><?php the_title(); ?></h2>
                                        <p><?php the_excerpt(); ?> </p>
                                        <div class="info-article d-flex">
                                            <div class="Date">
                                                <p><?php echo get_the_date(); ?></p>
                                            </div>
                                            <div class="icon-article">
                                                <button>
                                                <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 6H13M1 6L6 1M1 6L6 11" stroke="#6C76AB" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php else : ?>
                            <p><?php _e('متاسفانه متنی وجود ندارد.'); ?></p>
                        <?php endif; ?>


                    </div>
                    <div class="articles-box d-flex">
                        <?php
                        // the query
                        $the_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => '3')); ?>
                        <?php if ($the_query->have_posts()) : ?>
                            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                <div class="box-article">
                                    <div class="article ">
                                        <?php the_post_thumbnail('articlethumb'); ?>
                                        <h2><?php the_title(); ?></h2>
                                        <p><?php the_excerpt(); ?> </p>
                                        <div class="info-article d-flex">
                                            <div class="Date">
                                                <p><?php echo get_the_date(); ?></p>
                                            </div>
                                            <div class="icon-article">
                                                <button>
                                                <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 6H13M1 6L6 1M1 6L6 11" stroke="#6C76AB" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php else : ?>
                            <p><?php _e('متاسفانه متنی وجود ندارد.'); ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="row">
                        <div class="col-md-6 page-numbers-articles">
                            <div class="col-md-2 page-numbers">
                                <p>صفحه قبلی</p>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>


    <br><br><br><br>





</body>

</html>