<?php

/**
 * Este archivo registra el post Miembros
 */

// Registrar miembros
function registrar_miembros() {

	$labels = array(
		'name'                  => _x( 'Miembros', 'Post Type General Name', 'sydney_toolbox' ),
		'singular_name'         => _x( 'Miembro', 'Post Type Singular Name', 'sydney_toolbox' ),
		'menu_name'             => __( 'Miembros', 'sydney_toolbox' ),
		'name_admin_bar'        => __( 'Miembros', 'sydney_toolbox' ),
		'archives'              => __( 'Archivos de miembros', 'sydney_toolbox' ),
		'all_items'             => __( 'Todos los miembros', 'sydney_toolbox' ),
		'add_new_item'          => __( 'Añadir nuevo miembro', 'sydney_toolbox' ),
		'add_new'               => __( 'Añadir', 'sydney_toolbox' ),
		'new_item'              => __( 'Nuevo miembro', 'sydney_toolbox' ),
		'edit_item'             => __( 'Editar miembro', 'sydney_toolbox' ),
		'update_item'           => __( 'Actualizar miembro', 'sydney_toolbox' ),
		'view_item'             => __( 'Ver miembro', 'sydney_toolbox' ),
		'search_items'          => __( 'Buscar miembro', 'sydney_toolbox' ),
		'not_found'             => __( 'No se ha encontrado ningún miembro', 'sydney_toolbox' ),
		'not_found_in_trash'    => __( 'No se ha encontrado ningún miembro en la papelera', 'sydney_toolbox' ),
		'featured_image'        => __( 'Imagen destacada', 'sydney_toolbox' ),
		'set_featured_image'    => __( 'Establecer como imagen destacada', 'sydney_toolbox' ),
		'remove_featured_image' => __( 'Eliminar imagen destacada', 'sydney_toolbox' ),
		'use_featured_image'    => __( 'Usar como imagen destacada', 'sydney_toolbox' ),
	);

	$args = array(
		'label'                 => __( 'Miembro', 'sydney_toolbox' ),
		'description'           => __( 'Custom post para los miembros del grupo', 'sydney_toolbox' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail'),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 30,
		'menu_icon'             => 'dashicons-businessman',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'rewrite' 				=> array( 'slug' => 'miembros' ),
	);

	register_post_type( 'miembros', $args );
}

add_action( 'init', 'registrar_miembros', 0 );
