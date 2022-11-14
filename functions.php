<?php

use WpTailwindCssThemeBoilerplate\AutoLoader;
use WpTailwindCssThemeBoilerplate\View;

/*
 * Set up our auto loading class and mapping our namespace to the app directory.
 *
 * The autoloader follows PSR4 autoloading standards so, provided StudlyCaps are used for class, file, and directory
 * names, any class placed within the app directory will be autoloaded.
 *
 * i.e; If a class named SomeClass is stored in app/SomeDir/SomeClass.php, there is no need to include/require that file
 * as the autoloader will handle that for you.
 */
require get_stylesheet_directory() . '/app/AutoLoader.php';

require get_stylesheet_directory() . '/inc/widgets.php'; 
require get_stylesheet_directory() . '/inc/shortcodes.php'; 





$loader = new AutoLoader();
$loader->register();
$loader->addNamespace( 'WpTailwindCssThemeBoilerplate', get_stylesheet_directory() . '/app' );

View::$view_dir = get_stylesheet_directory() . '/templates/views';

require get_stylesheet_directory() . '/includes/scripts-and-styles.php';



require get_stylesheet_directory() . '/inc/theme_support.php'; 


/* THUMBNAIL URL - START */

add_action( 'after_setup_theme', 'wp_setting_zise_theme_setup' );
 
function wp_setting_zise_theme_setup() { 
 
    add_image_size( 'slider-thumbnail', 846, 556, true );  
    add_image_size( 'programa-thumbnail', 416, 273, true );  
    add_image_size( 'docente-thumbnail', 100, 148, true );  
    add_image_size( 'inhouse-thumbnail', 796, 523, true );  
    add_image_size( 'blog-thumbnail', 651, 428, true );   
   
}
 
function thumbnail_image_url($size='full'){
    global $post; 
    $image_id = get_post_thumbnail_id($post -> ID);
    $main_image = wp_get_attachment_image_src($image_id, $size);
    //0 = ruta o url, 1 = width, 2 = height, 3 = boolean
 
    return empty($main_image[0])? false: $main_image[0] ;
}   
 
/* THUMBNAIL URL - END */




/* if(is_front_page() && is_home()){
    function dequeue_gutenberg_theme_css() {
        wp_dequeue_style( 'wp-block-library' );
    }
    add_action( 'wp_enqueue_scripts', 'dequeue_gutenberg_theme_css', 100 );
} */

// remove any tags  of excerpt 
remove_filter('the_excerpt', 'wpautop'); 



// Add submenu in menu Cursos
if( function_exists('acf_add_options_page') ) {
	 
    acf_add_options_sub_page(array(
		'page_title' 	=> 'Informacion general de los Cursos',
		'menu_title'	=> "Campos generales de los Curso",
		'parent_slug'	=> 'edit.php?post_type=cursos',
	));
	
}
// Add submenu in menu Diplomas
if( function_exists('acf_add_options_page') ) {
	 
    acf_add_options_sub_page(array(
		'page_title' 	=> 'Informacion general de los Diplomas',
		'menu_title'	=> "Campos generales de los Diploma",
		'parent_slug'	=> 'edit.php?post_type=diplomas',
	));
	
}
// Add submenu in menu Congresos
if( function_exists('acf_add_options_page') ) {
	 
    acf_add_options_sub_page(array(
		'page_title' 	=> 'Informacion general de los Congresos',
		'menu_title'	=> "Campos generales de los Congreso",
		'parent_slug'	=> 'edit.php?post_type=congresos',
	));
	
}
// Add submenu in menu Paginas
if( function_exists('acf_add_options_page') ) {
	 
    acf_add_options_sub_page(array(
		'page_title' 	=> 'Informacion general de las Paginas',
		'menu_title'	=> "Campos generales de las Pagina",
		'parent_slug'	=> 'edit.php?post_type=page',
	));
	
}

/* ACF */
/* Register block - Start*/
add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {
 
    if( function_exists('acf_register_block_type') ) {
        //Slogan
        acf_register_block_type(array(
            'name'              => 'socialmedia',
            'title'             => __('Redes Sociales'),
            'description'       => __('Enlaza tus redes sociales'),
            'render_template'   => 'template-parts/blocks/socialmedia/socialmedia.php', 
            'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/socialmedia/socialmedia.css',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'socialmedia', 'social' ),
        ));
    }
}
/* Register block - End*/

/* Disable update plugins */

function disable_plugin_updates( $value ) {
    if ( isset($value) && is_object($value) ) {
      if ( isset( $value->response['advanced-custom-fields-pro/acf.php'] ) ) {
        unset( $value->response['advanced-custom-fields-pro/acf.php'] );
      }
    }
 
    return $value;
}
 add_filter( 'site_transient_update_plugins', 'disable_plugin_updates' );




 /* Filter the except length to 20 words and more */
function wph_custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'wph_custom_excerpt_length', 999 );

function wph_excerpt_more( $more ) {
	return '...<span>Leer más.</span> ';
}
add_filter( 'excerpt_more', 'wph_excerpt_more' );



add_action( 'wp_enqueue_scripts', 'aiooc_crunchify_dequeue_dashicon' );
function aiooc_crunchify_dequeue_dashicon() {
    if ( current_user_can( 'update_core' ) ) {
        return;
    }
    wp_deregister_style( 'dashicons' );
}

