<?php

# -------------------------------------------------- #
# Path to require 'posttype.php'                     #
# -------------------------------------------------- #
$functions_path = get_template_directory() . '/';
$location_path  = get_template_directory_uri() . '/img/';


# -------------------------------------------------- #
# Require                                            #
# -------------------------------------------------- #
require_once( $functions_path . 'metabox/metabox.php' );
require_once( $functions_path . 'posttype/posttype.php' );


# -------------------------------------------------- #
#              ### Theme Setup ####                  #
# -------------------------------------------------- #
function theme_setup() {
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'feed_links', 2 );
    remove_action( 'wp_head', 'feed_links_extra', 3 );
    remove_action( 'wp_head', 'wp_shortlink_wp_head' );
    remove_action( 'wp_head', 'parent_post_rel_link' );
    remove_action( 'wp_head', 'start_post_rel_link' );
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );  
    remove_action( 'wp_head', 'rss' );    
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );

    add_filter( 'style_loader_src', 'at_remove_wp_ver_css_js', 9999 );
    add_filter( 'script_loader_src', 'at_remove_wp_ver_css_js', 9999 );
    add_filter( 'get_search_form', 'my_search_form' );
    add_filter( 'the_content', 'filter_ptags_on_images' );
    add_filter( 'body_class', 'add_slug_to_body_class' ); # Add slug to body class (Starkers build)
    add_filter( 'login_headerurl', 'custom_logo_login_url' );
    add_filter( 'login_headertitle', 'custom_logo_login_title' );
    add_filter( 'admin_footer_text', 'custom_admin_footer' );
    add_action( 'admin_bar_menu', 'remove_logo_toolbar', 999 );
    add_filter( 'show_admin_bar', '__return_false' );
    add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 ); # Remove width and height dynamic attributes to thumbnails
    add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 ); # Remove width and height dynamic attributes to post imagesavealpha(image, saveflag)

    add_action( 'wp_head', 'add_ie_html5_shim' );
    add_action( 'init', 'register_default_menu' );
    add_action( 'login_head', 'my_custom_login_logo' );
    add_action( 'widgets_init', 'register_widgets_init' );
    add_action( 'widgets_init', 'remove_recent_comments_style' );
    add_action( 'wp_enqueue_scripts', 'header_styles' );
    add_action( 'wp_enqueue_scripts', 'footer_scripts' );
    add_action( 'admin_menu', 'remove_menu' );
    // add_action( 'admin_head', 'my_custom_js' ); # Add hook for admin <head></head>

    add_post_type_support( 'page','excerpt' );
    add_theme_support( 'post-thumbnails' );
    // add_image_size( 'thumbnail-case', 460, 260, true );
}
add_action( 'after_setup_theme', 'theme_setup' );


# Remove css inline - recentcoments
# --------------------------------------------------
function remove_recent_comments_style() {
    global $wp_widget_factory;  
    remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}


# Limit excerpt
# --------------------------------------------------
function string_limit_words($string, $word_limit) {
    $words = explode(' ', $string, ($word_limit + 1));
    if(count($words) > $word_limit)
    array_pop($words);
    return implode(' ', $words);
}


# Remove menu Post
# --------------------------------------------------
function remove_menu() {
    // remove_menu_page( 'index.php' );                  //Dashboard
    // remove_menu_page( 'edit.php' );                   //Posts
    // remove_menu_page( 'edit-comments.php' );          //Comments
    // remove_menu_page( 'upload.php' );                 //Media
    // remove_menu_page( 'edit.php?post_type=page' );    //Pages
    // remove_menu_page( 'themes.php' );                 //Appearance
    // remove_menu_page( 'plugins.php' );                //Plugins
    // remove_menu_page( 'users.php' );                  //Users
    // remove_menu_page( 'tools.php' );                  //Tools
    // remove_menu_page( 'options-general.php' );        //Settings
}


# Limit excerpt
# --------------------------------------------------
function string_limit_words($string, $word_limit) {
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}



