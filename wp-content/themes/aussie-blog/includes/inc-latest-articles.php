<section class="aussie-casino__latest-articles">
    <div class="aussie-casino__latest-articles_wrap">
        <div class="aussie-casino__latest-articles_container">
            <h2>Latest Articles</h2>
        </div>
        <?php $posts = get_posts("orderby=date&numberposts=10"); ?>
        <?php if ($posts) : ?>
            <?php foreach ($posts as $post) : setup_postdata($post); ?>
                <div>
                    <div>
                        <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <div class="aussie-casino__latest-articles_container">
            <p>Latest Articles</p>
        </div>
    </div>
</section>
