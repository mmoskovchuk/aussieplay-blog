<?php


//ADD NO INDEX, NOFOLLOW META TAG
//--------------------------------------------------
function noindex_meta_robots()
{
    if (is_paged()) {
        echo "" . '<meta name="robots" content="noindex,follow" />' . "\n";
    }
}

add_action('wp_head', 'noindex_meta_robots');


//REDIRECTS
//--------------------------------------------------
include_once('redirects.php');

add_action('init', 'add_Xrobots_tag');
function add_Xrobots_tag()
{
    if (is_page('')) {
        header('X-Robots-Tag: noindex,nofollow');
    }
}

//ADDING JS AND CSS FILES
//--------------------------------------------------
function ox_adding_scripts()
{
    if (!function_exists('is_login_page')) {
        function is_login_page()
        {
            return !strncmp($_SERVER['REQUEST_URI'], '/wp-login.php', strlen('/wp-login.php'));
        }
    }

    if (!is_admin() && !is_login_page()) {

        /*removed wp-embed.min.js*/
        wp_deregister_script('wp-embed');

        /*jquery*/
        wp_deregister_script('jquery');
        wp_register_script('jquery', ("//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"), false, null, true);
        wp_enqueue_script('jquery');

        /*custom js*/
        wp_enqueue_script('custom', get_template_directory_uri() . '/js/scripts.min.js?ver=1.2', array('jquery'), null, true);

        /*velocity*/
        wp_enqueue_script('velocity', get_template_directory_uri() . '/js/libs/velocity.min.js', array(), null, true);
        /*velocity ui*/
        wp_enqueue_script('velocity-ui', get_template_directory_uri() . '/js/libs/velocity.ui.min.js', array(), null, true);
        /*swiper*/
        wp_enqueue_script('swiper', get_template_directory_uri() . '/js/libs/swiper.min.js', array(), null, true);
        /*mixitup*/
        wp_enqueue_script('mixitup', get_template_directory_uri() . '/js/libs/jquery.mixitup.min.js', array(), null, true);
        /*ajax wp*/
        wp_localize_script('custom', 'my_ajax_object',
            array('ajax_url' => admin_url('admin-ajax.php')));

        wp_localize_script( 'custom', 'ajax_posts', array(
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'noposts' => __('No older posts found', ''),
        ));

        $site_data = array(
            'template_url' => get_template_directory_uri()
        );

        wp_localize_script('custom', 'site_data', $site_data);

        if (!is_page(array('', ''))) {
            /*swiper css*/
            wp_enqueue_style('swiper', get_template_directory_uri() . '/css/libs/swiper.min.css', array(), null);
            /*custom css*/
            wp_enqueue_style('custom', get_template_directory_uri() . '/css/style.min.css?ver=1.6', array(), null);

        }

    }

    $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

}

add_action('wp_enqueue_scripts', 'ox_adding_scripts');

//#asyncload
function ox_async_scripts($url)
{
    if (strpos($url, '#asyncload') === false)
        return $url;
    else if (is_admin())
        return str_replace('#asyncload', '', $url);
    else
        return str_replace('#asyncload', '', $url) . "' async='async";
}

add_filter('clean_url', 'ox_async_scripts', 11, 1);


//REWOVE SOME META TAGS AND UNNECESSARY LINKS
//--------------------------------------------------
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_shortlink_wp_head', 10);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');

//remove wp-json
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);

//REMOVE LOGIN-PAGE ERRORS
//--------------------------------------------------
add_filter('login_errors', create_function('$a', "return null;"));

//REGISTRATION MENU
//--------------------------------------------------
register_nav_menus(array(
    'top-menu' => 'TopMenu',
    'blog-menu' => 'BlogMenu',
    'footer' => 'FooterMenu',
));

//ENABLE THUMBNAILS (posts preview img)
//--------------------------------------------------
add_theme_support('post-thumbnails');
set_post_thumbnail_size(400, 260, true);

//ENABLE POSTS PREVIEW
//--------------------------------------------------
function the_truncated_post($symbol_amount)
{
    $filtered = strip_tags(preg_replace('@<style[^>]*?>.*?</style>', '', preg_replace('@<script[^>]*?>.*?</script>', '', apply_filters('the_content', get_the_content()))));
    echo substr($filtered, 0, strrpos(substr($filtered, 0, $symbol_amount), ' ')) . '...';
}


//TIME AGO
//--------------------------------------------------

add_filter('the_time', 'human_time_diff_enhanced');

