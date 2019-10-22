<section class="aussie-casino__latest-articles">
    <div class="aussie-casino__latest-articles_wrap">
        <div class="aussie-casino__latest-articles_container">
            <h2>Latest Articles</h2>
        </div>
        <?php /*function meks_time_ago() {
            return human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago');
        } */?>
        <!-- Swiper -->
        <div class="swiper-container swiper-container-latest-articles">

            <div class="swiper-wrapper">
                <?php $posts = get_posts("orderby=date&numberposts=5"); ?>
                <?php if ($posts) : ?>
                    <?php foreach ($posts as $post) : setup_postdata($post); ?>
                        <?php $post_id = get_the_ID(); ?>
                        <?php $imagesurl = get_the_post_thumbnail_url($post_id, 'full'); ?>

                        <div class="swiper-slide aussie-casino__latest-articles_slide"
                             style="background-image: url('<?php echo $imagesurl; ?>'); background-size: cover; background-position-y: center;">
                            <div class="aussie-casino__latest-articles_title">
                                <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
                                <span class="aussie-casino__latest-articles_date"><b><?php the_time(); ?></b><span>
                            </div>
                        </div>

                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <!-- Pagination -->
            <div class="swiper-button-next aussie-casino__latest-articles_btn-next"></div>
            <div class="swiper-pagination-latest aussie-casino__latest-articles_pagination"></div>
            <div class="swiper-button-prev aussie-casino__latest-articles_btn-prev"></div>
        </div>
    </div>
</section>
