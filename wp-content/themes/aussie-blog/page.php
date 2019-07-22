<?php get_header(); ?>

    <div class="content-wrapper interview-page">


    <div class="common-page__common common">
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
    </div>

        <div class="common-page__footer footer">
            <div class="footer__source">
                <?php

                $link = get_field('interview_source');

                if( $link ):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <?php pll_e( 'Source' ); ?>
                    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                <?php endif; ?>
            </div>

            <div class="footer__share">
                <div class="share__text"><?php pll_e( 'Share' ); ?></div>
                <div class="socials">
                    <a href="javascript:void(0)" class="social share__social">
                        <div class="social-facebook"></div>
                    </a>
                    <a href="javascript:void(0)" class="social share__social">
                        <div class="icon-share"></div>
                    </a>
                </div>
            </div>
        </div>

</div>

<?php get_footer(); ?>