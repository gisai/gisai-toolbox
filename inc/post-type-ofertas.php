<?php

/**
 * Este archivo registra el post Ofertas
 */


// Registrar ofertas
function registrar_ofertas() {

	$labels = array(
		'name'                  => _x( 'Ofertas', 'Post Type General Name', 'sydney_toolbox' ),
		'singular_name'         => _x( 'Oferta', 'Post Type Singular Name', 'sydney_toolbox' ),
		'menu_name'             => __( 'Ofertas', 'sydney_toolbox' ),
		'name_admin_bar'        => __( 'Ofertas', 'sydney_toolbox' ),
		'archives'              => __( 'Archivo de ofertas', 'sydney_toolbox' ),
		'all_items'             => __( 'Todas las ofertas', 'sydney_toolbox' ),
		'add_new_item'          => __( 'Añadir nueva oferta', 'sydney_toolbox' ),
		'add_new'               => __( 'Añadir', 'sydney_toolbox' ),
		'new_item'              => __( 'Nueva oferta', 'sydney_toolbox' ),
		'edit_item'             => __( 'Editar oferta', 'sydney_toolbox' ),
		'update_item'           => __( 'Actualizar oferta', 'sydney_toolbox' ),
		'view_item'             => __( 'Ver oferta', 'sydney_toolbox' ),
		'search_items'          => __( 'Buscar oferta', 'sydney_toolbox' ),
		'not_found'             => __( 'No se ha encontrado ninguna oferta', 'sydney_toolbox' ),
		'not_found_in_trash'    => __( 'No se ha encontrado ninguna oferta en la papelera', 'sydney_toolbox' ),
		'featured_image'        => __( 'Imagen destacada', 'sydney_toolbox' ),
		'set_featured_image'    => __( 'Establecer como imagen destacada', 'sydney_toolbox' ),
		'remove_featured_image' => __( 'Eliminar imagen destacada', 'sydney_toolbox' ),
		'use_featured_image'    => __( 'Usar como imagen destacada', 'sydney_toolbox' ),
	);

	$args = array(
		'label'                 => __( 'Oferta', 'sydney_toolbox' ),
		'description'           => __( 'Custom post para las ofertas del grupo', 'sydney_toolbox' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 26,
		'menu_icon'             => 'dashicons-id-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'rewrite' 				=> array( 'slug' => 'ofertas' ),
	);

	register_post_type( 'ofertas', $args );
}

add_action( 'init', 'registrar_ofertas', 0 );
