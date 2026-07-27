<?php

/**
 * Este archivo registra el post Tecnologías
 */

// Registrar Tecnologías
function registrar_tecnologias() {

	$labels = array(
		'name'                  => _x( 'Tecnologías', 'Post Type General Name', 'sydney_toolbox' ),
		'singular_name'         => _x( 'Tecnología', 'Post Type Singular Name', 'sydney_toolbox' ),
		'menu_name'             => __( 'Tecnologías', 'sydney_toolbox' ),
		'name_admin_bar'        => __( 'Tecnologías', 'sydney_toolbox' ),
		'archives'              => __( 'Archivos de tecnologías', 'sydney_toolbox' ),
		'all_items'             => __( 'Todas las tecnologías', 'sydney_toolbox' ),
		'add_new_item'          => __( 'Añadir nueva tecnología', 'sydney_toolbox' ),
		'add_new'               => __( 'Añadir', 'sydney_toolbox' ),
		'new_item'              => __( 'Nueva tecnología', 'sydney_toolbox' ),
		'edit_item'             => __( 'Editar tecnología', 'sydney_toolbox' ),
		'update_item'           => __( 'Actualizar tecnología', 'sydney_toolbox' ),
		'view_item'             => __( 'Ver tecnología', 'sydney_toolbox' ),
		'search_items'          => __( 'Buscar tecnología', 'sydney_toolbox' ),
		'not_found'             => __( 'No se ha encontrado ninguna tecnología', 'sydney_toolbox' ),
		'not_found_in_trash'    => __( 'No se ha encontrado ninguna tecnología en la papelera', 'sydney_toolbox' ),
		'featured_image'        => __( 'Imagen destacada', 'sydney_toolbox' ),
		'set_featured_image'    => __( 'Establecer como imagen destacada', 'sydney_toolbox' ),
		'remove_featured_image' => __( 'Eliminar imagen destacada', 'sydney_toolbox' ),
		'use_featured_image'    => __( 'Usar como imagen destacada', 'sydney_toolbox' ),
	);

	$args = array(
		'label'                 => __( 'Tecnología', 'sydney_toolbox' ),
		'description'           => __( 'Custom post para las tecnologías del grupo', 'sydney_toolbox' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail'),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 28,
		'menu_icon'             => 'dashicons-hammer',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'rewrite' 				=> array( 'slug' => 'tecnologias' ),
	);

	register_post_type( 'tecnologias', $args );
}

add_action( 'init', 'registrar_tecnologias', 0 );
