<?php

/**
 * Este archivo define y registra los metadatos y la metabox de todas las páginas
 */

function pagina_metabox() {
    new Pagina_Metabox();
}

if ( is_admin() ) {
    add_action( 'load-post.php', 'pagina_metabox' );
    add_action( 'load-post-new.php', 'pagina_metabox' );
}

class Pagina_Metabox {

	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}

	public function add_meta_box( $post_type ) {
        global $post;
        $list_post = array('page');
        if ( in_array( $post_type, $list_post )) {
			add_meta_box(
				'pagina_metabox'
				,__( 'Opciones de página/entrada', 'gisai_toolbox' )
				,array( $this, 'render_meta_box_content' )
				,$post_type
				,'advanced'
				,'high'
			);
		}
	}

	public function save( $post_id ) {

		if ( ! isset( $_POST['paginas_nonce'] ) )
			return $post_id;

		$nonce = $_POST['paginas_nonce'];

		if ( ! wp_verify_nonce( $nonce, 'paginas' ) )
			return $post_id;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;

		if ( 'page' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) )
				return $post_id;

		} else {

			if ( ! current_user_can( 'edit_post', $post_id ) )
				return $post_id;
		}

		$icono		  = isset( $_POST['icono'] ) ? sanitize_text_field($_POST['icono']) : false;
		$post				= isset( $_POST['post'] ) ? sanitize_text_field($_POST['post']) : false;
    $posts_por_pagina = isset( $_POST['posts-por-pagina'] ) ? $_POST['posts-por-pagina'] : -1;

		update_post_meta( $post_id, 'wpcf-pagina-icono', $icono );
		update_post_meta( $post_id, 'wpcf-pagina-post', $post);
    update_post_meta( $post_id, 'wpcf-pagina-ppp', $posts_por_pagina);
	}

	public function render_meta_box_content( $post ) {
		wp_nonce_field( 'paginas', 'paginas_nonce' );

    $posts_por_pagina = get_post_meta( $post->ID, 'wpcf-pagina-ppp', true);
		$icono 	    = get_post_meta( $post->ID, 'wpcf-pagina-icono', true );
		$post       = get_post_meta( $post->ID, 'wpcf-pagina-post', true);

	?>

		<p><strong><label for="icono"><?php _e( 'Icono de la página', 'gisai_toolbox' ); ?></label></strong></p>
		<p><input type="text" class="widefat" id="icono" name="icono" value="<?php echo $icono ?>"></p>
		<p><strong><label for="post"><?php _e( 'Tipo de posts que mostrar', 'gisai_toolbox' ); ?></label></strong></p>
		<p><em><?php echo __('Para la plantilla "Lista de posts" es necesario escribir aquí el slug del tipo de posts que se mostrarán en la lista (proyectos, patentes, software, colaboraciones, investigaciones, miembros, ofertas)'); ?></em></p>
		<p><input type="text" class="widefat" id="post" name="post" value="<?php echo $post ?>"></p>
		<p><strong><label for="posts-por-pagina"><?php _e( 'Número de posts a mostrar en esta página', 'gisai_toolbox' ); ?></label></strong></p>
		<p><em><?php echo __('Si el número de posts total de este tipo es mayor que este valor, se aplicará paginación a las entradas'); ?></em></p>
		<p><input type="text" class="widefat" id="posts-por-pagina" name="posts-por-pagina" value="<?php echo $posts_por_pagina ?>"></p>
	<?php

	}

}
