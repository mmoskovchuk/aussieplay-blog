<section class="aussie-casino__blog-menu-mobile" id="blog-menu-mobile">
    <div class="aussie-casino__blog-menu-mobile_container">
        <div class="aussie-casino__blog-menu-mobile_wrap-left">
            <div class="aussie-casino__blog-menu-mobile_logo">
                <a itemprop="url" href="<?php echo home_url(); ?>">
                    <img itemprop="logo" src="<?php bloginfo('template_url'); ?>/img/logo-mobile.svg"
                         alt="<?php bloginfo('name'); ?>"/>
                </a>
            </div>
        </div>
        <div class="aussie-casino__blog-menu-mobile_wrap-right">
            <div class="button_container" id="toggle">
                <span class="top"></span>
                <span class="middle"></span>
                <span class="bottom"></span>
            </div>
            <div class="overlay" id="overlay">
                <nav class="overlay-menu">
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
                    <div class="aussie-casino__blog-menu-mobile_search">
                        <div class="aussie-casino__blog-menu_search-wrap"><form role="search" method="get" id="searchform" class="aussie-casino__blog-menu_search-form"><input class="aussie-casino__blog-menu_search-field" maxlength="80" placeholder="" type="text" value="" name="s" id="s"/>
                                <div id="blog-search" class="aussie-casino__blog-menu-mobile_search-btn">
                                    <img src="<?php bloginfo('template_url'); ?>/img/search.svg" alt="<?php bloginfo('name'); ?>"/>
                                </div>
                            </form></div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>