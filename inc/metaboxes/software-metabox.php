<?php

/**
 * Este archivo define y registra los metadatos y la metabox de el post Software
 */


function software_metabox() {
    new Software_Metabox();
}

if ( is_admin() ) {
    add_action( 'load-post.php', 'software_metabox' );
    add_action( 'load-post-new.php', 'software_metabox' );
}

class Software_Metabox {

	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}

	public function add_meta_box( $post_type ) {
        global $post;
		add_meta_box(
			'softwares_metabox'
			,__( 'Información del software', 'sydney_toolbox' )
			,array( $this, 'render_meta_box_content' )
			,'software'
			,'advanced'
			,'high'
		);
	}

	public function save( $post_id ) {

		if ( ! isset( $_POST['software_nonce'] ) )
			return $post_id;

		$nonce = $_POST['software_nonce'];

		if ( ! wp_verify_nonce( $nonce, 'software' ) )
			return $post_id;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;

		if ( 'software' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) )
				return $post_id;

		} else {

			if ( ! current_user_can( 'edit_post', $post_id ) )
				return $post_id;
		}

		$titulo = isset( $_POST['titulo'] ) ? $_POST['titulo'] : false;
		update_post_meta( $post_id, 'wpcf-software-titulo', $titulo );
    $objeto_pi = isset( $_POST['objeto-pi'] ) ? $_POST['objeto-pi'] : false;
		update_post_meta( $post_id, 'wpcf-software-objeto-pi', $objeto_pi );
    $clase_obra = isset( $_POST['clase-obra'] ) ? $_POST['clase-obra'] : false;
		update_post_meta( $post_id, 'wpcf-software-clase-obra', $clase_obra );
    $lugar_divulgacion = isset( $_POST['lugar-divulgacion'] ) ? $_POST['lugar-divulgacion'] : false;
		update_post_meta( $post_id, 'wpcf-software-lugar-divulgacion', $lugar_divulgacion );
    $fecha_divulgacion = isset( $_POST['fecha-divulgacion'] ) ? $_POST['fecha-divulgacion'] : false;
		update_post_meta( $post_id, 'wpcf-software-fecha-divulgacion', $fecha_divulgacion );
    $autor = isset( $_POST['autor'] ) ? $_POST['autor'] : false;
		update_post_meta( $post_id, 'wpcf-software-autor', $autor );
    $titular_cesionario = isset( $_POST['titular-cesionario'] ) ? $_POST['titular-cesionario'] : false;
		update_post_meta( $post_id, 'wpcf-software-titular-cesionario', $titular_cesionario );
    $derechos_cedidos = isset( $_POST['derechos-cedidos'] ) ? $_POST['derechos-cedidos'] : false;
		update_post_meta( $post_id, 'wpcf-software-derechos-cedidos', $derechos_cedidos );
    $modalidades_cedidas = isset( $_POST['modalidades-cedidas'] ) ? $_POST['modalidades-cedidas'] : false;
		update_post_meta( $post_id, 'wpcf-software-modalidades-cedidas', $modalidades_cedidas );
    $ambito_territorial = isset( $_POST['ambito-territorial'] ) ? $_POST['ambito-territorial'] : false;
		update_post_meta( $post_id, 'wpcf-software-ambito-territorial', $ambito_territorial );
    $ambito_temporal = isset( $_POST['ambito-temporal'] ) ? $_POST['ambito-temporal'] : false;
		update_post_meta( $post_id, 'wpcf-software-ambito-temporal', $ambito_temporal );
    $caracter = isset( $_POST['caracter'] ) ? $_POST['caracter'] : false;
		update_post_meta( $post_id, 'wpcf-software-caracter', $caracter );
    $enlace = isset( $_POST['enlace'] ) ? esc_url_raw($_POST['enlace']) : false;
		update_post_meta( $post_id, 'wpcf-software-enlace', $enlace );
	}

	public function render_meta_box_content( $post ) {
		wp_nonce_field( 'software', 'software_nonce' );

    $titulo = get_post_meta( $post->ID, 'wpcf-software-titulo', true);
    $objeto_pi = get_post_meta( $post->ID, 'wpcf-software-objeto-pi', true);
    $clase_obra = get_post_meta( $post->ID, 'wpcf-software-clase-obra', true);
    $lugar_divulgacion = get_post_meta( $post->ID, 'wpcf-software-lugar-divulgacion', true);
    $fecha_divulgacion = get_post_meta( $post->ID, 'wpcf-software-fecha-divulgacion', true);
    $autor = get_post_meta( $post->ID, 'wpcf-software-autor', true);
    $titular_cesionario = get_post_meta( $post->ID, 'wpcf-software-titular-cesionario', true);
    $derechos_cedidos = get_post_meta( $post->ID, 'wpcf-software-derechos-cedidos', true);
    $modalidades_cedidas = get_post_meta( $post->ID, 'wpcf-software-modalidades-cedidas', true);
    $ambito_territorial = get_post_meta( $post->ID, 'wpcf-software-ambito-territorial', true);
    $ambito_temporal = get_post_meta( $post->ID, 'wpcf-software-ambito-temporal', true);
    $caracter = get_post_meta( $post->ID, 'wpcf-software-caracter', true);
    $enlace = get_post_meta( $post->ID, 'wpcf-software-enlace', true);

	?>

    <p><strong><label><?php _e( 'Características del registro', 'sydney_toolbox' ); ?></label></strong></p>
    <p><em><?php _e('Titulo', 'sdyney_toolbox'); ?></em></p>
    <p><input type="text" class="widefat" id="titulo" name="titulo" value="<?php echo $titulo; ?>"></p>
    <p><em><?php _e('Objeto de propiedad intelectual', 'sdyney_toolbox'); ?></em></p>
    <p><input type="text" class="widefat" id="objeto-pi" name="objeto-pi" value="<?php echo $objeto_pi; ?>"></p>
    <p><em><?php _e('Clase de obra', 'sdyney_toolbox'); ?></em></p>
    <p><input type="text" class="widefat" id="clase-obra" name="clase-obra" value="<?php echo $clase_obra; ?>"></p>
    <p><em><?php _e('Lugar de divulgación', 'sdyney_toolbox'); ?></em></p>
    <p><input type="text" class="widefat" id="lugar_divulgacion" name="lugar-divulgacion" value="<?php echo $lugar_divulgacion; ?>"></p>
    <p><em><?php _e('Fecha de divulgación', 'sdyney_toolbox'); ?></em></p>
    <p><input type="text" class="widefat" id="fecha-divulgacion" name="fecha-divulgacion" value="<?php echo $fecha_divulgacion; ?>"></p>

    <p><strong><label for="autor"><?php _e( 'Autor/es y tutular/es originarios de derechos', 'sydney_toolbox' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="autor" name="autor" value="<?php echo $autor; ?>"></p>

    <p><strong><label><?php _e( 'Transmisión de derechos', 'sydney_toolbox' ); ?></label></strong></p>
    <p><em><?php _e('Titular cesionario', 'sdyney_toolbox'); ?></em></p>
    <p><input type="text" class="widefat" id="titular-cesionario" name="titular-cesionario" value="<?php echo $titular_cesionario; ?>"></p>
    <p><em><?php _e('Derechos cedidos', 'sdyney_toolbox'); ?></em></p>
    <p><input type="text" class="widefat" id="derechos-cedidos" name="derechos-cedidos" value="<?php echo $derechos_cedidos; ?>"></p>
    <p><em><?php _e('Modalidades cedidas', 'sdyney_toolbox'); ?></em></p>
    <p><input type="text" class="widefat" id="modalidades-cedidas" name="modalidades-cedidas" value="<?php echo $modalidades_cedidas; ?>"></p>
    <p><em><?php _e('Ámbito territorial', 'sdyney_toolbox'); ?></em></p>
    <p><input type="text" class="widefat" id="ambito-territorial" name="ambito-territorial" value="<?php echo $ambito_territorial; ?>"></p>
    <p><em><?php _e('Ámbito temporal', 'sdyney_toolbox'); ?></em></p>
    <p><input type="text" class="widefat" id="ambito-temporal" name="ambito-temporal" value="<?php echo $ambito_temporal; ?>"></p>
    <p><em><?php _e('Caracter de la cesión', 'sdyney_toolbox'); ?></em></p>
    <p><input type="text" class="widefat" id="caracter" name="caracter" value="<?php echo $caracter; ?>"></p>

    <p><strong><label for="enlace"><?php _e( 'Enlace al repositorio github del software', 'sydney_toolbox' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="enlace" name="enlace" value="<?php echo $enlace; ?>"></p>

	<?php
	}

}
