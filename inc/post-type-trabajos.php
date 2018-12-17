<?php

/**
 * Este archivo registra el post Proyectos
 */

// Registrar proyectos
function registrar_trabajos() {

	$labels = array(
		'name'                  => _x( 'Trabajos de investigación', 'Post Type General Name', 'sydney_toolbox' ),
		'singular_name'         => _x( 'Nuevo trabajo de investigación', 'Post Type Singular Name', 'sydney_toolbox' ),
		'menu_name'             => __( 'Tesis/PFC/TFG', 'sydney_toolbox' ),
		'name_admin_bar'        => __( 'Tesis/PFC/TFG', 'sydney_toolbox' ),
		'all_items'             => __( 'Todos los trabajos de investigación', 'sydney_toolbox' ),
		'add_new_item'          => __( 'Añadir nuevo trabajo de investigación', 'sydney_toolbox' ),
		'add_new'               => __( 'Añadir', 'sydney_toolbox' ),
		'new_item'              => __( 'Nuevo trabajo de investigación', 'sydney_toolbox' ),
		'edit_item'             => __( 'Editar trabajo de investigación', 'sydney_toolbox' ),
		'update_item'           => __( 'Actualizar trabajo de investigación', 'sydney_toolbox' ),
		'view_item'             => __( 'Ver trabajo de investigación', 'sydney_toolbox' ),
		'search_items'          => __( 'Buscar trabajo de investigación', 'sydney_toolbox' ),
		'not_found'             => __( 'No se ha encontrado ningún trabajo de investigación', 'sydney_toolbox' ),
		'not_found_in_trash'    => __( 'No se ha encontrado ningún trabajo de investigación en la papelera', 'sydney_toolbox' ),
		'featured_image'        => __( 'Imagen destacada', 'sydney_toolbox' ),
		'set_featured_image'    => __( 'Establecer como imagen destacada', 'sydney_toolbox' ),
		'remove_featured_image' => __( 'Eliminar imagen destacada', 'sydney_toolbox' ),
		'use_featured_image'    => __( 'Usar como imagen destacada', 'sydney_toolbox' ),
	);

	$args = array(
		'label'                 => __( 'Trabajo', 'sydney_toolbox' ),
		'description'           => __( 'Custom post para los trabajos de investigación del grupo', 'sydney_toolbox' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 26,
		'menu_icon'             => 'dashicons-paperclip',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'rewrite' 				=> array( 'slug' => 'trabajos' ),
	);

	register_post_type( 'trabajos', $args );
}

add_action( 'init', 'registrar_trabajos', 0 );
