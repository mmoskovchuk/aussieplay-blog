<section class="aussie-casino__winning-guides">

    <div class="aussie-casino__winning-guides_wrap">

        <h2>Winning guides</h2>


        <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">

            <?php

            if ($terms = get_terms('category', 'orderby=name')) : // как я уже говорил, для простоты возьму рубрики category, но get_terms() позволяет работать с любой таксономией
                echo '<span>Show: </span><select name="categoryfilter"><option value="'.$terms->name.'">'. $terms->name .'</option>';
                foreach ($terms as $term) {
                    if ($_POST[16] === $term->term_id) {
                        $selected_option = ' selected';
                    } else {
                        $selected_option = '';
                    }
                    echo '<option value="' . $term->term_id . '"' . $selected_option . '>' . $term->name . '</option>';

                    /*echo '<option value="' . $term->term_id . '">' . $term->name . '</option>';*/ // в качестве value я взял ID рубрики
                    var_dump($_POST["16"]);
                }
                echo '</select>';
            endif;

            ?>
            <button>Применить фильтр</button>
            <input type="hidden" name="action" value="myfilter">
        </form>
        <div id="response" class="aussie-casino__winning-guides_sort-post--wrap"></div>

    </div>

</section>
