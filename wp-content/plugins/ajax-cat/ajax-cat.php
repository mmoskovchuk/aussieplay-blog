<?php
/**
 * Plugin Name: Ajax Cat
 * Description: Ajax loading posts.
 * Author: anonymous
 */

add_action( 'wp_ajax_get_cat', 'ajax_show_posts_in_cat' );
add_action( 'wp_ajax_nopriv_get_cat', 'ajax_show_posts_in_cat' );
function ajax_show_posts_in_cat() {
	
	$link = ! empty( $_POST['link'] ) ? esc_attr( $_POST['link'] ) : false;
	$slug = $link ? wp_basename( $link ) : false;
    $get_post_id = get_page_by_path($slug, '', 'post');
    $category_name = get_the_category( $get_post_id->ID );
	$cat  = $category_name;
	
	if ( ! $cat ) {
		die( 'Not found' );
	}
	
	/*query_posts( array(
		'posts_per_page' => get_option( 'posts_per_page' ),
		'post_status'    => 'publish',
		'category_name'   => $cat->slug
	) );*/

    $post_uniq = get_post( $get_post_id->ID );
    $text = $post_uniq->post_content; // контент поста
    $title_post = $post_uniq->post_title;
    $post_date = $post_uniq->post_date;




    require plugin_dir_path( __FILE__ ) . 'tpl-cat.php';
	
	wp_die();
}


add_action( 'wp_enqueue_scripts', 'my_assets' );
function my_assets() {
	wp_enqueue_script( 'custom-ajax', plugins_url( 'custom.js', __FILE__ ), array( 'jquery' ) );
	
	wp_localize_script( 'custom-ajax', 'myPlugin', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' )
	) );
}
