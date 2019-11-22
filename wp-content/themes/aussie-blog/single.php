<?
/*
 * Template name: NEWS-PAGE
 * */
?>


<?php get_header(); ?>


<?php if (have_posts()) : ?>
    <?php while (have_posts()) :
        the_post(); ?>

        <div class="aussie-casino-single">

            <div id="single-block-left" class="aussie-casino-single__block-left">

                <a class="aussie-casino-single__block-left_close" href="/">
                    <img src="<?php bloginfo('template_url'); ?>/img/close-single.svg"
                         alt="<?php bloginfo('name'); ?>"/>
                </a>

                <div class="aussie-casino-single__container">

                    <?php get_template_part('includes/inc', 'breadcrumbs'); ?>

                    <h1 class="aussie-casino-single__block-left_title"><?php the_title(); ?></h1>

                    <div class="aussie-casino-single__block-left_top-desc-wrap">
                        <time><?php the_date('d M, Y'); ?></time>
                        <div class="aussie-casino-single__block-left_top-rating">
                            <h5>article rating</h5><?php
                            if (function_exists('the_ratings')) {
                                the_ratings();
                                //echo expand_ratings_template('<span class="rating">%RATINGS_IMAGES%</span>', get_the_ID());
                            }
                            ?>
                        </div>
                    </div>

                </div>

                <div class="aussie-casino-single__block-left_img">

                    <?php if (has_post_thumbnail()) : ?>

                        <?php the_post_thumbnail('full', array('class' => '')); ?>

                    <?php else : ?>
                        <img src="<?php bloginfo('template_url'); ?>/img/default-img.jpg"
                             alt="<?php bloginfo('name'); ?>" class="item__img"/>
                    <?php endif; ?>

                </div>

                <div class="aussie-casino-single__container aussie-casino-single__contant--wrap">
                    <div class="aussie-casino-single__block-left_content-wrap">

                        <?php the_content(); ?>

                        <div class="aussie-casino-single__block-left_bottom-wrap-all">

                            <div class="aussie-casino-single__block-left_bottom-wrap">
                                <div class="aussie-casino-single__block-left_bottom-wrap--rating">
                                    <div class="aussie-casino-single__block-left_bottom-rating">
                                        <h5>rate this article</h5><?php if (function_exists('the_ratings')) {
                                            echo expand_ratings_template('<span class="rating">%RATINGS_IMAGES_VOTE%</span>', get_the_ID());
                                            //the_ratings();
                                        } ?>
                                    </div>
                                    <div class="aussie-casino-single__block-left_social">
                                        <h5>Share article in social</h5>
                                        <?php echo do_shortcode('[addtoany]'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="aussie-casino-single__block-left_tag-wrap">
                                <div class="aussie-casino-single__block-left_tag-wrap--tags">
                                    <?php if (has_tag()) : ?>
                                        <h5 class="aussie-casino-single__block-left_tag-title">Tag list</h5>
                                        <?php the_tags('<ul><li>', '</li><li>', '</li></ul>'); ?>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>


            </div>

            <div class="aussie-casino-single__block-right">

                <div class="aussie-casino-single__block-right_rel-wrap">
                    <?php $post_id = get_the_ID(); ?>
                    <?php $category_id = get_the_category($post_id); ?>
                    <?php $cat_id = $category_id[0]->cat_ID; ?>
                    <?php $posts = get_posts("orderby=date&numberposts=3&category=" . $cat_id . "&exclude=" . $post_id); ?>
                    <?php if ($posts) : ?>
                    <div class="aussie-casino-single__block-right_rel-posts-wrap">
                        <h2 class="aussie-casino-single__block-right_rel-title"><b>Related posts</b></h2>
                        <?php foreach ($posts as $post) : setup_postdata($post); ?>
                            <?php $post_id = get_the_ID(); ?>
                            <?php $imagesurl = get_the_post_thumbnail_url($post_id, 'large'); ?>

                            <div class="aussie-casino-single__block-right_rel-post">
                                <div class="aussie-casino-single__block-right_rel-post-img"
                                     style="background-image: url('<?php echo $imagesurl; ?>'); background-size: cover;">
                                    <time><?php echo get_the_date('d M, Y'); ?></time>
                                </div>
                                <a href="<?php the_permalink() ?>"
                                   rel="bookmark"><?php the_title(); ?></a>
                            </div>

                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="aussie-casino-single__block-right_read-more--wrap">
                        <h3 class="aussie-casino-single__block-right_read-more--title"><b>Read more</b></h3>
                        <div class="swiper-container swiper-container-read-more">
                            <div class="swiper-wrapper">

                                <?php $posts = get_posts("orderby=date&numberposts=5"); ?>
                                <?php if ($posts) : ?>
                                    <?php foreach ($posts as $post) : setup_postdata($post); ?>
                                        <?php $post_id = get_the_ID(); ?>
                                        <?php $imagesurl = get_the_post_thumbnail_url($post_id, 'full'); ?>

                                        <div class="swiper-slide aussie-casino-single__block-right_read-more--slide"
                                             style="background-image: url('<?php echo $imagesurl; ?>'); background-size: cover;">
                                            <time class="aussie-casino-single__block-right_read-more--date"><b><?php echo get_the_date('d M, Y'); ?></b></time>
                                            <div class="aussie-casino-single__block-right_read-more--title-desc">
                                                <a href="<?php the_permalink() ?>"
                                                   rel="bookmark"><?php the_title(); ?></a>
                                            </div>
                                        </div>

                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <!-- Pagination -->

                            <div class="swiper-pagination-read-more"></div>
                            <div class="swiper-button-next aussie-casino-single__block-right_read-more--btn-next"></div>
                            <div class="swiper-button-prev aussie-casino-single__block-right_read-more--btn-prev"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php endwhile; ?>
<?php endif; ?>

<!--SUBSCRIBE US-->
<?php get_template_part('includes/inc', 'subscribe-us'); ?>
<!--ABOUT US-->
<?php get_template_part('includes/inc', 'about-us'); ?>

<?php get_footer(); ?>
