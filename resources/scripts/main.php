<?php 

function acf_custom_init () {
    
    if( function_exists('acf_add_options_page') ) {

        acf_add_options_page( [
            'page_title' => __('Éléments généraux'),
            'menu_title' => __('Général'),
        ] );

    }
}
add_action('acf/init', 'acf_custom_init');


function custom_jpeg_quality( $quality, $context ) {
	return 100;
}
add_filter( 'jpeg_quality', 'custom_jpeg_quality', 10, 2 );


function wpdocs_theme_setup() {
    add_image_size( 'miniature', 420, 420, true );
    add_image_size( 'miniature-x2', 840, 840, true );
    add_image_size( 'project', 710, 525, true );
    add_image_size( 'project-x2', 1420, 1050, true );
    add_image_size( 'popin', 1080, 680, true );
    add_image_size( 'popin-x2', 2160, 1360, true );
}
add_action( 'after_setup_theme', 'wpdocs_theme_setup' );


function redirect_experience_cpt() {
  if ( is_singular( 'experience' ) ) {
    wp_redirect( home_url(), 301 );
    exit;
  }
}
add_action( 'template_redirect', 'redirect_experience_cpt' );

?>