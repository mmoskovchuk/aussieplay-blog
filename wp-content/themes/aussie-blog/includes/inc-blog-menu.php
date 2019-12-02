<section class="aussie-casino__blog-menu" id="blog-menu-wrap">
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
</section>