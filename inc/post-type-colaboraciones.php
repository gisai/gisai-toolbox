<?php

/**
 * Este archivo registra el post Colaboraciones
 */

// Registrar Colaboraciones
function registrar_colaboraciones() {

	$labels = array(
		'name'                  => _x( 'Colaboraciones', 'Post Type General Name', 'sydney_toolbox' ),
		'singular_name'         => _x( 'Colaboracion', 'Post Type Singular Name', 'sydney_toolbox' ),
		'menu_name'             => __( 'Colaboraciones', 'sydney_toolbox' ),
		'name_admin_bar'        => __( 'Colaboraciones', 'sydney_toolbox' ),
		'archives'              => __( 'Archivos de colaboraciones', 'sydney_toolbox' ),
		'all_items'             => __( 'Todas las colaboraciones', 'sydney_toolbox' ),
		'add_new_item'          => __( 'Añadir nueva colaboración', 'sydney_toolbox' ),
		'add_new'               => __( 'Añadir', 'sydney_toolbox' ),
		'new_item'              => __( 'Nueva colaboración', 'sydney_toolbox' ),
		'edit_item'             => __( 'Editar colaboración', 'sydney_toolbox' ),
		'update_item'           => __( 'Actualizar colaboración', 'sydney_toolbox' ),
		'view_item'             => __( 'Ver colaboración', 'sydney_toolbox' ),
		'search_items'          => __( 'Buscar colaboración', 'sydney_toolbox' ),
		'not_found'             => __( 'No se ha encontrado ninguna colaboración', 'sydney_toolbox' ),
		'not_found_in_trash'    => __( 'No se ha encontrado ninguna colaboración en la papelera', 'sydney_toolbox' ),
		'featured_image'        => __( 'Imagen destacada', 'sydney_toolbox' ),
		'set_featured_image'    => __( 'Establecer como imagen destacada', 'sydney_toolbox' ),
		'remove_featured_image' => __( 'Eliminar imagen destacada', 'sydney_toolbox' ),
		'use_featured_image'    => __( 'Usar como imagen destacada', 'sydney_toolbox' ),
	);

	$args = array(
		'label'                 => __( 'Colaboración', 'sydney_toolbox' ),
		'description'           => __( 'Custom post para las colaboraciones del grupo', 'sydney_toolbox' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail'),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 31,
		'menu_icon'             => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'rewrite' 				=> array( 'slug' => 'colaboraciones' ),
	);

	register_post_type( 'colaboraciones', $args );
}

add_action( 'init', 'registrar_colaboraciones', 0 );
