<?
/*
 * Template name: NEWS
 * */
?>

<?php get_header(); ?>

    <!--HEADER-->
<?php get_template_part('includes/inc', 'header'); ?>
    <!--FIXED SIDEBAR-->
<?php get_template_part('includes/inc', 'fixed-sidebar'); ?>
    <!--MAIN SCREEN-->
<?php get_template_part('includes/inc', 'main-screen'); ?>
    <!--BLOG MENU-MOBILE-->
<?php get_template_part('includes/inc', 'blog-menu-mobile'); ?>

    <section class="aussie-casino__category">
        <div class="aussie-casino__category_wrap--top">

            <div class="aussie-casino__category_wrap">
                <div class="aussie-casino__category_container">

                    <?php get_template_part('includes/inc', 'breadcrumbs'); ?>
                    <h2>Winning guides</h2>
                    <div class="aussie-casino__category_filter-sort--wrap">

                        <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter"
                              class="aussie-casino__category_form--wrap">

                            <?php

                            $termID = 3; // get_queried_object()->term_id; - динамическое получение ID текущей рубрики
                            $taxonomyName = "category";
                            $termchildren = get_term_children($termID, $taxonomyName);

                            echo '<span class="aussie-casino__category_top--desc">Show </span><div name="incategoryfilter" class="aussie-casino__category_form-item--wrap">';
                            foreach ($termchildren as $child) {
                                $term = get_term_by('id', $child, $taxonomyName);
                                echo '<div class="aussie-casino__category_form-item"><input class="input-btn" type="radio" name="incategoryfilter" value="' . $term->term_id . '" id="wg-' . $term->term_id . '"/>';
                                echo '<label class="label-btn" name="incategoryfilter" for="wg-' . $term->term_id . '" value="' . $term->term_id . '">' . $term->name . '</label></div>';
                            }
                            echo '</div>'; ?>



                            <?php

                            echo '<span class="aussie-casino__category_top--desc">sort by </span><div name="sort_incategoryfilter" class="aussie-casino__category_form-item--wrap">';

                            echo '<div class="aussie-casino__category_form-item"><input class="input-btn" type="radio" name="sort_incategoryfilter" value="ASC" id="date-1"/>';
                            echo '<label class="label-btn" name="sort_incategoryfilter" for="date-1" value="ASC" >Date</label></div>';

                            echo '<div class="aussie-casino__category_form-item"><input class="input-btn" type="radio" name="sort_incategoryfilter1" value="DESC" id="date-2"/>';
                            echo '<label class="label-btn" name="sort_incategoryfilter1" for="date-2" value="DESC" >Date2</label></div>';

                            echo '</div>'; ?>

                            <input type="hidden" name="action" value="myfilter">
                        </form>



                        <?php /*echo do_shortcode('[facetwp facet="filter_category"]')*/?><!--
                        <?php /*echo do_shortcode('[facetwp facet="sort_category"]')*/?>
                        --><?php /*echo do_shortcode('[facetwp template="output_info"]')*/?>



                    </div>
                </div>
            </div>

        </div>
        <div class="aussie-casino__category_result--bottom">
            <div class="aussie-casino__category_result-sort--wrap">

                <div id="response" class="aussie-casino__category_sort-post--wrap"></div>
            </div>
        </div>
    </section>

    <!--LATEST ARTICLES-->
<?php get_template_part('includes/inc', 'latest-articles'); ?>
    <!--SUBSCRIBE US-->
<?php get_template_part('includes/inc', 'subscribe-us'); ?>
    <!--ABOUT US-->
<?php get_template_part('includes/inc', 'about-us'); ?>


<?php get_footer(); ?>