<?php
/**
 * Шаблон вывода названия рубрики и постов
 */

get_template_part('includes/inc', 'header');

get_template_part('includes/inc', 'main-screen');

?>

<script>
    var $leftBox = $('#block-left');
    $leftBox.velocity({
            left: '0',
            duration: 600,
            easing: 'easeOutSine',
        });
</script>

<div style="margin-top: 100px; width:100%; display: flex; justify-content: center;">
    <div style="width:80%;">
        <?php echo apply_filters('the_content', $text); // выводим контент ?>
    </div>
    <div id="block-left" style="width: 36%; height: 100%; background-color: #2e4453; position: absolute; left: -999px; top: 0; ">left block</div>
</div>

