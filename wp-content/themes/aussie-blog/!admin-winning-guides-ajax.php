
<?php
function true_filter_function(){
$args = array(
'orderby' => 'date', // сортировка по дате у нас будет в любом случае (но вы можете изменить/доработать это)
'order'	=> $_POST['date'] // ASC или DESC
);

// для таксономий
if( isset( $_POST['categoryfilter'] )
$args['tax_query'] = array(
array(
'taxonomy' => 'category',
'field' => 'id',
'terms' => $_POST['categoryfilter']
)
);

// создаём массив $args['meta_query'] если указана хотя бы одна цена или отмечен чекбокс
if( isset( $_POST['cena_min'] ) || isset( $_POST['cena_max'] ) || ( isset( $_POST['featured_image'] ) && $_POST['featured_image'] == 'on' ) )
$args['meta_query'] = array( 'relation'=>'AND' ); // AND значит все условия meta_query должны выполняться

// условие 1: цена больше $_POST['cena_min']
if( isset( $_POST['cena_min'] ) )
$args['meta_query'][] = array(
'key' => 'cena',
'value' => $_POST['cena_min'],
'type' => 'numeric',
'compare' => '>'
);

// условие 2: цена меньше $_POST['cena_max']
if( isset( $_POST['cena_max'] ) )
$args['meta_query'][] = array(
'key' => 'cena',
'value' => $_POST['cena_max'],
'type' => 'numeric',
'compare' => '<'
);

// условие 3: миниатюра имеется
if( isset( $_POST['featured_image'] ) && $_POST['featured_image'] == 'on' )
$args['meta_query'][] = array(
'key' => '_thumbnail_id',
'compare' => 'EXISTS'
);

die();
}


add_action('wp_ajax_myfilter', 'true_filter_function');
add_action('wp_ajax_nopriv_myfilter', 'true_filter_function');