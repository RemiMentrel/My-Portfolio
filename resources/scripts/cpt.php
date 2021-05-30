<?php

// Register Custom Post Type "Project"
function cpt_project() {

	$labels = array(
		'name'                  => _x( 'Projets', 'Post Type General Name', 'portfolio' ),
		'singular_name'         => _x( 'Projet', 'Post Type Singular Name', 'portfolio' ),
		'menu_name'             => __( 'Projets', 'portfolio' ),
		'name_admin_bar'        => __( 'Projet', 'portfolio' ),
		'archives'              => __( 'Archives', 'portfolio' ),
		'attributes'            => __( 'Attributs', 'portfolio' ),
		'parent_item_colon'     => __( 'Projet parent :', 'portfolio' ),
		'all_items'             => __( 'Tous les projets', 'portfolio' ),
		'add_new_item'          => __( 'Ajouter un nouveau projet', 'portfolio' ),
		'add_new'               => __( 'Ajouter', 'portfolio' ),
		'new_item'              => __( 'Nouveau projet', 'portfolio' ),
		'edit_item'             => __( 'Modifier', 'portfolio' ),
		'update_item'           => __( 'Mettre à jour', 'portfolio' ),
		'view_item'             => __( 'Voir le projet', 'portfolio' ),
		'view_items'            => __( 'Voir les projets', 'portfolio' ),
		'search_items'          => __( 'Chercher un projet', 'portfolio' ),
		'not_found'             => __( 'Non trouvé', 'portfolio' ),
		'not_found_in_trash'    => __( 'Non trouvé dans la corbeille', 'portfolio' ),
		'featured_image'        => __( 'Image en avant', 'portfolio' ),
		'set_featured_image'    => __( 'Définir une image en avant', 'portfolio' ),
		'remove_featured_image' => __( 'Supprimer l\'image en avant', 'portfolio' ),
		'use_featured_image'    => __( 'Utiliser comme image en avant', 'portfolio' ),
		'insert_into_item'      => __( 'Insérer dans le projet', 'portfolio' ),
		'uploaded_to_this_item' => __( 'Importé dans ce projet', 'portfolio' ),
		'items_list'            => __( 'Liste des projets', 'portfolio' ),
		'items_list_navigation' => __( 'Navigation dans les projets', 'portfolio' ),
		'filter_items_list'     => __( 'Filtrer la liste de projets', 'portfolio' ),
	);
	$rewrite = array(
		'slug'                  => 'projet',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Projet', 'portfolio' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-art',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'projets',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'project', $args );

}
add_action( 'init', 'cpt_project', 0 );

?>