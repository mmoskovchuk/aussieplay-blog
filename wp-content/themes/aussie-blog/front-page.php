<?php
/**
 * Template Name: Front Page
 */
?>

<?php get_header(); ?>

    <!--HEADER-->
<?php get_template_part('includes/inc', 'header'); ?>
    <!--MAIN SCREEN-->
<?php get_template_part('includes/inc', 'main-screen'); ?>
    <!--BLOG MENU-MOBILE-->
<?php get_template_part('includes/inc', 'blog-menu-mobile'); ?>
    <!--LATEST ARTICLES-->
<?php get_template_part('includes/inc', 'latest-articles'); ?>
    <!--WINNING GUIDES-->
<?php get_template_part('includes/inc', 'winning-guides'); ?>
    <!--GAMES REVIEWS-->
<?php get_template_part('includes/inc', 'games-reviews'); ?>
    <!--NEWS-->
<?php get_template_part('includes/inc', 'news'); ?>
    <!--SUBSCRIBE US-->
<?php get_template_part('includes/inc', 'subscribe-us'); ?>
    <!--ABOUT US-->
<?php get_template_part('includes/inc', 'about-us'); ?>



    <!--HOME-->
    <div class="home">

    </div>

<?php get_footer(); ?>