# Alterando logo do login
# --------------------------------------------------
function my_custom_login_logo() {
    global $location_path;
    echo '<style type="text/css">
          .login h1 a { 
            background-image:url('.$location_path.'sprite.png) !important;
            width: 193px;
            height: 33px;
            margin-bottom: 0;
            background-size: cover; 
        }
        </style>';
}

# Customiza a URL da logo no login
# --------------------------------------------------
function custom_logo_login_url() {
    return home_url();
}

# Customiza o titulo da logo no login
# --------------------------------------------------
function custom_logo_login_title() {
    return get_bloginfo( 'name' );
}

# Customiza o rodapé no admin
# --------------------------------------------------
function custom_admin_footer() {
    echo '<a target="_blank" href="'.home_url().'">'.get_bloginfo( 'name' ).'</a> &copy; ' . date( 'Y' );
}


# Remove o logo do WordPress da barra de topo
# --------------------------------------------------
function remove_logo_toolbar( $wp_toolbar ) {
    global $wp_admin_bar;
    $wp_toolbar->remove_node( 'wp-logo' );
}


# Formulário de busca 
# --------------------------------------------------
function my_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
                <input type="text" title="Pesquisar" value="' . get_search_query() . '" name="s" id="s" />
                <input type="submit" id="searchsubmit" value="" />
            </form>';

    return $form;
}


# Remove wp version meta tag and from rss feed
# --------------------------------------------------
function at_remove_wp_ver_meta_rss() {
    return '';
}


# Remove wp version param from any enqueued scripts
# --------------------------------------------------
function at_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
        return $src;
}


# Remove tag <p> da imagem
# --------------------------------------------------
function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}


# Registrar menu
# --------------------------------------------------
function register_default_menu() {
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu'  => __('Header Menu', 'default_menu'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'default_menu'), // Sidebar Navigation
        'extra-menu'   => __('Extra Menu', 'default_menu') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}


function default_theme_nav() {
    wp_nav_menu(
        array(
            'theme_location'  => 'header-menu',
            'menu'            => '',
            'container'       => 'div',
            'container_class' => 'menu-{menu slug}-container',
            'container_id'    => '',
            'menu_class'      => 'nav',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul>%3$s</ul>',
            'depth'           => 0,
            'walker'          => ''
        )
    );
}


# Registrar Sidebar
# --------------------------------------------------
function register_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Contatos', 'default-sidebar' ),
        'id'            => 'contato-widget',
        'description'   => __( 'Informações de contatos, telefone, e-mail e endereço' ),
        'before_widget' => '<address>',
        'after_widget'  => '</address>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ) );

    register_sidebar( array(
        'name'          => __( 'Rodapé', 'default-sidebar' ),
        'id'            => 'footer-widget',
        'description'   => __( 'Informações' ),
        'before_widget' => '<div class="row">',
        'after_widget'  => '</div>'
    ) );
}


# Add page slug to body class, love this - Credit: Starkers Wordpress Theme
# --------------------------------------------------
function add_slug_to_body_class($classes) {
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}


# Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail. Ref: html5blank
# --------------------------------------------------
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}


# add ie conditional html5 shim to header
# --------------------------------------------------
function add_ie_html5_shim () {
    echo '<!--[if lt IE 9]>';
    echo '<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>';
    echo '<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>';
    echo '<![endif]-->';
}


# register style header
# --------------------------------------------------
function header_styles() {
    wp_register_style('default-style', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('default-style'); // Enqueue it!
}


# Add hook for front-end <head></head>
# --------------------------------------------------
function my_custom_js() {
    echo '<script type="text/javascript" src="'. get_template_directory_uri() .'/js/lib/modernizr.min.js"></script>';
}


# register javascripts on footer
# --------------------------------------------------
function footer_scripts(){

    # Scripts
    wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/lib/jquery-1.10.1.min.js', array(), NULL, true );

    wp_enqueue_script( 'main', get_template_directory_uri() . '/js/min/main.min.js', array('jquery'), '1.0.0', true );
}