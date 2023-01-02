<form action="<?php echo home_url('/'); ?>" method="get" class="articles-search-form" >
    <input type="text" class="archive-search-field" name="s" placeholder="<?php echo esc_attr_x( 'جستجو کنید' , 'placeholder') ?>" value="<?php the_search_query(); ?>">
    <button type="submit" name="button" class="button">
        <img src="./img/Vector.1.svg" alt="">
    </button>
</form>
