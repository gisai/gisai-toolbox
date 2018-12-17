<?php

/**
 * Este archivo define y registra los metadatos y la metabox de el post Colaboraciones
 */

function colaboraciones_metabox() {
    new Colaboraciones_Metabox();
}

if ( is_admin() ) {
    add_action( 'load-post.php', 'colaboraciones_metabox' );
    add_action( 'load-post-new.php', 'colaboraciones_metabox' );
}

class Colaboraciones_Metabox {

	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}

	public function add_meta_box( $post_type ) {
        global $post;
		add_meta_box(
			'colaboraciones_metabox'
			,__( 'Información de la empresa colaboradora', 'sydney_toolbox' )
			,array( $this, 'render_meta_box_content' )
			,'colaboraciones'
			,'advanced'
			,'high'
		);
	}

	public function save( $post_id ) {

		if ( ! isset( $_POST['colaboraciones_nonce'] ) )
			return $post_id;

		$nonce = $_POST['colaboraciones_nonce'];

		if ( ! wp_verify_nonce( $nonce, 'colaboraciones' ) )
			return $post_id;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;

		if ( 'colaboraciones' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) )
				return $post_id;

		} else {

			if ( ! current_user_can( 'edit_post', $post_id ) )
				return $post_id;
		}

		$enlace 	= isset( $_POST['colaboracion_enlace'] ) ? esc_url_raw($_POST['colaboracion_enlace']) : false;
		update_post_meta( $post_id, 'wpcf-colaboracion-enlace', $enlace );

	}

	public function render_meta_box_content( $post ) {
		wp_nonce_field( 'colaboraciones', 'colaboraciones_nonce' );

		$enlace = get_post_meta( $post->ID, 'wpcf-colaboracion-enlace', true );

	?>
		<p><strong><label for="colaboracion_enlace"><?php _e( 'Enlace', 'sydney_toolbox' ); ?></label></strong></p>
		<p><em><?php _e('Enlace a la página web de la empresa o enlace interno [opcional]', 'sdyney_toolbox'); ?></em></p>
		<p><input type="text" class="widefat" id="colaboracion_enlace" name="colaboracion_enlace" value="<?php echo esc_url($enlace); ?>"></p>
	<?php
  
	}
}
