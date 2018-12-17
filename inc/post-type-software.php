<?php

/**
 * Este archivo registra el post Software
 */


// Registrar software
function registrar_software() {

	$labels = array(
		'name'                  => _x( 'Software', 'Post Type General Name', 'sydney_toolbox' ),
		'singular_name'         => _x( 'Software', 'Post Type Singular Name', 'sydney_toolbox' ),
		'menu_name'             => __( 'Software', 'sydney_toolbox' ),
		'name_admin_bar'        => __( 'Software', 'sydney_toolbox' ),
		'archives'              => __( 'Archivos de Software', 'sydney_toolbox' ),
		'all_items'             => __( 'Todos el software', 'sydney_toolbox' ),
		'add_new_item'          => __( 'Añadir nuevo software', 'sydney_toolbox' ),
		'add_new'               => __( 'Añadir', 'sydney_toolbox' ),
		'new_item'              => __( 'Nuevo software', 'sydney_toolbox' ),
		'edit_item'             => __( 'Editar software', 'sydney_toolbox' ),
		'update_item'           => __( 'Actualizar software', 'sydney_toolbox' ),
		'view_item'             => __( 'Ver software', 'sydney_toolbox' ),
		'search_items'          => __( 'Buscar software', 'sydney_toolbox' ),
		'not_found'             => __( 'No se ha encontrado ningún software', 'sydney_toolbox' ),
		'not_found_in_trash'    => __( 'No se ha encontrado ningún software en la papelera', 'sydney_toolbox' ),
		'featured_image'        => __( 'Imagen destacada', 'sydney_toolbox' ),
		'set_featured_image'    => __( 'Establecer como imagen destacada', 'sydney_toolbox' ),
		'remove_featured_image' => __( 'Eliminar imagen destacada', 'sydney_toolbox' ),
		'use_featured_image'    => __( 'Usar como imagen destacada', 'sydney_toolbox' ),
	);

	$args = array(
		'label'                 => __( 'Software', 'sydney_toolbox' ),
		'description'           => __( 'Custom post para el software del grupo', 'sydney_toolbox' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail'),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 26,
		'menu_icon'             => 'dashicons-media-code',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'rewrite' 				=> array( 'slug' => 'software' ),
	);

	register_post_type( 'software', $args );
}

add_action( 'init', 'registrar_software', 0 );
