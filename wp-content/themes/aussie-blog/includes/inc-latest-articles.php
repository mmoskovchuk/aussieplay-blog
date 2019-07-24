<section class="aussie-casino__latest-articles">
    <div class="aussie-casino__latest-articles_wrap">
        <div class="aussie-casino__latest-articles_container">
            <h2>Latest Articles</h2>
        </div>

        <?php $imagesurl = get_the_post_thumbnail_url(36, 'large'); ?>

        <!-- Swiper -->
        <div class="swiper-container">

            <div class="swiper-wrapper">
                <?php $posts = get_posts("orderby=date&numberposts=10"); ?>
                <?php if ($posts) : ?>
                    <?php foreach ($posts as $post) : setup_postdata($post); ?>

                        <div class="swiper-slide" ><!--style="background-image: url('<?php /*echo $imagesurl; */?>'); background-size: cover;"-->
                            <div class="aussie-casino__latest-articles_container">
                                <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
                                <?php the_date(); ?>
                            </div>
                        </div>

                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-button-next"></div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</section>
