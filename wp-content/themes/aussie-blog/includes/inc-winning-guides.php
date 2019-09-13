<section class="aussie-casino__winning-guides">

    <div class="aussie-casino__winning-guides_wrap">

        <div class="aussie-casino__winning-guides_top--wrap">
            <h2>Winning guides</h2>

            <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">

                <?php

                if ($terms = get_terms('category', 'orderby=name')) :
                    echo '<span class="aussie-casino__winning-guides_top--desc">Show: </span><select name="categoryfilter">';
                    foreach ($terms as $term) {
                        echo '<option value="' . $term->term_id . '">' . $term->name . '</option>';
                    }
                    echo '</select>';
                endif;

                ?>
                <input type="hidden" name="action" value="myfilter">
            </form>
        </div>

        <div id="response" class="aussie-casino__winning-guides_sort-post--wrap"></div>

    </div>

</section>
