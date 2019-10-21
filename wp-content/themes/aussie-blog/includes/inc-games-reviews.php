<section class="aussie-casino__games-reviews">

    <div class="aussie-casino__games-reviews_wrap">

        <div class="aussie-casino__games-reviews_top--wrap">
            <h2>Games reviews</h2>

            <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filtergames">

                <?php

                $termID = 4; // get_queried_object()->term_id; - динамическое получение ID текущей рубрики
                $taxonomyName = "category";
                $termchildren = get_term_children( $termID, $taxonomyName );

                echo '<span class="aussie-casino__games-reviews_top--desc">Show: </span><select name="categoryfiltergames">';
                foreach ($termchildren as $child) {
                    $term = get_term_by( 'id', $child, $taxonomyName );
                    echo '<option value="' . $term->term_id . '">' . $term->name . '</option>';
                }
                echo '</select>'; ?>

                <input type="hidden" name="action" value="myfilter">
            </form>

        </div>


        <div id="responsegames" class="aussie-casino__games-reviews_sort-post--wrap"></div>

    </div>

</section>
