<?
/*
 * Template name: NEWS-PAGE
 * */
?>


<?php get_header(); ?>


<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

        <div class="aussie-casino-single">

            <div id="single-block-left" class="aussie-casino-single__block-left">

                <a class="aussie-casino-single__block-left_close" href="/">
                    <img src="<?php bloginfo('template_url'); ?>/img/close-single.svg" alt="<?php bloginfo('name'); ?>"/>
                </a>

                <div class="aussie-casino-single__container">

                    <?php get_template_part('includes/inc', 'breadcrumbs'); ?>

                    <h1 class="aussie-casino-single__block-left_title"><?php the_title(); ?></h1>

                    <div class="aussie-casino-single__block-left_top-desc-wrap">
                        <time><?php the_date('Y-m-d'); ?></time>
                        <span>article rating</span>
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

                <div class="aussie-casino-single__container">
                    <div class="aussie-casino-single__block-left_content-wrap">
                        <?php the_content(); ?>
                        <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
                    </div>
                </div>



            </div>

            <div class="aussie-casino-single__block-right">
                <h2>Related posts</h2>
            </div>

        </div>

    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
