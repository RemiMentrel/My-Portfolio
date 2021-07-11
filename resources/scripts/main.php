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
    add_image_size( 'project-miniature', 632, 400, true ); // x2 of 316x200
    add_image_size( 'project-image', 1264, 800, true ); // x2 of 632x400
}
add_action( 'after_setup_theme', 'wpdocs_theme_setup' );

?>