function human_time_diff_enhanced($duration = 60)
{

    $post_time = get_the_time('U');
    $human_time = '';

    $time_now = date('U');

    // use human time if less that $duration days ago (60 days by default)
    // 60 seconds * 60 minutes * 24 hours * $duration days
    if ($post_time > $time_now - (60 * 60 * 24 * $duration)) {
        $human_time = sprintf(__('%s ago', 'binarymoon'), human_time_diff($post_time, current_time('timestamp')));
    } else {
        $human_time = get_the_date('d M, Y');
    }

    return $human_time;

}

//SEARCH ONLY POSTS
//--------------------------------------------------
function SearchFilter($query)
{
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}

add_filter('pre_get_posts', 'SearchFilter');


// POSTVIEWS
//--------------------------------------------------
add_action('wp_head', 'kama_postviews');
function kama_postviews() {

    /* ------------ Настройки -------------- */
    $meta_key       = 'views';  // Ключ мета поля, куда будет записываться количество просмотров.
    $who_count      = 1;            // Чьи посещения считать? 0 - Всех. 1 - Только гостей. 2 - Только зарегистрированных пользователей.
    $exclude_bots   = 1;            // Исключить ботов, роботов, пауков и прочую нечесть :)? 0 - нет, пусть тоже считаются. 1 - да, исключить из подсчета.

    global $user_ID, $post;
    if(is_singular()) {
        $id = (int)$post->ID;
        static $post_views = false;
        if($post_views) return true; // чтобы 1 раз за поток
        $post_views = (int)get_post_meta($id,$meta_key, true);
        $should_count = false;
        switch( (int)$who_count ) {
            case 0: $should_count = true;
                break;
            case 1:
                if( (int)$user_ID == 0 )
                    $should_count = true;
                break;
            case 2:
                if( (int)$user_ID > 0 )
                    $should_count = true;
                break;
        }
        if( (int)$exclude_bots==1 && $should_count ){
            $useragent = $_SERVER['HTTP_USER_AGENT'];
            $notbot = "Mozilla|Opera"; //Chrome|Safari|Firefox|Netscape - все равны Mozilla
            $bot = "Bot/|robot|Slurp/|yahoo"; //Яндекс иногда как Mozilla представляется
            if ( !preg_match("/$notbot/i", $useragent) || preg_match("!$bot!i", $useragent) )
                $should_count = false;
        }

        if($should_count)
            if( !update_post_meta($id, $meta_key, ($post_views+1)) ) add_post_meta($id, $meta_key, 1, true);
    }
    return true;
}


//FILTER Aussie Explores AND Games and Promotions
//--------------------------------------------------


add_action('wp_ajax_myfilter', 'filter_function_show_category');
add_action('wp_ajax_nopriv_myfilter', 'filter_function_show_category');


