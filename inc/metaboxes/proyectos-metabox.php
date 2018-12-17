<?php

/**
 * Este archivo define y registra los metadatos y la metabox de el post Proyectos
 */


function proyectos_metabox() {
    new Proyectos_Metabox();
}

if ( is_admin() ) {
    add_action( 'load-post.php', 'proyectos_metabox' );
    add_action( 'load-post-new.php', 'proyectos_metabox' );
}

class Proyectos_Metabox {

	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}

	public function add_meta_box( $post_type ) {
        global $post;
		add_meta_box(
			'proyectos_metabox'
			,__( 'Información del proyecto', 'sydney_toolbox' )
			,array( $this, 'render_meta_box_content' )
			,'proyectos'
			,'advanced'
			,'high'
		);
	}

	public function save( $post_id ) {

		if ( ! isset( $_POST['proyectos_nonce'] ) )
			return $post_id;

		$nonce = $_POST['proyectos_nonce'];

		if ( ! wp_verify_nonce( $nonce, 'proyectos' ) )
			return $post_id;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;

		if ( 'proyectos' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) )
				return $post_id;

		} else {

			if ( ! current_user_can( 'edit_post', $post_id ) )
				return $post_id;
		}

		$enlace = isset( $_POST['enlace'] ) ? esc_url_raw($_POST['enlace']) : false;
		update_post_meta( $post_id, 'wpcf-proyecto-enlace', $enlace );

    $titulo = isset( $_POST['titulo'] ) ? $_POST['titulo'] : false;
    update_post_meta( $post_id, 'wpcf-proyecto-titulo', $titulo );

    $entidades_financiadoras 	= isset( $_POST['entidades_financiadoras'] ) ? $_POST['entidades_financiadoras'] : false;
    update_post_meta( $post_id, 'wpcf-proyecto-entidades-financiadoras', $entidades_financiadoras );

    $referencia = isset( $_POST['referencia'] ) ?$_POST['referencia'] : false;
    update_post_meta( $post_id, 'wpcf-proyecto-referencia', $referencia );

    $entidades_participantes = isset( $_POST['entidades_participantes'] ) ? $_POST['entidades_participantes'] : false;
    update_post_meta( $post_id, 'wpcf-proyecto-entidades-participantes', $entidades_participantes );

    $presupuesto = isset( $_POST['presupuesto'] ) ? $_POST['presupuesto'] : false;
    update_post_meta( $post_id, 'wpcf-proyecto-presupuesto', $presupuesto );

    $investigadores = isset( $_POST['investigadores'] ) ? $_POST['investigadores'] : false;
    update_post_meta( $post_id, 'wpcf-proyecto-investigadores', $investigadores );

    $duracion = isset( $_POST['duracion'] ) ? $_POST['duracion'] : false;
    update_post_meta( $post_id, 'wpcf-proyecto-duracion', $duracion );

    $fecha_inicio = isset( $_POST['fecha_inicio'] ) ? $_POST['fecha_inicio'] : false;
    update_post_meta( $post_id, 'wpcf-proyecto-fecha-inicio', $fecha_inicio );

    $fecha_final = isset( $_POST['fecha_final'] ) ? $_POST['fecha_final'] : false;
    update_post_meta( $post_id, 'wpcf-proyecto-fecha-final', $fecha_final );

    $financiacion = isset( $_POST['financiacion'] ) ? $_POST['financiacion'] : 'publica';
    update_post_meta( $post_id, 'wpcf-proyecto-financiacion', $financiacion );
	}

	public function render_meta_box_content( $post ) {
		wp_nonce_field( 'proyectos', 'proyectos_nonce' );

		$enlace = get_post_meta( $post->ID, 'wpcf-proyecto-enlace', true );
    $titulo = get_post_meta( $post->ID, 'wpcf-proyecto-titulo', true );
    $entidades_financiadoras = get_post_meta( $post->ID, 'wpcf-proyecto-entidades-financiadoras', true );
    $referencia = get_post_meta( $post->ID, 'wpcf-proyecto-referencia', true );
    $entidades_participantes = get_post_meta( $post->ID, 'wpcf-proyecto-entidades-participantes', true );
    $presupuesto = get_post_meta( $post->ID, 'wpcf-proyecto-presupuesto', true );
    $investigadores = get_post_meta( $post->ID, 'wpcf-proyecto-investigadores', true );
    $duracion = get_post_meta( $post->ID, 'wpcf-proyecto-duracion', true );
    $financiacion = get_post_meta( $post->ID, 'wpcf-proyecto-financiacion', true );
    $fecha_inicio = get_post_meta( $post->ID, 'wpcf-proyecto-fecha-inicio', true );
    $fecha_final = get_post_meta( $post->ID, 'wpcf-proyecto-fecha-final', true );

	?>

    <p><strong><label for="titulo"><?php _e( 'Título del proyecto', 'sydney_toolbox' ); ?></label></strong></p>
    <p><em><?php _e('Titulo oficial del proyecto', 'sdyney_toolbox'); ?></em></p>
    <p><input type="text" class="widefat" id="titulo" name="titulo" value="<?php echo $titulo; ?>"></p>

    <p><strong><label for="entidades_financiadoras"><?php _e( 'Entidades financiadoras', 'sydney_toolbox' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="entidades_financiadoras" name="entidades_financiadoras" value="<?php echo $entidades_financiadoras; ?>"></p>

    <p><strong><label for="entidades_participantes"><?php _e( 'Entidades participantes', 'sydney_toolbox' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="entidades_participantes" name="entidades_participantes" value="<?php echo $entidades_participantes; ?>"></p>

    <p><strong><label for="investigadores"><?php _e( 'Investigadores', 'sydney_toolbox' ); ?></label></strong></p>
    <p><input type="text" class="widefat" id="investigadores" name="investigadores" value="<?php echo $investigadores; ?>"></p>

    <p><strong><label for="referencia"><?php _e( 'Número de referencia', 'sydney_toolbox' ); ?></label></strong></p>
    <p><input type="text" id="referencia" name="referencia" value="<?php echo $referencia; ?>"></p>

    <p><strong><label for="presupuesto"><?php _e( 'Presupuesto del organismo participante', 'sydney_toolbox' ); ?></label></strong></p>
    <p><input type="number" id="presupuesto" name="presupuesto" value="<?php echo $presupuesto; ?>"> €</p>

    <p><strong><label for="financiacion"><?php _e( "Tipo de financiación que recibe el proyecto:", 'sydney_toolbox'); ?></label></strong></p>
    <input type="radio" name="financiacion" value="propia" <?php checked( $financiacion, 'propia' ); ?> >Financiación Propia<br>
    <input type="radio" name="financiacion" value="publica" <?php checked( $financiacion, 'publica' ); ?> >Financiación Pública<br>

    <p><strong><label for="duracion"><?php _e( 'Número total de meses', 'sydney_toolbox' ); ?></label></strong></p>
    <p><input type="number" id="duracion" name="duracion" value="<?php echo $duracion; ?>"></p>

    <p><strong><label for="fechas"><?php _e( 'Duración', 'sydney_toolbox' ); ?></label></strong></p>

    <p><em><?php _e('Desde', 'sdyney_toolbox'); ?></em></p>
    <p><input type="date" id="fecha_inicio" name="fecha_inicio" placeholder="dd/mm/aaaa" value="<?php echo $fecha_inicio; ?>"></p>

    <p><em><?php _e('Hasta', 'sdyney_toolbox'); ?></em></p>
    <p><input type="date" id="fecha_final" name="fecha_final" placeholder="dd/mm/aaaa" value="<?php echo $fecha_final; ?>"></p>

    <p><strong><label for="enlace"><?php _e( 'Enlace del proyecto', 'sydney_toolbox' ); ?></label></strong></p>
    <p><em><?php _e('Añade una dirección para este proyecto. Si no se especifica enlazará a la propia página del proyecto.', 'sdyney_toolbox'); ?></em></p>
    <p><input type="text" class="widefat" id="enlace" name="enlace" value="<?php echo $enlace; ?>"></p>
	<?php
	}

}
