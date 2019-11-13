<section class="aussie-casino__blog-menu-mobile">
    <div class="aussie-casino__blog-menu-mobile_container">
        <div class="aussie-casino__blog-menu-mobile_wrap-left">
            <div class="aussie-casino__blog-menu-mobile_logo">
                <a itemprop="url" href="<?php echo home_url(); ?>">
                    <img itemprop="logo" src="<?php bloginfo('template_url'); ?>/img/logo-mobile.svg"
                         alt="<?php bloginfo('name'); ?>"/>
                </a>
            </div>
        </div>
        <div class="menu-bg"></div>
        <div class="menu-burger"><div class="menu-burger-icon">☰</div></div>
        <div class="menu-items">
            <?php
            $nav_args = array(
                'menu' => 'blog-menu',
                'container' => 'nav',
                'menu_id' => 'blog-menu-mobile',
                'menu_class' => 'aussie-casino__blog-menu-mobile_ul-block',
                'depth' => 4
            );
            wp_nav_menu($nav_args);
            ?>
            <div class="aussie-casino__blog-menu-mobile_search"></div>
            <div id="blog-search" class="aussie-casino__blog-menu-mobile_search-btn">
                <img src="<?php bloginfo('template_url'); ?>/img/search.svg" alt="<?php bloginfo('name'); ?>"/>
            </div>
        </div>
    </div>
</section>