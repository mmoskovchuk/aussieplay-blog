<?
/*
 * Template name: NEWS
 * */
?>

<?php get_header(); ?>

    <!-- NEWS -->
    <div class="content-wrapper news-list">

        <div class="list__body body">
            <?php get_template_part('loop'); ?>
            <?php if (function_exists('kama_pagenavi')) kama_pagenavi(); ?>
        </div>

    </div>


<?php get_footer(); ?>