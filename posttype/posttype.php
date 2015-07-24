<?php 
    require_once get_template_directory() . '/core/classes/class-post-type.php';

    # Posttype Fotos
    # --------------------------------------------
    function odin_fotos_cpt(){
        
        $fotos = new Odin_Post_Type (
            'Fotos', // Nome (Singular) do Post Type.
            'foto'   // Slug do Post Type.
        );

        $fotos->set_labels(
            array(
                'menu_name'    => __('Fotos', 'odin'),
                'add_new'      => __('Adicionar', 'odin'),
                'all_items'    => __('Listar', 'odin'),
                'add_new_item' => __('Adicionar fotos', 'odin'),
                'edit_item'    => __('Editar fotos')
            )
        );

        $fotos->set_arguments(
            array(
                'supports' => array( 'title', 'thumbnail' ) // suport: 'title', 'thumbnail', 'ecerpt', 'editor'
            )
        );

    }

    add_action( 'init', 'odin_fotos_cpt', 1 );