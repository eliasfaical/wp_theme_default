<?php 
    require_once get_template_directory() . '/core/classes/class-post-type.php';

    # Portfolio
    # --------------------------------------------
    function portfolio_cpt(){
        
        $fotos = new Odin_Post_Type (
            'Portfólio', // Nome (Singular) do Post Type.
            'projeto'    // Slug do Post Type.
        );

        $fotos->set_labels(
            array(
                'menu_name'    => __('Portfólio', 'odin'),
                'all_items'    => __('Todos os projetos', 'odin'),
                'add_new'      => __('Adicionar novo', 'odin'),
                'add_new_item' => __('Adicionar novo porjeto', 'odin'),
                'edit_item'    => __('Editar')
            )
        );

        $fotos->set_arguments(
            array(
                'supports'   => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
                'taxonomies' => array( 'post_tag', 'category' )
            )
        );

    }

    add_action( 'init', 'portfolio_cpt', 1 );