
<header class="aussie-casino__header" id="header-block">
    <div class="container aussie-casino__wrapper">
            <a class="aussie-casino__btn" href="/">
                <span>Go to casino</span>
            </a>
        <?php
        $nav_args = array(
            'menu' => 'top-menu',
            'container' => 'nav',
            'menu_id' => 'top-menu',
            'depth' => 4
        );
        wp_nav_menu($nav_args);
        ?>
    </div>
</header>