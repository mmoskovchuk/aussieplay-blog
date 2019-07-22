<?
/*
 * Template name: NEWS
 * */
?>

<?php get_header(); ?>

    <!-- NEWS -->
    <div class="content-wrapper news-list">

            <div class="list__header header">
                <a href="/en/" class="link-with-animated-border breadcrumb header__breadcrumbs">Go to home</a>
                <div class="header__title">News</div>
            </div>


        <div class="list__body body">
            <?php get_template_part('loop'); ?>
            <?php if (function_exists('kama_pagenavi')) kama_pagenavi(); ?>
        </div>


    </div>


<?php get_footer(); ?>