function filter_function_show_category() {
//home page
    $args_winning_guides = array(
        //'rewrite' => array( 'hierarchical' => 'true' ),
        'orderby' => 'date',
        'order' => $_POST['date'], // ASC or DESC
        'posts_per_page' => 3,
        'post_status' => 'publish',
    );
    $args_games_reviews = array(
        'orderby' => 'date',
        'order' => $_POST['date'], // ASC or DESC
        'posts_per_page' => 8,
        'post_status' => 'publish',
    );

//home page
    $args_winning_guides['tax_query'] = array(
        array(
            //'rewrite' => array( 'hierarchical' => 'true' ),
            'taxonomy' => 'category',
            'field' => '',
            'terms' => $_POST['categoryfilter'],
            'posts_per_page' => 3,
            'post_status' => 'publish',
        )
    );

    $args_games_reviews['tax_query'] = array(
        array(
            'taxonomy' => 'category',
            'field' => '',
            'terms' => $_POST['categoryfiltergames'],
            'posts_per_page' => 3,
            'post_status' => 'publish',
        )
    );

//category
    $args_incategory = array(
        'posts_per_page' => 50,
        'post_type' => 'post',
        'orderby' => 'rand',
        'order' => 'rand',
        'post_status' => 'publish',
    );

    $args_incategory['tax_query'] = array(
        array(
            'taxonomy' => 'category',
            'field' => 'term_id',
            'terms' => $_POST['incategoryfilter'],
        )
    );


    $the_query_winning_guides = new WP_Query($args_winning_guides);

    while ($the_query_winning_guides->have_posts()) {
        $the_query_winning_guides->the_post();
        echo '<article class="aussie-casino__winning-guides_post--item"><div class="aussie-casino__winning-guides_wrap--img"><a href="' . get_permalink() . '"><img src="' . get_the_post_thumbnail_url($the_query_winning_guides->ID, 'full') . '" alt="' . get_the_title() . '"></a><span class="aussie-casino__winning-guides_date"><b>' . human_time_diff_enhanced() . '</b></span></div><a href=" ' . get_permalink() . ' ">' . get_the_title() . '</a></article>';
    }

    wp_reset_postdata();

    $the_query_games_reviews = new WP_Query($args_games_reviews);
    $i = 1;
    if ($the_query_games_reviews->have_posts()) {
        while ($the_query_games_reviews->have_posts()) :
            $the_query_games_reviews->the_post();

            if ($i == 1) {
                echo '<div class="aussie-casino__games-reviews_post--item-wrap1">';
            }

            if ($i < 3) {

                echo '<article class="aussie-casino__games-reviews_post--item aussie-casino__games-reviews_post--item-' . $i . '" data-filter="game-reviews" id="filter-games-' . $i . '"><div class="aussie-casino__games-reviews_wrap--img"><a href="' . get_permalink() . '"><img src="' . get_the_post_thumbnail_url($the_query_games_reviews->ID, 'full') . '" alt="' . get_the_title() . '"></a><span class="aussie-casino__games-reviews_date"><b>' . human_time_diff_enhanced() . '</b></span></div><a href=" ' . get_permalink() . ' " class="aussie-casino__games-reviews_link">' . get_the_title() . '</a></article>';

            }

            if ($i == 3) {
                echo '</div><div class="aussie-casino__games-reviews_post--item-wrap2">';
            }

            if ($i >= 3) {

                echo '<article class="aussie-casino__games-reviews_post--item aussie-casino__games-reviews_post--item-' . $i . '" data-filter="game-reviews" id="filter-games-' . $i . '"><div class="aussie-casino__games-reviews_wrap--img"><a href="' . get_permalink() . '"><img src="' . get_the_post_thumbnail_url($the_query_games_reviews->ID, 'full') . '" alt="' . get_the_title() . '"></a><span class="aussie-casino__games-reviews_date"><b>' . human_time_diff_enhanced() . '</b></span></div><a href=" ' . get_permalink() . ' " class="aussie-casino__games-reviews_link">' . get_the_title() . '</a></article>';

            }

            if ($i == 5) {
                echo '</div><div class="aussie-casino__games-reviews_post--item-wrap3">';
            }

            if (end($i)) {
                echo '</div>';
            }

            $i++;

        endwhile;

    }

    wp_reset_postdata();

//in category

    $the_query_incategory = new WP_Query($args_incategory);
    global $user_ID, $post;
    if ($the_query_incategory->have_posts()) {
        $k = 0;
        $wrap_div = "<div class='aussie-casino__category_result--wrap'>";
        echo $wrap_div;
        $total_posts = $the_query_incategory->post_count;
        while ($the_query_incategory->have_posts()) {
            $views_post = 0;
            if(empty(get_post_meta($post->ID, 'views', true) ) === false) {
                $views_post = get_post_meta($post->ID, 'views', true);
            }

            $the_query_incategory->the_post();
            $default_img_url = get_template_directory_uri() . '/img/default-img.jpg';
            $thumbnail_img = (has_post_thumbnail()) ? get_the_post_thumbnail_url($the_query_incategory->ID, 'full') : $default_img_url;

            echo '<article class="aussie-casino__winning-guides_post--item" id="filter-games-' . $k . '" data-filter-date="'. get_the_date('r') .'" data-rating="'. expand_ratings_template('%RATINGS_AVERAGE%', get_the_ID()) .'" data-popularity="'.  $views_post  .'"><div class="aussie-casino__winning-guides_wrap--img"><a href="' . get_permalink() . '"><img src="' . $thumbnail_img . '" alt="' . get_the_title() . '"></a><span class="aussie-casino__winning-guides_date"><b>' . human_time_diff_enhanced() . '</b></span></div><a href=" ' . get_permalink() . ' ">' . get_the_title() . '</a></article>';


            if ($k % 3 == 2 && $k != 0 && ($k + 1) != $total_posts) {
                echo '</div></div></div>' . $wrap_div;
            }

            $k++;

        }
    }
    wp_reset_postdata();
    die();
}


// fix Scheduled Posts
//--------------------------------------------------
add_filter('the_posts', 'show_all_future_posts');

function show_all_future_posts($posts)
{
    global $wp_query, $wpdb;

    if (is_single() && $wp_query->post_count == 0) {
        $posts = $wpdb->get_results($wp_query->request);
    }

    return $posts;
};



