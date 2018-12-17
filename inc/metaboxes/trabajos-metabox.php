<?php

/**
 * Este archivo define y registra los metadatos y la metabox de el post Software
 */


function trabajos_metabox() {
    new Trabajos_Metabox();
}

if ( is_admin() ) {
    add_action( 'load-post.php', 'trabajos_metabox' );
    add_action( 'load-post-new.php', 'trabajos_metabox' );
}

class Trabajos_Metabox {

	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}

	public function add_meta_box( $post_type ) {
        global $post;
		add_meta_box(
			'trabajos_metabox'
			,__( 'Información del trabajo', 'sydney_toolbox' )
			,array( $this, 'render_meta_box_content' )
			,'trabajos'
			,'advanced'
			,'high'
		);
	}

	public function save( $post_id ) {

		if ( ! isset( $_POST['trabajos_nonce'] ) )
			return $post_id;

		$nonce = $_POST['trabajos_nonce'];

		if ( ! wp_verify_nonce( $nonce, 'trabajos' ) )
			return $post_id;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;

		if ( 'trabajos' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) )
				return $post_id;

		} else {

			if ( ! current_user_can( 'edit_post', $post_id ) )
				return $post_id;
		}

		$titulo = isset( $_POST['titulo'] ) ? $_POST['titulo'] : false;
		update_post_meta( $post_id, 'wpcf-trabajo-titulo', $titulo );
    $autor = isset( $_POST['autor'] ) ? $_POST['autor'] : false;
		update_post_meta( $post_id, 'wpcf-trabajo-autor', $autor );
    $director = isset( $_POST['director'] ) ? $_POST['director'] : false;
		update_post_meta( $post_id, 'wpcf-trabajo-director', $director );
    $titulo = isset( $_POST['titulo'] ) ? $_POST['titulo'] : false;
    update_post_meta( $post_id, 'wpcf-trabajo-titulo', $titulo );
    $tipo = isset( $_POST['tipo'] ) ? $_POST['tipo'] : false;
    update_post_meta( $post_id, 'wpcf-trabajo-tipo', $tipo );
    $fecha = isset( $_POST['fecha'] ) ? $_POST['fecha'] : false;
    update_post_meta( $post_id, 'wpcf-trabajo-fecha', $fecha );
    $materias = isset( $_POST['materias'] ) ? $_POST['materias'] : false;
    update_post_meta( $post_id, 'wpcf-trabajo-materias', $materias );
    $palabras = isset( $_POST['palabras'] ) ? $_POST['palabras'] : false;
    update_post_meta( $post_id, 'wpcf-trabajo-palabras', $palabras );
    $escuela = isset( $_POST['escuela'] ) ? $_POST['escuela'] : false;
    update_post_meta( $post_id, 'wpcf-trabajo-escuela', $escuela );
    $departamento = isset( $_POST['departamento'] ) ? $_POST['departamento'] : false;
    update_post_meta( $post_id, 'wpcf-trabajo-departamento', $departamento );
    $licencias = isset( $_POST['licencias'] ) ? $_POST['licencias'] : false;
    update_post_meta( $post_id, 'wpcf-trabajo-licencias', $licencias );
    $resumen = isset( $_POST['resumen'] ) ? $_POST['resumen'] : false;
    update_post_meta( $post_id, 'wpcf-trabajo-resumen', $resumen );
    $enlace = isset( $_POST['enlace'] ) ? $_POST['enlace'] : false;
    update_post_meta( $post_id, 'wpcf-trabajo-enlace', $enlace );

	}

	public function render_meta_box_content( $post ) {
		wp_nonce_field( 'trabajos', 'trabajos_nonce' );

    $titulo = get_post_meta( $post->ID, 'wpcf-trabajo-titulo', true);
    $autor  = get_post_meta( $post->ID, 'wpcf-trabajo-autor', true);
    $director  = get_post_meta( $post->ID, 'wpcf-trabajo-director', true);
    $tipo   = get_post_meta( $post->ID, 'wpcf-trabajo-tipo', true);
    $fecha  = get_post_meta( $post->ID, 'wpcf-trabajo-fecha', true);
    $materias  = get_post_meta( $post->ID, 'wpcf-trabajo-materias', true);
    $palabras  = get_post_meta( $post->ID, 'wpcf-trabajo-palabras', true);
    $escuela  = get_post_meta( $post->ID, 'wpcf-trabajo-escuela', true);
    $departamento  = get_post_meta( $post->ID, 'wpcf-trabajo-departamento', true);
    $licencias  = get_post_meta( $post->ID, 'wpcf-trabajo-licencias', true);
    $resumen  = get_post_meta( $post->ID, 'wpcf-trabajo-resumen', true);
    $enlace = get_post_meta( $post->ID, 'wpcf-trabajo-enlace', true);

	?>

    <p><strong><label><?php _e( 'Título del trabajo de investigación', 'sydney_toolbox' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="titulo" name="titulo" value="<?php echo $titulo; ?>"></p>
    <p><strong><label><?php _e( 'Autor/es del trabajo', 'sydney_toolbox' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="autor" name="autor" value="<?php echo $autor; ?>"></p>
    <p><strong><label><?php _e( 'Director/es del trabajo', 'sydney_toolbox' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="director" name="director" value="<?php echo $director; ?>"></p>
    <p><strong><label><?php _e( 'Tipo de documento', 'sydney_toolbox' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="tipo" name="tipo" value="<?php echo $tipo; ?>"></p>
    <p><strong><label><?php _e( 'Fecha', 'sydney_toolbox' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="fecha" name="fecha" value="<?php echo $fecha; ?>"></p>
    <p><strong><label><?php _e( 'Materias', 'sydney_toolbox' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="materias" name="materias" value="<?php echo $materias; ?>"></p>
    <p><strong><label><?php _e( 'Palabras clave informales', 'sydney_toolbox' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="palabras" name="palabras" value="<?php echo $palabras; ?>"></p>
    <p><strong><label><?php _e( 'Escuela', 'sydney_toolbox' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="escuela" name="escuela" value="<?php echo $escuela; ?>"></p>
    <p><strong><label><?php _e( 'Departamento', 'sydney_toolbox' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="departamento" name="departamento" value="<?php echo $departamento; ?>"></p>
    <p><strong><label><?php _e( 'Licencias Creative Commons', 'sydney_toolbox' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="licencias" name="licencias" value="<?php echo $licencias; ?>"></p>
    <p><strong><label><?php _e( 'Resumen', 'sydney_toolbox' ); ?></label></strong></p>
    <p><textarea name="resumen" id="resumen" rows="5" cols="30" style="width:100%;"><?php echo $resumen; ?></textarea></p>
    <p><strong><label><?php _e( 'Enlace', 'sydney_toolbox' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="enlace" name="enlace" value="<?php echo $enlace; ?>"></p>

	<?php
	}

}
