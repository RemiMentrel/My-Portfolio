<?php 

add_action('acf/init', 'acf_custom_init');

function acf_custom_init () {
    
    if( function_exists('acf_add_options_page') ) {

        acf_add_options_page( [
            'page_title' => __('Éléments généraux'),
            'menu_title' => __('Général'),
        ] );

    }
}

?>