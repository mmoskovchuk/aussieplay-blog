<?php get_header(); ?>

    <!--HEADER-->
<?php get_template_part('includes/inc', 'header'); ?>
    <!--FIXED SIDEBAR-->
<?php get_template_part('includes/inc', 'fixed-sidebar'); ?>
    <!--MAIN SCREEN-->
<?php get_template_part('includes/inc', 'main-screen'); ?>
    <!--BLOG MENU-MOBILE-->
<?php get_template_part('includes/inc', 'blog-menu-mobile'); ?>


<!--CONTENT-->
<section class="search-results-content content">
    <div class="container">

        <h1><?php echo 'Результат поиска: ' . '<span>' . get_search_query() . '</span>'; ?></h1>
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                ?>
                <div id="posts">
                    <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
                    <p><?php the_excerpt() ?></p>
                    <div>Дата добавления: <?php the_date() ?></div>
                </div>
            <?php endwhile; ?>
        <?php
        else :
            echo "Извините по Вашему результату ничего не найдено";
        endif;
        ?>

    </div>
</section>


    <!--LATEST ARTICLES-->
<?php get_template_part('includes/inc', 'latest-articles'); ?>
    <!--SUBSCRIBE US-->
<?php get_template_part('includes/inc', 'subscribe-us'); ?>
    <!--ABOUT US-->
<?php get_template_part('includes/inc', 'about-us'); ?>

<?php get_footer(); ?>