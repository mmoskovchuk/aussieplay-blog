<?php
/**
 * Template Name: 404
 */
?>

<?php get_header(); ?>


    <section class="aussie-casino-404__blog-menu">
        <div class="aussie-casino__blog-menu_container">
            <div class="aussie-casino__blog-menu_wrap-left">
                <div class="aussie-casino__blog-menu_logo">
                    <a itemprop="url" href="<?php echo home_url(); ?>">
                        <img itemprop="logo" src="<?php bloginfo('template_url'); ?>/img/logo.svg"
                             alt="<?php bloginfo('name'); ?>"/>
                    </a>
                </div>
                <div class="aussie-casino__blog-menu_url">/ blog</div>
            </div>
            <?php
            $nav_args = array(
                'menu' => 'blog-menu',
                'container' => 'nav',
                'menu_id' => 'blog-menu',
                'menu_class' => 'aussie-casino__blog-menu_ul-block',
                'depth' => 4
            );
            wp_nav_menu($nav_args);
            ?>

            <div class="aussie-casino__blog-menu_search"></div>
            <div id="blog-search" class="aussie-casino__blog-menu_search-btn">
                <img src="<?php bloginfo('template_url'); ?>/img/search.svg" alt="<?php bloginfo('name'); ?>"/>
            </div>
        </div>
    </section>



    <section class="aussie-casino__latest-articles">
        <div class="aussie-casino__latest-articles_wrap">
            <div class="aussie-casino__latest-articles_container">
                <h2>Ooooops, the page moved or doesn't exist</h2>
            </div>
        </div>
    </section>

<?php get_footer(); ?>