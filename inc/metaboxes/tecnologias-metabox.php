<?php

/**
 * Este archivo define y registra los metadatos y la metabox de el post Tecnologías
 */


function tecnologias_metabox() {
    new Tecnologias_Metabox();
}

if ( is_admin() ) {
    add_action( 'load-post.php', 'tecnologias_metabox' );
    add_action( 'load-post-new.php', 'tecnologias_metabox' );
}

class Tecnologias_Metabox {

	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}

	public function add_meta_box( $post_type ) {
        global $post;
		add_meta_box(
			'tecnologias_metabox'
			,__( 'Información de la tecnología', 'sydney_toolbox' )
			,array( $this, 'render_meta_box_content' )
			,'tecnologias'
			,'advanced'
			,'high'
		);
	}

	public function save( $post_id ) {

		if ( ! isset( $_POST['tecnologias_nonce'] ) )
			return $post_id;

		$nonce = $_POST['tecnologias_nonce'];

		if ( ! wp_verify_nonce( $nonce, 'tecnologias' ) )
			return $post_id;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;

		if ( 'tecnologias' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) )
				return $post_id;

		} else {

			if ( ! current_user_can( 'edit_post', $post_id ) )
				return $post_id;
		}

    $nombre = isset( $_POST['tecnologia_nombre'] ) ? sanitize_text_field($_POST['tecnologia_nombre']) : false;
    $descripcion = isset( $_POST['tecnologia_descripcion'] ) ? sanitize_text_field($_POST['tecnologia_descripcion']) : false;

    update_post_meta( $post_id, 'wpcf-tecnologia-nombre', $nombre );
    update_post_meta( $post_id, 'wpcf-tecnologia-descripcion', $descripcion );

	}

	public function render_meta_box_content( $post ) {

    $miembros = get_posts(array(
        'post_type' => 'miembros',
        'numberposts' => -1,
        'orderby' => 'post_title',
        'order' => 'ASC'
    ));

		wp_nonce_field( 'tecnologias', 'tecnologias_nonce' );

    $descripcion = get_post_meta( $post->ID, 'wpcf-tecnologia-descripcion', true);
    $nombre = get_post_meta( $post->ID, 'wpcf-tecnologia-nombre', true );

	?>
    <p><strong><label for="tecnologia_nombre"><?php _e( 'Nombre de la tecnología', 'sydney_toolbox' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="tecnologia_nombre" name="tecnologia_nombre" value="<?php echo esc_html($nombre); ?>"></p>
    <p><strong><label for="tecnologia_descripcion"><?php _e( 'Breve descripción de la tecnología', 'sydney_toolbox' ); ?></label></strong></p>
    <p><textarea name="tecnologia_descripcion" id="tecnologia_descripcion" rows="5" cols="30" style="width:100%;"><?php echo $descripcion; ?></textarea></p>
	<?php

	}
}
