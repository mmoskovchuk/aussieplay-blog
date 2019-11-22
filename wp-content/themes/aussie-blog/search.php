<?php get_header(); ?>

    <!--HEADER-->
<?php get_template_part('includes/inc', 'header'); ?>
    <!--FIXED SIDEBAR-->
<?php get_template_part('includes/inc', 'fixed-sidebar'); ?>
    <!--MAIN SCREEN-->
<?php get_template_part('includes/inc', 'main-screen'); ?>
    <!--BLOG MENU-MOBILE-->
<?php get_template_part('includes/inc', 'blog-menu-mobile'); ?>


    <section class="aussie-casino__search">
        <div class="aussie-casino__search_wrap--top">

            <div class="aussie-casino__search_wrap">
                <div class="aussie-casino__search_container">

                    <?php get_template_part('includes/inc', 'breadcrumbs'); ?>
                    <h2>Search results</h2>
                    <p class="aussie-casino__search_result--top"><?php echo 'Here are results for ' . '<b>"<span>' . get_search_query() . '</span>"</b>:'; ?></p>

                </div>
            </div>

        </div>
        <div class="aussie-casino__search_result--bottom">
            <div class="aussie-casino__search_result-sort--wrap">

                <?php
                $i = 0;
                $wrap_div = "<div class='aussie-casino__search_result--wrap'>";
                if (have_posts()) :
                    $total_posts = $wp_query->post_count;
                    echo $wrap_div;
                    while (have_posts()) : the_post();
                        ?>

                        <div class="aussie-casino__search_result--item">
                            <div class="aussie-casino__winning-guides_wrap--img">
                                <?php if (has_post_thumbnail()) : ?>

                                    <?php the_post_thumbnail('full', array('class' => '')); ?>

                                <?php else : ?>
                                    <img src="<?php bloginfo('template_url'); ?>/img/default-img.jpg"
                                         alt="<?php bloginfo('name'); ?>" class="item__img"/>
                                <?php endif; ?>
                                <span class="aussie-casino__winning-guides_date"><b><?php echo get_the_date('d M, Y') ?></b></span>
                            </div>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </div>


                        <?php
                        if ($i % 3 == 2 && $i != 0 && ($i + 1) != $total_posts) {
                            echo '</div>' . $wrap_div; ?>
                        <?php } ?>

                        <?php $i++; ?>
                    <?php endwhile; ?>
                    <?php echo '</div>'; ?>


                <?php
                else :
                    echo "<p class='aussie-casino__search_result--fatality'>Sorry, no results were found for your request...</p>";
                endif;
                ?>
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