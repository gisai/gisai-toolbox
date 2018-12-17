<?php

/**
 * Este archivo registra el post Proyectos
 */

// Registrar proyectos
function registrar_proyectos() {

	$labels = array(
		'name'                  => _x( 'Proyectos', 'Post Type General Name', 'sydney_toolbox' ),
		'singular_name'         => _x( 'Proyecto', 'Post Type Singular Name', 'sydney_toolbox' ),
		'menu_name'             => __( 'Proyectos', 'sydney_toolbox' ),
		'name_admin_bar'        => __( 'Proyectos', 'sydney_toolbox' ),
		'archives'              => __( 'Archivos de proyectos', 'sydney_toolbox' ),
		'all_items'             => __( 'Todos los proyectos', 'sydney_toolbox' ),
		'add_new_item'          => __( 'Añadir nuevo proyecto', 'sydney_toolbox' ),
		'add_new'               => __( 'Añadir', 'sydney_toolbox' ),
		'new_item'              => __( 'Nuevo proyecto', 'sydney_toolbox' ),
		'edit_item'             => __( 'Editar proyecto', 'sydney_toolbox' ),
		'update_item'           => __( 'Actualizar proyecto', 'sydney_toolbox' ),
		'view_item'             => __( 'Ver proyecto', 'sydney_toolbox' ),
		'search_items'          => __( 'Buscar proyecto', 'sydney_toolbox' ),
		'not_found'             => __( 'No se ha encontrado ningún proyecto', 'sydney_toolbox' ),
		'not_found_in_trash'    => __( 'No se ha encontrado ningún proyecto en la papelera', 'sydney_toolbox' ),
		'featured_image'        => __( 'Imagen destacada', 'sydney_toolbox' ),
		'set_featured_image'    => __( 'Establecer como imagen destacada', 'sydney_toolbox' ),
		'remove_featured_image' => __( 'Eliminar imagen destacada', 'sydney_toolbox' ),
		'use_featured_image'    => __( 'Usar como imagen destacada', 'sydney_toolbox' ),
	);

	$args = array(
		'label'                 => __( 'Proyecto', 'sydney_toolbox' ),
		'description'           => __( 'Custom post para los proyectos del grupo', 'sydney_toolbox' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 26,
		'menu_icon'             => 'dashicons-portfolio',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'rewrite' 				=> array( 'slug' => 'proyectos' ),
	);

	register_post_type( 'proyectos', $args );
}

add_action( 'init', 'registrar_proyectos', 0 );
