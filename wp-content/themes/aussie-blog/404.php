<?php
/**
 * Template Name: 404
 */
?>

<?php get_header(); ?>


    <section class="aussie-casino-404__blog-menu_wrap">
        <div class="aussie-casino-404__blog-menu">
            <div class="aussie-casino__blog-menu_container">
                <div class="aussie-casino__blog-menu_wrap-left">
                    <div class="aussie-casino__blog-menu_logo">
                        <a itemprop="url" href="<?php echo home_url(); ?>">

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
        </div>
    </section>

    <div class="aussie-casino-404__blog-menu-mobile--wrap">
        <?php get_template_part('includes/inc', 'blog-menu-mobile'); ?>
    </div>

    <section class="aussie-casino-404__error">
        <div class="aussie-casino-404__error_wrap">
            <div class="aussie-casino-404__error_container">
                <p class="aussie-casino-404__error_text">Error code: 404</p>
                <img src="<?php bloginfo('template_url'); ?>/img/cat-404.svg" alt="<?php bloginfo('name'); ?>"
                     class="aussie-casino-404__error_cat"/>
                <img src="<?php bloginfo('template_url'); ?>/img/aussie-right.svg" alt="<?php bloginfo('name'); ?>"
                     class="aussie-casino-404__error_aussie"/>
                <h2>Ooooops, the page moved or doesn't exist</h2>
                <div class="aussie-casino-404__error_btn--wrap">
                    <a href="/blog" class="aussie-casino-404__error_btn">
                        <span>Main page</span>
                    </a>
                    <button class="aussie-casino-404__error_btn--prev" onclick="prevPage();">Previous page</button>
                </div>
            </div>
        </div>
    </section>


<?php get_footer(); ?>