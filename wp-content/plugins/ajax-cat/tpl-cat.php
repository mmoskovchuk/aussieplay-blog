<?php
/**
 * Шаблон вывода названия рубрики и постов
 */

get_template_part('includes/inc', 'header');

get_template_part('includes/inc', 'main-screen');

?>

<script>
    var $leftBox = $('#single-block-left');
    $leftBox.velocity({
            left: '0',
            duration: 600,
            easing: 'easeOutSine',
        });
</script>

<div class="aussie-casino-single-tpl">

    <div id="single-block-left" class="aussie-casino-single-tpl__block-left">

        <a class="aussie-casino-single__block-left_close" href="/">
            <img src="<?php bloginfo('template_url'); ?>/img/close-single.svg"
                 alt="<?php bloginfo('name'); ?>"/>
        </a>

        <div class="aussie-casino-single__container">

            <?php get_template_part('includes/inc', 'breadcrumbs'); ?>

            <h1 class="aussie-casino-single__block-left_title"><?php echo apply_filters('the_content', $title_post); // выводим контент ?></h1>

            <div class="aussie-casino-single__block-left_top-desc-wrap">
                <time><?php echo apply_filters('the_date', $post_date); ?></time>
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

            <?php

            if (has_post_thumbnail()) : ?>

                <?php the_post_thumbnail('full', array('class' => '')); ?>

            <?php else : ?>
                <img src="<?php bloginfo('template_url'); ?>/img/default-img.jpg"
                     alt="<?php bloginfo('name'); ?>" class="item__img"/>
            <?php endif; ?>

        </div>

        <div class="aussie-casino-single__container">
            <div class="aussie-casino-single__block-left_content-wrap">

                <?php echo apply_filters('the_content', $text); ?>

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

    <!--<div id="single-tpl-block-left" class="aussie-casino-single-tpl__block-left">
        <h1><?php /*echo apply_filters('the_content', $title_post); // выводим контент */?></h1>
        <?php /*echo apply_filters('the_content', $text); // выводим контент */?>
    </div>-->
</div>

