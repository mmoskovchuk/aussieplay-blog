<?php
/**
 * Шаблон вывода названия рубрики и постов
 */

get_template_part('includes/inc', 'header');

get_template_part('includes/inc', 'main-screen');

?>

<script>
    var $leftBox = $('#single-tpl-block-left');
    $leftBox.velocity({
            left: '0',
            duration: 600,
            easing: 'easeOutSine',
        });
</script>

<div class="aussie-casino-single-tpl">
    <div id="single-tpl-block-left" class="aussie-casino-single-tpl__block-left">
        <h1><?php echo apply_filters('the_content', $title_post); // выводим контент ?></h1>
        <?php echo apply_filters('the_content', $text); // выводим контент ?>
    </div>
</div>

