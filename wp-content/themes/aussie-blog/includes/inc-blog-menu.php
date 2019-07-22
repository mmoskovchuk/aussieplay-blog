
<section class="aussie-casino__blog-menu">
    <div class="aussie-casino__blog-menu_container">
        <div class="aussie-casino__blog-menu_logo">
            <a itemprop="url" href="<?php echo home_url(); ?>">
                <img itemprop="logo" src="<?php bloginfo('template_url'); ?>/img/logo.svg" alt="<?php bloginfo('name'); ?>"/>
            </a>
        </div>
        <div class="aussie-casino__blog-menu_url">/ blog</div>
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

        <div class="aussie-casino__blog-menu_search">
            <div class="aussie-casino__blog-menu_search-wrap">
                <!--<form class="aussie-casino__blog-menu_search-form">
                    <input class="search-field" placeholder="Search..." type="text"/>
                </form>-->
            </div>
        </div>
        <span id="blog-search" class="aussie-casino__blog-menu_search-btn">
            <img src="<?php bloginfo('template_url'); ?>/img/search.svg" alt="<?php bloginfo('name'); ?>"/>
        </span>

    </div>
</section>
<div class="background-overlay"></div>