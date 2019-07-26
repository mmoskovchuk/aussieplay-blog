<section>
    <h2>latest news</h2>
    <?php if (function_exists('get_highest_score_range')): ?>
        <ul>
            <?php /*get_highest_score_range('1 day'); */ ?>

        </ul>
    <?php endif; ?>

    <?php
    global $query_string;
    $args = array(
        'category__in' => array(3,5,6,4),
        'meta_key' => 'ratings_average',
        'orderby' => 'meta_value_num',
        'order' => 'DESC'
    );
    query_posts( $query_string, $args );

    if (have_posts()) {

        while (have_posts()) {

            the_post();

        }

        wp_reset_query();

    } else {

        // текст/код, если постов нет
    }
    ?>

</section>
