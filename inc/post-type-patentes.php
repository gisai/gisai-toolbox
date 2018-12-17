<?php

/**
 * Este archivo registra el post Patentes
 */

// Registrar patentes
function registrar_patentes() {

	$labels = array(
		'name'                  => _x( 'Patentes', 'Post Type General Name', 'sydney_toolbox' ),
		'singular_name'         => _x( 'Patente', 'Post Type Singular Name', 'sydney_toolbox' ),
		'menu_name'             => __( 'Patentes', 'sydney_toolbox' ),
		'name_admin_bar'        => __( 'Patentes', 'sydney_toolbox' ),
		'archives'              => __( 'Archivos de patentes', 'sydney_toolbox' ),
		'all_items'             => __( 'Todas las patentes', 'sydney_toolbox' ),
		'add_new_item'          => __( 'Añadir nueva patente', 'sydney_toolbox' ),
		'add_new'               => __( 'Añadir', 'sydney_toolbox' ),
		'new_item'              => __( 'Nueva patente', 'sydney_toolbox' ),
		'edit_item'             => __( 'Editar patente', 'sydney_toolbox' ),
		'update_item'           => __( 'Actualizar patente', 'sydney_toolbox' ),
		'view_item'             => __( 'Ver patente', 'sydney_toolbox' ),
		'search_items'          => __( 'Buscar patente', 'sydney_toolbox' ),
		'not_found'             => __( 'No se ha encontrado ninguna patente', 'sydney_toolbox' ),
		'not_found_in_trash'    => __( 'No se ha encontrado ninguna patente en la papelera', 'sydney_toolbox' ),
		'featured_image'        => __( 'Imagen destacada', 'sydney_toolbox' ),
		'set_featured_image'    => __( 'Establecer como imagen destacada', 'sydney_toolbox' ),
		'remove_featured_image' => __( 'Eliminar imagen destacada', 'sydney_toolbox' ),
		'use_featured_image'    => __( 'Usar como imagen destacada', 'sydney_toolbox' ),
	);

	$args = array(
		'label'                 => __( 'Patente', 'sydney_toolbox' ),
		'description'           => __( 'Custom post para las patentes del grupo', 'sydney_toolbox' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 26,
		'menu_icon'             => 'dashicons-lock',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'rewrite' 				=> array( 'slug' => 'patentes' ),
	);

	register_post_type( 'patentes', $args );
}

add_action( 'init', 'registrar_patentes', 0 );
