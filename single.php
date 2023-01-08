<?php

/*
    Template Name: archives-articles
*/ ?>
<?php get_header(); ?>

<body id="bg_archives_articles">

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
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-9  Single-articles d-flex">
                    <div class="articles-date-box col-md-2">
                        <div class="icon-date-Single">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 8H19M5 1V3M15 1V3M4.2 19H15.8C16.9201 19 17.4802 19 17.908 18.782C18.2843 18.5903 18.5903 18.2843 18.782 17.908C19 17.4802 19 16.9201 19 15.8V6.2C19 5.07989 19 4.51984 18.782 4.09202C18.5903 3.71569 18.2843 3.40973 17.908 3.21799C17.4802 3 16.9201 3 15.8 3H4.2C3.0799 3 2.51984 3 2.09202 3.21799C1.71569 3.40973 1.40973 3.71569 1.21799 4.09202C1 4.51984 1 5.07989 1 6.2V15.8C1 16.9201 1 17.4802 1.21799 17.908C1.40973 18.2843 1.71569 18.5903 2.09202 18.782C2.51984 19 3.07989 19 4.2 19Z" stroke="#929AC1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <p><?php echo get_the_date(); ?></p>
                    </div>
                    <div class="Visit-article col-md-10">
                        <div class="point-view-article d-flex">
                            <div class="icon-point-view">
                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 8H6.01M10 8H10.01M14 8H14.01M19 17L15.6757 15.3378C15.4237 15.2118 15.2977 15.1488 15.1656 15.1044C15.0484 15.065 14.9277 15.0365 14.8052 15.0193C14.6672 15 14.5263 15 14.2446 15H5.8C4.11984 15 3.27976 15 2.63803 14.673C2.07354 14.3854 1.6146 13.9265 1.32698 13.362C1 12.7202 1 11.8802 1 10.2V5.8C1 4.11984 1 3.27976 1.32698 2.63803C1.6146 2.07354 2.07354 1.6146 2.63803 1.32698C3.27976 1 4.11984 1 5.8 1H14.2C15.8802 1 16.7202 1 17.362 1.32698C17.9265 1.6146 18.3854 2.07354 18.673 2.63803C19 3.27976 19 4.11984 19 5.8V17Z" stroke="#929AC1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="Number-point-view">
                                <p>26دیدگاه</p>
                            </div>
                            <div class="Separator-vertical">
                                <svg width="1" height="24" viewBox="0 0 1 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <line x1="0.5" y1="2.18557e-08" x2="0.499999" y2="24" stroke="#DEDEDE" />
                                </svg>
                            </div>
                        </div>
                        <div class="Visit-article">
                            <div class="icon-Visit-article">
                                <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14 8C14 9.65685 12.6569 11 11 11C9.34315 11 8 9.65685 8 8C8 6.34315 9.34315 5 11 5C12.6569 5 14 6.34315 14 8Z" stroke="#929AC1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M11.0004 1C6.52281 1 2.73253 3.94288 1.45825 7.99997C2.73251 12.0571 6.52281 15 11.0005 15C15.4781 15 19.2684 12.0571 20.5426 8.00004C19.2684 3.94291 15.4781 1 11.0004 1Z" stroke="#929AC1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="Number-Visit-article">
                                <p><?php if (function_exists('the_views')) {
                                        the_views();
                                    } ?></p>
                            </div>
                            <div class="Separator-vertical">
                                <svg width="1" height="24" viewBox="0 0 1 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <line x1="0.5" y1="2.18557e-08" x2="0.499999" y2="24" stroke="#DEDEDE" />
                                </svg>
                            </div>
                        </div>
                        <div class="author-article d-flex">
                            <div class="icon-author-article">
                                <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 19C1 15.134 4.13401 12 8 12C8.33952 12 8.6734 12.0242 9 12.0709M12 5C12 7.20914 10.2091 9 8 9C5.79086 9 4 7.20914 4 5C4 2.79086 5.79086 1 8 1C10.2091 1 12 2.79086 12 5ZM9.58984 19L11.6148 18.595C11.7914 18.5597 11.8797 18.542 11.962 18.5097C12.0351 18.4811 12.1045 18.4439 12.1689 18.399C12.2414 18.3484 12.3051 18.2848 12.4324 18.1574L16.5898 14C17.1421 13.4477 17.1421 12.5523 16.5898 12C16.0376 11.4477 15.1421 11.4477 14.5898 12L10.4324 16.1574C10.3051 16.2848 10.2414 16.3484 10.1908 16.421C10.1459 16.4853 10.1088 16.5548 10.0801 16.6279C10.0478 16.7102 10.0302 16.7985 9.99484 16.975L9.58984 19Z" stroke="#929AC1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>

                            </div>
                            <div class="title-author-article">
                                <h3><?php the_author_link(); ?></h3>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="container ">
            <div class="row">
                <div class="sidebar-article col-md-3">
                    <?php get_sidebar(); ?>
                </div>
                <div class="col-md-9">
                    <div class="box-single-article ">
                        <div class="Photo-single-article">
                            <?php the_post_thumbnail('Singlearticle'); ?>
                        </div>
                        <div class="title-single-article">
                            <?php the_content(); ?>
                        </div>
                        <div class="Grouping-article d-flex">
                            <h3>دسته بندی:</h3>
                            <p><?php the_category(' ، '); ?></p>
                        </div>
                        <hr id="single-article ">
                        <div class="label-single-article d-flex">
                            <div>
                                <h3>برچسب :</h3>
                            </div>
                            <div class="label-single col-md-7 d-flex">
                                <p> <?php the_tags(' ', '') ?></p>
                            </div>

                            <div class="col-md-4 share-single-article">
                                <div class="share-article">
                                    <a href="#">
                                        اشتراک گذاری مقاله
                                    </a>
                                </div>
                                <div class=""><svg width="1" height="24" viewBox="0 0 1 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <line x1="0.5" y1="2.18557e-08" x2="0.499999" y2="24" stroke="#DEDEDE" />
                                    </svg></div>
                                <div class="icon-share-article"><svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.25 14C16.0537 14 15.0005 14.5709 14.3137 15.4433L7.31719 11.9656C7.44375 11.6141 7.5 11.3375 7.5 11C7.5 10.6625 7.44375 10.3438 7.31719 10.0344L14.2734 6.55672C15 7.42813 16.0547 8 17.25 8C19.3219 8 21 6.32188 21 4.25C21 2.17812 19.3219 0.5 17.25 0.5C15.1781 0.5 13.5 2.17906 13.5 4.25C13.5 4.58609 13.5584 4.90578 13.6414 5.21563L6.68438 8.69375C5.95781 7.82188 4.94531 7.25 3.75 7.25C1.67906 7.25 0 8.92813 0 11C0 13.0719 1.67906 14.75 3.75 14.75C4.94625 14.75 5.99953 14.1791 6.68625 13.3067L13.6425 16.7844C13.5563 17.0938 13.5 17.4125 13.5 17.75C13.5 19.8209 15.1791 21.5 17.25 21.5C19.3209 21.5 21 19.8209 21 17.75C21 15.6791 19.3219 14 17.25 14ZM17.25 2C18.4922 2 19.5 3.00922 19.5 4.25C19.5 5.49078 18.4922 6.5 17.25 6.5C16.0078 6.5 15 5.49219 15 4.25C15 3.00781 16.0078 2 17.25 2ZM3.75 13.25C2.50922 13.25 1.5 12.2422 1.5 11C1.5 9.75781 2.50922 8.75 3.75 8.75C4.99078 8.75 6 9.75781 6 11C6 12.2422 4.99219 13.25 3.75 13.25ZM17.25 20C16.0092 20 15 18.9908 15 17.75C15 16.5092 16.0092 15.5 17.25 15.5C18.4908 15.5 19.5 16.5092 19.5 17.75C19.5 18.9908 18.4922 20 17.25 20Z" fill="#929AC1" />
                                    </svg></div>
                            </div>
                        </div>

                    </div>
                    <div class="d-flex page-fore-single-article">
                        <div class="d-flex page-fore-single">
                            <div class="page-fore-single-icon">
                                <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.83325 8H18.1666M18.1666 8L11.1666 1M18.1666 8L11.1666 15" stroke="#50598C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>

                            </div>
                            <div class="page-fore-single-text">
                                <p>لورم ایپسوم متن ساختگی با تولید استفاده از ... </p>
                            </div>
                        </div>
                        <div class="d-flex page-next-single">
                            <div class="d-flex page-next-single-icon">
                                <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.83325 8H18.1666M18.1666 8L11.1666 1M18.1666 8L11.1666 15" stroke="#50598C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>

                            </div>
                            <div class="page-next-single-text">
                                <p>لورم ایپسوم متن ساختگی با تولید استفاده... </p>
                            </div>
                        </div>
                    </div>
                    <div class="comment-article">
                        <h3>دیدگاه ها</h3>
                        <div class="box-comment-article">
                            <div class="box-comment-single-article">
                                <div class="info-user d-flex">
                                    <img src="<?= get_template_directory_uri(); ?>./assets/img/user.jpg" alt="">
                                    <p>نام کاربری</p>
                                    <p>1401 / 08 / 07</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <br><br><br><br>





</body>

</html>