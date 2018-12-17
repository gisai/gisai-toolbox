<?php

/**
 * Este archivo define y registra los metadatos y la metabox de el post Ofertas
 */

function ofertas_metabox() {
    new Ofertas_Metabox();
}

if ( is_admin() ) {
    add_action( 'load-post.php', 'ofertas_metabox' );
    add_action( 'load-post-new.php', 'ofertas_metabox' );
}

class Ofertas_Metabox {

	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}

	public function add_meta_box( $post_type ) {
        global $post;
        $list_post = array('ofertas');
        if ( in_array( $post_type, $list_post )) {
			add_meta_box(
				'ofertas_metabox'
				,__( 'Detalles de la oferta', 'Sydney' )
				,array( $this, 'render_meta_box_content' )
				,$post_type
				,'advanced'
				,'high'
			);
		}
	}

	public function save( $post_id ) {

		if ( ! isset( $_POST['ofertas_nonce'] ) )
			return $post_id;

		$nonce = $_POST['ofertas_nonce'];

		if ( ! wp_verify_nonce( $nonce, 'ofertas' ) )
			return $post_id;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;

		if ( 'ofertas' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) )
				return $post_id;

		} else {

			if ( ! current_user_can( 'edit_post', $post_id ) )
				return $post_id;
		}

		$nombre = isset( $_POST['nombre'] ) ? sanitize_text_field($_POST['nombre']) : false;
		update_post_meta( $post_id, 'wpcf-oferta-nombre', $nombre);
    $categoria = isset( $_POST['categoria'] ) ? sanitize_text_field($_POST['categoria']) : false;
		update_post_meta( $post_id, 'wpcf-oferta-categoria', $categoria);
    $linea_investigacion = isset( $_POST['linea-investigacion'] ) ? sanitize_text_field($_POST['linea-investigacion']) : false;
		update_post_meta( $post_id, 'wpcf-oferta-linea-investigacion', $linea_investigacion);
    $centro_trabajo = isset( $_POST['centro-trabajo'] ) ? sanitize_text_field($_POST['centro-trabajo']) : false;
		update_post_meta( $post_id, 'wpcf-oferta-centro-trabajo', $centro_trabajo);
    $direccion = isset( $_POST['direccion'] ) ? sanitize_text_field($_POST['direccion']) : false;
		update_post_meta( $post_id, 'wpcf-oferta-direccion', $direccion);
    $jornada = isset( $_POST['jornada'] ) ? sanitize_text_field($_POST['jornada']) : false;
		update_post_meta( $post_id, 'wpcf-oferta-jornada', $jornada);
    $asignacion_bruta = isset( $_POST['asignacion-bruta'] ) ? sanitize_text_field($_POST['asignacion-bruta']) : false;
		update_post_meta( $post_id, 'wpcf-oferta-asignacion-bruta', $asignacion_bruta);
    $duracion = isset( $_POST['duracion'] ) ? sanitize_text_field($_POST['duracion']) : false;
		update_post_meta( $post_id, 'wpcf-oferta-duracion', $duracion);
    $fecha = isset( $_POST['fecha'] ) ? sanitize_text_field($_POST['fecha']) : false;
		update_post_meta( $post_id, 'wpcf-oferta-fecha', $fecha);
    $titulacion_requerida = isset( $_POST['titulacion-requerida'] ) ? sanitize_text_field($_POST['titulacion-requerida']) : false;
		update_post_meta( $post_id, 'wpcf-oferta-titulacion-requerida', $titulacion_requerida);
    $experiencia_necesaria = isset( $_POST['experiencia-necesaria'] ) ? sanitize_text_field($_POST['experiencia-necesaria']) : false;
		update_post_meta( $post_id, 'wpcf-oferta-experiencia-necesaria', $experiencia_necesaria);
    $responsable = isset( $_POST['responsable'] ) ? sanitize_text_field($_POST['responsable']) : false;
		update_post_meta( $post_id, 'wpcf-oferta-responsable', $responsable);
    $contacto = isset( $_POST['contacto'] ) ? sanitize_text_field($_POST['contacto']) : false;
		update_post_meta( $post_id, 'wpcf-oferta-contacto', $contacto);
    $plazo = isset( $_POST['plazo'] ) ? sanitize_text_field($_POST['plazo']) : false;
		update_post_meta( $post_id, 'wpcf-oferta-plazo', $plazo);


	}

	public function render_meta_box_content( $post ) {
		wp_nonce_field( 'ofertas', 'ofertas_nonce' );

		$nombre = get_post_meta( $post->ID, 'wpcf-oferta-nombre', true );
    $categoria = get_post_meta( $post->ID, 'wpcf-oferta-categoria', true );
    $linea_investigacion = get_post_meta( $post->ID, 'wpcf-oferta-linea-investigacion', true );
    $centro_trabajo = get_post_meta( $post->ID, 'wpcf-oferta-centro-trabajo', true );
    $direccion = get_post_meta( $post->ID, 'wpcf-oferta-direccion', true );
    $jornada = get_post_meta( $post->ID, 'wpcf-oferta-jornada', true );
    $asignacion_bruta = get_post_meta( $post->ID, 'wpcf-oferta-asignacion-bruta', true );
    $duracion = get_post_meta( $post->ID, 'wpcf-oferta-duracion', true );
    $fecha = get_post_meta( $post->ID, 'wpcf-oferta-fecha', true );
    $titulacion_requerida = get_post_meta( $post->ID, 'wpcf-oferta-titulacion-requerida', true );
    $experiencia_necesaria = get_post_meta( $post->ID, 'wpcf-oferta-experiencia-necesaria', true );
    $responsable = get_post_meta( $post->ID, 'wpcf-oferta-responsable', true );
    $contacto = get_post_meta( $post->ID, 'wpcf-oferta-contacto', true );
    $plazo = get_post_meta( $post->ID, 'wpcf-oferta-plazo', true );

	?>
		<p><strong><label for="nombre"><?php _e( 'Nombre de la oferta', 'Sydney' ); ?></label></strong></p>
		<p><input type="text" class="widefat" id="nombre" name="nombre" value="<?php echo $nombre ?>"></p>
    <p><strong><label for="categoria"><?php _e( 'Categoría de la oferta', 'Sydney' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="categoria" name="categoria" value="<?php echo $categoria ?>"></p>
    <p><strong><label for="linea-investigacion"><?php _e( 'Línea de investigación', 'Sydney' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="linea-investigacion" name="linea-investigacion" value="<?php echo $linea_investigacion ?>"></p>
    <p><strong><label for="centro-trabajo"><?php _e( 'Centro de trabajo', 'Sydney' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="centro-trabajo" name="centro-trabajo" value="<?php echo $centro_trabajo ?>"></p>
    <p><strong><label for="direccion"><?php _e( 'Dirección del centro de trabajo', 'Sydney' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="direccion" name="direccion" value="<?php echo $direccion ?>"></p>
    <p><strong><label for="jornada"><?php _e( 'Jornada (h/sem)', 'Sydney' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="jornada" name="jornada" value="<?php echo $jornada ?>"></p>
    <p><strong><label for="asignacion-bruta"><?php _e( 'Asignación bruta/mes (€)', 'Sydney' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="asignacion-bruta" name="asignacion-bruta" value="<?php echo $asignacion_bruta ?>"></p>
    <p><strong><label for="duracion"><?php _e( 'Duración prevista', 'Sydney' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="duracion" name="duracion" value="<?php echo $duracion ?>"></p>
    <p><strong><label for="fecha"><?php _e( 'Fecha prevista de inicio', 'Sydney' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="fecha" name="fecha" value="<?php echo $fecha ?>"></p>
    <p><strong><label for="titulacion-requerida"><?php _e( 'Titulación requerida', 'Sydney' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="titulacion-requerida" name="titulacion-requerida" value="<?php echo $titulacion_requerida ?>"></p>
    <p><strong><label for="experiencia-necesaria"><?php _e( 'Experiencia necesaria', 'Sydney' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="experiencia-necesaria" name="experiencia-necesaria" value="<?php echo $experiencia_necesaria ?>"></p>
    <p><strong><label for="responsable"><?php _e( 'Persona responsable de la oferta', 'Sydney' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="responsable" name="responsable" value="<?php echo $responsable ?>"></p>
    <p><strong><label for="contacto"><?php _e( 'Correo de contacto', 'Sydney' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="contacto" name="contacto" value="<?php echo $contacto ?>"></p>
    <p><strong><label for="plazo"><?php _e( 'Plazo de admisión de CVs', 'Sydney' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="plazo" name="plazo" value="<?php echo $plazo ?>"></p>

	<?php

	}
}
