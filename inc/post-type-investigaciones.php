<?php

/**
 * Este archivo registra el post Investigaciones
 */

// Registrar Investigaciones
function registrar_investigaciones() {

	$labels = array(
		'name'                  => _x( 'Investigaciones', 'Post Type General Name', 'sydney_toolbox' ),
		'singular_name'         => _x( 'Investigación', 'Post Type Singular Name', 'sydney_toolbox' ),
		'menu_name'             => __( 'Investigaciones', 'sydney_toolbox' ),
		'name_admin_bar'        => __( 'Investigaciones', 'sydney_toolbox' ),
		'archives'              => __( 'Archivos de investigaciones', 'sydney_toolbox' ),
		'all_items'             => __( 'Todas las investigaciones', 'sydney_toolbox' ),
		'add_new_item'          => __( 'Añadir nueva investigación', 'sydney_toolbox' ),
		'add_new'               => __( 'Añadir', 'sydney_toolbox' ),
		'new_item'              => __( 'Nueva investigación', 'sydney_toolbox' ),
		'edit_item'             => __( 'Editar investigación', 'sydney_toolbox' ),
		'update_item'           => __( 'Actualizar investigación', 'sydney_toolbox' ),
		'view_item'             => __( 'Ver investigación', 'sydney_toolbox' ),
		'search_items'          => __( 'Buscar investigación', 'sydney_toolbox' ),
		'not_found'             => __( 'No se ha encontrado ninguna investigación', 'sydney_toolbox' ),
		'not_found_in_trash'    => __( 'No se ha encontrado ninguna investigación en la papelera', 'sydney_toolbox' ),
		'featured_image'        => __( 'Imagen destacada', 'sydney_toolbox' ),
		'set_featured_image'    => __( 'Establecer como imagen destacada', 'sydney_toolbox' ),
		'remove_featured_image' => __( 'Eliminar imagen destacada', 'sydney_toolbox' ),
		'use_featured_image'    => __( 'Usar como imagen destacada', 'sydney_toolbox' ),
	);

	$args = array(
		'label'                 => __( 'Investigacion', 'sydney_toolbox' ),
		'description'           => __( 'Custom post para las investigaciones del grupo', 'sydney_toolbox' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail'),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 28,
		'menu_icon'             => 'dashicons-lightbulb',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'rewrite' 				=> array( 'slug' => 'investigaciones' ),
	);

	register_post_type( 'investigaciones', $args );
}

add_action( 'init', 'registrar_investigaciones', 0 );
