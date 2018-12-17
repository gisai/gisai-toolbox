<?php

/**
 * Este archivo define y registra los metadatos y la metabox de el post Miembros
 */

function miembros_metabox() {
    new Miembros_Metabox();
}

if ( is_admin() ) {
    add_action( 'load-post.php', 'miembros_metabox' );
    add_action( 'load-post-new.php', 'miembros_metabox' );
}

class Miembros_Metabox {

	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}

	public function add_meta_box( $post_type ) {
    global $post;
		add_meta_box(
			'miembros_metabox'
			,__( 'Información del miembro', 'sydney_toolbox' )
			,array( $this, 'render_meta_box_content' )
			,'miembros'
			,'advanced'
			,'high'
		);
	}

	public function save( $post_id ) {

		if ( ! isset( $_POST['miembros_nonce'] ) )
			return $post_id;

		$nonce = $_POST['miembros_nonce'];

		if ( ! wp_verify_nonce( $nonce, 'miembros' ) )
			return $post_id;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;

		if ( 'miembros' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) )
				return $post_id;

		} else {

			if ( ! current_user_can( 'edit_post', $post_id ) )
				return $post_id;
		}

    $nombre   = isset( $_POST['nombre'] ) ? sanitize_text_field($_POST['nombre']) : false;
		$posicion = isset( $_POST['posicion'] ) ? sanitize_text_field($_POST['posicion']) : false;
		$correo 	= isset( $_POST['correo'] ) ? sanitize_email($_POST['correo']) : false;
		$enlace 	= isset( $_POST['enlace'] ) ? esc_url_raw($_POST['enlace']) : false;

    update_post_meta( $post_id, 'wpcf-miembro-nombre', $nombre );
		update_post_meta( $post_id, 'wpcf-miembro-posicion', $posicion );
		update_post_meta( $post_id, 'wpcf-miembro-correo', $correo );
		update_post_meta( $post_id, 'wpcf-miembro-enlace', $enlace );
	}

	public function render_meta_box_content( $post ) {

		wp_nonce_field( 'miembros', 'miembros_nonce' );

    $nombre   = get_post_meta( $post->ID, 'wpcf-miembro-nombre', true);
		$posicion = get_post_meta( $post->ID, 'wpcf-miembro-posicion', true );
		$correo  = get_post_meta( $post->ID, 'wpcf-miembro-correo', true );
		$enlace   = get_post_meta( $post->ID, 'wpcf-miembro-enlace', true );

	?>
    <p><strong><label for="nombre"><?php _e( 'Nombre', 'sydney_toolbox' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="nombre" name="nombre" value="<?php echo $nombre; ?>"></p>
		<p><strong><label for="correo"><?php _e( 'Dirección de correo electrónico', 'sydney_toolbox' ); ?></label></strong></p>
		<p><input type="text" class="widefat" id="correo" name="correo" value="<?php echo $correo; ?>"></p>
		<p><strong><label for="posicion"><?php _e( 'Posición', 'sydney_toolbox' ); ?></label></strong></p>
		<p><input type="text" class="widefat" id="posicion" name="posicion" value="<?php echo $posicion; ?>"></p>
		<p><strong><label for="enlace"><?php _e( 'Enlace personal', 'sydney_toolbox' ); ?></label></strong></p>
		<p><input type="text" class="widefat" id="enlace" name="enlace" value="<?php echo esc_url($enlace); ?>"></p>
  <?php

	}
}
