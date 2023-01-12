<?php

/*
    Template Name: archives-articles
*/ ?>
<?php get_header(); ?>
<?php the_content(); ?>

<body id="bg_archives_articles">
    <br><br><br><br>
    <div class="container ">
        <div class="row">
            <div class="col-md-12  text-right">
                <div class="breadcrumbs-articles">
                    <?php the_breadcrumb(); ?>
                </div>
            </div>
        </div>
        <div class="row text-right">
            <div class="col-md-3">
                <div class="search-articles">
                    <?php dynamic_sidebar('searchform'); ?>
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
            </div>


        </div>
    </div>
    <br><br><br><br>
    <div class="container ">
        <div class="row">
            <div class="sidebar-article col-md-3">
                <?php get_sidebar(); ?>
            </div>
            <div class="col-md-9">
                <div class="articles-box d-flex">

                    <?php

                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $order = 'DESC';
                    $orderby = 'publish_date';

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
                    // the query
                    $the_query = new WP_Query(array(
                        'post_type' => 'post',
                        'paged' => $paged,
                        'orderby' => $orderby,
                        'order' => $order,
                    )); ?>
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
                                                <a href="<?php the_permalink(); ?>">
                                                    <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 6H13M1 6L6 1M1 6L6 11" stroke="#6C76AB" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>

                                                </a>
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
                <div class="pagenumbers mt-9 flex w-full justify-center">
                    <?php the_posts_pagination(array(
                        'mid_size' => 5,
                        'prev_text' => __('صفحه قبلی', 'textdomain'),
                        'next_text' => __('صفحه بعدی', 'textdomain'),
                    )); ?>

                </div>
            </div>
        </div>
    </div>


    <?php get_footer(); ?>