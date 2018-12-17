<?php

/**
 * Este archivo define y registra los metadatos y la metabox de el post Patentes
 */


function patentes_metabox() {
    new Patentes_Metabox();
}

if ( is_admin() ) {
    add_action( 'load-post.php', 'patentes_metabox' );
    add_action( 'load-post-new.php', 'patentes_metabox' );
}

class Patentes_Metabox {

	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}

	public function add_meta_box( $post_type ) {
        global $post;
		add_meta_box(
			'patentes_metabox'
			,__( 'Información de la patente', 'sydney_toolbox' )
			,array( $this, 'render_meta_box_content' )
			,'patentes'
			,'advanced'
			,'high'
		);
	}

	public function save( $post_id ) {

		if ( ! isset( $_POST['patentes_nonce'] ) )
			return $post_id;

		$nonce = $_POST['patentes_nonce'];

		if ( ! wp_verify_nonce( $nonce, 'patentes' ) )
			return $post_id;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;

		if ( 'patentes' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) )
				return $post_id;

		} else {

			if ( ! current_user_can( 'edit_post', $post_id ) )
				return $post_id;
		}

		$titulo = isset( $_POST['titulo'] ) ? $_POST['titulo'] : false;
		update_post_meta( $post_id, 'wpcf-patente-titulo', $titulo );
    $titular = isset( $_POST['titular'] ) ? $_POST['titular'] : false;
    update_post_meta( $post_id, 'wpcf-patente-titular', $titular );
    $inventor = isset( $_POST['inventor'] ) ? $_POST['inventor'] : false;
    update_post_meta( $post_id, 'wpcf-patente-inventor', $inventor );
    $agente = isset( $_POST['agente'] ) ? $_POST['agente'] : false;
    update_post_meta( $post_id, 'wpcf-patente-agente', $agente );
    $numero_publicacion = isset( $_POST['numero-publicacion'] ) ? $_POST['numero-publicacion'] : false;
    update_post_meta( $post_id, 'wpcf-patente-numero-publicacion', $numero_publicacion );
    $numero_solicitud = isset( $_POST['numero-solicitud'] ) ? $_POST['numero-solicitud'] : false;
    update_post_meta( $post_id, 'wpcf-patente-numero-solicitud', $numero_solicitud );
    $fecha_presentacion = isset( $_POST['fecha-presentacion'] ) ? $_POST['fecha-presentacion'] : false;
    update_post_meta( $post_id, 'wpcf-patente-fecha-presentacion', $fecha_presentacion );
    $fecha_publicacion = isset( $_POST['fecha-publicacion'] ) ? $_POST['fecha-publicacion'] : false;
    update_post_meta( $post_id, 'wpcf-patente-fecha-publicacion', $fecha_publicacion );
	}

	public function render_meta_box_content( $post ) {
		wp_nonce_field( 'patentes', 'patentes_nonce' );

    $titulo = get_post_meta( $post->ID, 'wpcf-patente-titulo', true);
    $titular = get_post_meta( $post->ID, 'wpcf-patente-titular', true);
    $inventor = get_post_meta( $post->ID, 'wpcf-patente-inventor', true);
    $agente = get_post_meta( $post->ID, 'wpcf-patente-agente', true);
    $numero_publicacion = get_post_meta( $post->ID, 'wpcf-patente-numero-publicacion', true);
    $numero_solicitud = get_post_meta( $post->ID, 'wpcf-patente-numero-solicitud', true);
    $fecha_presentacion = get_post_meta( $post->ID, 'wpcf-patente-fecha-presentacion', true);
    $fecha_publicacion = get_post_meta( $post->ID, 'wpcf-patente-fecha-publicacion', true);

	?>

    <p><strong><label for="titulo"><?php _e( 'Título de la patente', 'sydney_toolbox' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="titulo" name="titulo" value="<?php echo $titulo; ?>"></p>

    <p><strong><label for="titular"><?php _e( 'Titular/es de la patente', 'sydney_toolbox' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="titular" name="titular" value="<?php echo $titular; ?>"></p>

    <p><strong><label for="inventor"><?php _e( 'Inventor/es de la patente', 'sydney_toolbox' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="inventor" name="inventor" value="<?php echo $inventor; ?>"></p>

    <p><strong><label for="agente"><?php _e( 'Agente/Representante de la patente', 'sydney_toolbox' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="agente" name="agente" value="<?php echo $agente; ?>"></p>

    <p><strong><label for="numero-publicacion"><?php _e( 'Número de publicación', 'sydney_toolbox' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="numero-publicacion" name="numero-publicacion" value="<?php echo $numero_publicacion; ?>"></p>

    <p><strong><label for="numero-solicitud"><?php _e( 'Número de solicitud', 'sydney_toolbox' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="numero-solicitud" name="numero-solicitud" value="<?php echo $numero_solicitud; ?>"></p>

    <p><strong><label for="fecha-presentacion"><?php _e( 'Fecha de presentacion', 'sydney_toolbox' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="fecha-presentacion" name="fecha-presentacion" value="<?php echo $fecha_presentacion; ?>"></p>

    <p><strong><label for="fecha-publicacion"><?php _e( 'Fecha de publicación de la concesión', 'sydney_toolbox' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="fecha-publicacion" name="fecha-publicacion" value="<?php echo $fecha_publicacion; ?>"></p>


	<?php
	}

}
