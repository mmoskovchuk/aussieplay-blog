<?
/*
 * Template name: CATEGORY default
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
                    <?php $termID = get_queried_object()->term_id; //- динамическое получение ID текущей рубрики ?>
                    <h2><?php echo get_cat_name($termID) ?></h2>
                    <div class="aussie-casino__category_filter-sort--wrap">

                        <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter-category"
                              class="aussie-casino__category_form--wrap">

                            <?php

                            $termID = get_queried_object()->term_id; //- динамическое получение ID текущей рубрики
                            $taxonomyName = "category";
                            $termchildren = get_term_children($termID, $taxonomyName);

                            echo '<span class="aussie-casino__category_top--desc">Show </span><div name="incategoryfilter" class="aussie-casino__category_form-item--wrap">';
                            echo '<div class="aussie-casino__category_form-item">';
                            echo '<input class="input-btn all-reviews" type="radio" name="incategoryfilter" value="' . $termID . '" id="gr-' . $termID . '"></input>';
                            echo '<label class="label-btn all-reviews active" name="incategoryfilter" for="gr-' . $termID . '" value="' . $termID . '">All reviews</label>';
                            echo '</div>';
                            foreach ($termchildren as $child) {
                                $term = get_term_by('id', $child, $taxonomyName);
                                echo '<div class="aussie-casino__category_form-item"><input class="input-btn" type="radio" name="incategoryfilter" value="' . $term->term_id . '" id="gr-' . $term->term_id . '"/>';
                                echo '<label class="label-btn" name="incategoryfilter" for="gr-' . $term->term_id . '" value="' . $term->term_id . '">' . $term->name . '</label></div>';
                            }
                            echo '</div>'; ?>

                            <input type="hidden" name="action" value="myfilter">
                        </form>
                        <div class="aussie-casino__category_sortby--wrap">
                            <span class="aussie-casino__category_top--desc">Sort by </span>
                            <div class="aussie-casino__category_sortby">
                                <div class="aussie-casino__category_form-item">
                                    <input class="date incategorysort-input" type="radio" name="incategorysort" value="date" id="date">
                                    <label class="date incategorysort-label" name="incategorysort" for="date" value="date">Date</label>
                                </div>
                                <div class="aussie-casino__category_form-item">
                                    <input class="popularity incategorysort-input" type="radio" name="incategorysort" value="popularity" id="popularity">
                                    <label class="popularity incategorysort-label" name="incategorysort" for="popularity" value="popularity">Popularity</label>
                                </div>
                                <div class="aussie-casino__category_form-item">
                                    <input class="most-rated incategorysort-input" type="radio" name="incategorysort" value="most-rated" id="most-rated">
                                    <label class="most-rated incategorysort-label" name="incategorysort" for="most-rated" value="most-rated">Most rated</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="aussie-casino__category_result--bottom">
            <div class="aussie-casino__category_result-sort--wrap">
                <div id="response" class="aussie-casino__category_sort-post--wrap"></div>
            </div>

            <?php $cat_id = get_query_var('cat'); ?>
            <div id="more_posts" class="aussie-casino__category_load-more--btn" data-category="<?php echo $cat_id; ?>">
                <a href="javascript:void(0);">Show more</a>
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