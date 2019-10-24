<section class="aussie-casino__news">

    <div class="aussie-casino__news_wrap">

        <div class="aussie-casino__news_top--wrap">

            <h2>News</h2>

            <div class="aussie-casino__news_count"><?php echo get_category(6)->category_count; ?></div>

        </div>


        <div class="aussie-casino__news_post--wrap">
            <?php $posts = get_posts("category=6&orderby=date&numberposts=8"); ?>
            <?php if ($posts) : ?>
                <?php foreach (array_chunk($posts, 4, true) as $posts) : ?>

                    <div class="aussie-casino__news_post--item-wrap">

                        <?php foreach ($posts as $post) : setup_postdata($post); ?>

                            <?php $imagesurl = get_the_post_thumbnail_url($post_id, 'full'); ?>

                            <div class="aussie-casino__news_post--item">
                                <img src="<?php echo $imagesurl ?>" alt="news">
                                <span class="aussie-casino__news_post_date"><b><?php the_time(); ?></b></span>
                                <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
                            </div>

                        <?php endforeach; ?>

                    </div>

                <?php endforeach; ?>
            <?php endif; ?>
            
            <div class="aussie-casino__news_btn">
                <a href="javascript:void(0);">all news</a>
            </div>
        </div>

    </div>

</section>