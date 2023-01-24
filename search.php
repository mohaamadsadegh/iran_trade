<?php get_header(); ?>
    <body id="bg_archives_articles">
<br><br><br><br>
<div class="container ">
    <div class="row">
        <div class="col-md-12  text-right">
            <div class="breadcrumbs-articles">
                <?php the_breadcrumb(); ?>

            </div>
        </div>
        <div class="row text-right">
            <div class="col-md-3">
                <div class="search-articles">
                    <?php dynamic_sidebar('searchform'); ?>
                </div>
            </div>
           
    
    <div class="container ">
        <div class="row">
            <div class="sidebar-article  col-md-3">
                <?php get_sidebar(); ?>
            </div>
            <div class="col-md-9">
				<div class="title-page-articles">
                    <h1><?php the_search_query(); ?></h1>
                </div>
                <div class="articles-box-search  d-flex">
                             <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <div class="box-article">
                                <div class="article ">
                                    <?php the_post_thumbnail('articlethumb'); ?>
                                    <h2><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 7); ?></a></h2>
                                    <p><?php the_excerpt(); ?></p>
                                    <div class="info-article d-flex">
                                        <div class="Date">
                                            <p> <?php the_time('j F Y') ?></p>
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
                       <?php endwhile;
                        else : ?>
                            <p><?php esc_html_e('متاسفانه محتوایی یافت نشد'); ?></p>
                        <?php endif; ?>

                </div>

                
            </div>

        </div>
    </div>
</div>



<?php get_footer(); ?>