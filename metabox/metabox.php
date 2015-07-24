<?php 
	require_once get_template_directory() . '/core/classes/class-metabox.php';

	# --------------------------------------------
	function fotos_metabox() {
		$fotos_metabox = new Odin_Metabox(
		    'informacoes', 						# Slug/ID do Metabox (obrigatório)
		    'Fotos',		 					# Nome do Metabox  (obrigatório)
		    array('page'),						# Slug do Post Type, sendo possível enviar apenas um valor ou um array com vários (opcional)
		    'normal', 							# Contexto (opções: normal, advanced, ou side) (opcional)
		    'high' 								# Prioridade (opções: high, core, default ou low) (opcional)
		);

		$fotos_metabox->set_fields(
		    array(
				# upload image ( galeria de fotos )
				array(
				    'id'          => 'geleria_fotos',
				    'label'       => __( 'Galeria de fotos', 'odin' ),
				    'type'        => 'image_plupload',
				    'default'     => '',
				    'description' => __( 'Adicionar imagens', 'odin' )
				)
		    )
		);
	}

	add_action( 'init', 'fotos_metabox', 1 );