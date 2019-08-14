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
        wp_enqueue_script('custom', get_template_directory_uri() . '/js/scripts.min.js', array('jquery'), null, true);

        /*velocity*/
        wp_enqueue_script('velocity', get_template_directory_uri() . '/js/libs/velocity.min.js', array(), null, true);
        /*velocity ui*/
        wp_enqueue_script('velocity-ui', get_template_directory_uri() . '/js/libs/velocity.ui.min.js', array(), null, true);
        /*swiper*/
        wp_enqueue_script('swiper', get_template_directory_uri() . '/js/libs/swiper.min.js', array(), null, true);


        $site_data = array(
            'template_url' => get_template_directory_uri()
        );

        wp_localize_script('custom', 'site_data', $site_data);

        if (!is_page(array('', ''))) {
            /*swiper css*/
            wp_enqueue_style('swiper', get_template_directory_uri() . '/css/libs/swiper.min.css', array(), null);
            /*custom css*/
            wp_enqueue_style('custom', get_template_directory_uri() . '/css/style.min.css', array(), null);

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
    $filtered = strip_tags(preg_replace('@<style[^>]*?>.*?</style>@si', '', preg_replace('@<script[^>]*?>.*?</script>@si', '', apply_filters('the_content', get_the_content()))));
    echo substr($filtered, 0, strrpos(substr($filtered, 0, $symbol_amount), ' ')) . '...';
}

//PAGINATION INTERVIEW-LIST
//--------------------------------------------------

function pagination()
{

    global $paged1, $page_number_max1;


    if ($paged1 != 1) {

            echo '<a class="link-with-animated-border pagination__btn" href="' . rtrim(get_pagenum_link(($paged1 - 1)), '/') . '">Prev page</a>';

    }
    if ($paged1 < $page_number_max1) {

            echo '<a class="link-with-animated-border pagination__btn" href="' . get_pagenum_link($paged1 + 1) . '">Next page</a>';


    }

}

//PAGINATION NEWS
//--------------------------------------------------
function kama_pagenavi($before = '', $after = '', $echo = true)
{

    /* ================ Настройки ================ */

    $num_pages = ''; // сколько ссылок показывать

        $backtext = 'Prev page';
        $nexttext = 'Next page';


    /* ================ Конец Настроек ================ */

    global $wp_query;
    $paged = (int)$wp_query->query_vars[paged];
    $max_page = $wp_query->max_num_pages;

    if ($max_page <= 1) return false; //проверка на надобность в навигации

    if (empty($paged) || $paged == 0) $paged = 1;

    $pages_to_show = intval($num_pages);
    $pages_to_show_minus_1 = $pages_to_show - 1;

    $half_page_start = floor($pages_to_show_minus_1 / 2); //сколько ссылок до текущей страницы
    $half_page_end = ceil($pages_to_show_minus_1 / 2); //сколько ссылок после текущей страницы

    $start_page = $paged - $half_page_start; //первая страница
    $end_page = $paged + $half_page_end; //последняя страница (условно)

    if ($start_page <= 0) $start_page = 1;
    if (($end_page - $start_page) != $pages_to_show_minus_1) $end_page = $start_page + $pages_to_show_minus_1;
    if ($end_page > $max_page) {
        $end_page = (int)$max_page;
    }

    $out = ''; //выводим навигацию
    $out .= $before . "<div class='body__pagination pagination'>\n";


    if ($paged != 1) {
        $out .= '<a class="link-with-animated-border pagination__btn" href="' . rtrim(get_pagenum_link(($paged - 1)), '/') . '">' . $backtext . '</a>';
    }

    if ($end_page < $max_page) {
        $out .= '<a class="link-with-animated-border pagination__btn" href="' . get_pagenum_link($paged + 1) . '">' . $nexttext . '</a>';
    }

    $out .= "</div>" . $after . "\n";
    if ($echo) echo $out;
    else return $out;
};


//TIME AGO
//--------------------------------------------------

add_filter('the_time', 'human_time_diff_enhanced');

function human_time_diff_enhanced( $duration = 60 ) {

    $post_time = get_the_time('U');
    $human_time = '';

    $time_now = date('U');

    // use human time if less that $duration days ago (60 days by default)
    // 60 seconds * 60 minutes * 24 hours * $duration days
    if ( $post_time > $time_now - ( 60 * 60 * 24 * $duration ) ) {
        $human_time = sprintf( __( '0%s ago', 'binarymoon'), human_time_diff( $post_time, current_time( 'timestamp' ) ) );
    } else {
        $human_time = get_the_date();
    }

    return $human_time;

}
