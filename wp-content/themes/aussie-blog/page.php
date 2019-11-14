<?php get_header(); ?>
    <!--HEADER-->
<?php get_template_part('includes/inc', 'header'); ?>

    <div class="common__content">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="common__header">
                    <div class="common__title"><?php the_title(); ?></div>
                    <div class="common__date">
                        <?php $date .= the_date('j F Y'); ?>,&nbsp;
                        <?php the_time('G:i'); ?>
                        <!--28 января 2018, 6:54-->
                    </div>
                </div>
                <div class="common__body">
                    <div class="body__text">

                        <?php the_content(); ?>

                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>

    <!--SUBSCRIBE US-->
<?php get_template_part('includes/inc', 'subscribe-us'); ?>
    <!--ABOUT US-->
<?php get_template_part('includes/inc', 'about-us'); ?>

<?php get_footer(); ?>