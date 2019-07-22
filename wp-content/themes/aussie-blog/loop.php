<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class('body__item'); ?>>

            <?php if (is_front_page() || is_page()) : // front-page || single page ?>
                <?php the_content(); ?>

            <?php elseif (is_single()) : // post ?>
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
                <div class="article__meta">
                    <time class="article__meta-item article__time">
                        <i class="fa fa-clock-o"></i>
                        <?php the_time('d M.') ?>
                    </time>
                </div>

            <?php else : // blog || search results || archive page ?>
                <div class="item__info-wrapper">
                    <?php if (has_post_thumbnail()) : ?>

                        <?php the_post_thumbnail('medium_large', array('class' => 'item__img')); ?>
                        <div class="item__title"><?php the_title();  ?></div>
                        <div class="item__description"><?php the_truncated_post(350);  ?></div>

                    <?php else : ?>
                        <img src="<?php bloginfo('template_url'); ?>/img/default-img.png"
                             alt="<?php bloginfo('name'); ?>" class="item__img"/>
                        <div class="item__title"><?php the_title();  ?></div>
                        <div class="item__description"><?php the_truncated_post(350);  ?></div>

                    <?php endif; ?>

                </div>
                <a href="<?php the_permalink(); ?>" class="link-with-animated-border item__link-to-read"><?php pll_e( 'Learn more' ); ?></a>
            <?php endif; ?>

        </div>
    <?php endwhile; ?>
<?php endif; ?>


