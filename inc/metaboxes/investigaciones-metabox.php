<?php

/**
 * Este archivo define y registra los metadatos y la metabox de el post Investigaciones
 */


function investigaciones_metabox() {
    new Investigaciones_Metabox();
}

if ( is_admin() ) {
    add_action( 'load-post.php', 'investigaciones_metabox' );
    add_action( 'load-post-new.php', 'investigaciones_metabox' );
}

class Investigaciones_Metabox {

	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}

	public function add_meta_box( $post_type ) {
        global $post;
		add_meta_box(
			'investigaciones_metabox'
			,__( 'Información de la investigación', 'sydney_toolbox' )
			,array( $this, 'render_meta_box_content' )
			,'investigaciones'
			,'advanced'
			,'high'
		);
	}

	public function save( $post_id ) {

		if ( ! isset( $_POST['investigaciones_nonce'] ) )
			return $post_id;

		$nonce = $_POST['investigaciones_nonce'];

		if ( ! wp_verify_nonce( $nonce, 'investigaciones' ) )
			return $post_id;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;

		if ( 'investigaciones' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) )
				return $post_id;

		} else {

			if ( ! current_user_can( 'edit_post', $post_id ) )
				return $post_id;
		}

    $nombre = isset( $_POST['investigacion_nombre'] ) ? sanitize_text_field($_POST['investigacion_nombre']) : false;
    $descripcion = isset( $_POST['investigacion_descripcion'] ) ? sanitize_text_field($_POST['investigacion_descripcion']) : false;

    update_post_meta( $post_id, 'wpcf-investigacion-nombre', $nombre );
    update_post_meta( $post_id, 'wpcf-investigacion-descripcion', $descripcion );

	}

	public function render_meta_box_content( $post ) {

    $miembros = get_posts(array(
        'post_type' => 'miembros',
        'numberposts' => -1,
        'orderby' => 'post_title',
        'order' => 'ASC'
    ));

		wp_nonce_field( 'investigaciones', 'investigaciones_nonce' );

    $descripcion = get_post_meta( $post->ID, 'wpcf-investigacion-descripcion', true);
    $nombre = get_post_meta( $post->ID, 'wpcf-investigacion-nombre', true );

	?>
    <p><strong><label for="investigacion_nombre"><?php _e( 'Nombre de la investigación', 'sydney_toolbox' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="investigacion_nombre" name="investigacion_nombre" value="<?php echo esc_html($nombre); ?>"></p>
    <p><strong><label for="investigacion_descripcion"><?php _e( 'Breve descripción de la investigación', 'sydney_toolbox' ); ?></label></strong></p>
    <p><textarea name="investigacion_descripcion" id="investigacion_descripcion" rows="5" cols="30" style="width:100%;"><?php echo $descripcion; ?></textarea></p>
	<?php

	}
}
