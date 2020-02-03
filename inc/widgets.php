<?php
 
// Para activar widgets y menu
// function my_register_sidebars() { 
//     register_sidebar( array(
//       'name'          => __( 'Primary Sidebar', 'theme_name' ),
//       'id'            => 'sidebar-1',
//       'before_widget' => '<aside id="%1$s" class="widget %2$s">',
//       'after_widget'  => '</aside>',
//       'before_title'  => '<h1 class="widget-title">',
//       'after_title'   => '</h1>',
//     ));   
//     } 
//   add_action( 'widgets_init', 'my_register_sidebars' );
  function igc_front_widgets(){
    register_sidebar(array(
        'name' => __('Footer Contact'),
        'id' =>'footer_contact',
        'description'   => 'Contactos de la empresa',
        'before_widget' => '<div class="footer-contact">',
        'after_widget'  => '</div>' 
 
    )); 
    register_sidebar(array(
        'name' => __('Banner de página de cursos'),
        'id' =>'banner_page-cursos',
        'description'   => 'Banner de curso',
        'before_widget' => '<div class="page-cursos__banner">',
        'after_widget'  => '</div>'
 
    ));  
    register_sidebar(array(
        'name' => __('Contacto asesora'),
        'id' =>'contact-adviser',
        'description'   => 'Contactos de una asesora',
        'before_widget' => '<div class="contact-adviser">',
        'after_widget'  => '</div>'
 
    ));  
    register_sidebar(array(
        'name' => __('Blog Sidebar'),
        'id' =>'blog_sidebar',
        'description'   => 'Contenido relaciondo de tras páginas',
        'before_widget' => '<div class="blog-sidebar">',
        'after_widget'  => '</div>'
 
    ));  
    register_sidebar(array(
        'name' => __('Imagen de cabecera'),
        'id' =>'header-image',
        'description'   => 'La imagen de cabecera',
        'before_widget' => '<div class="header-image">',
        'after_widget'  => '</div>'
 
    ));   
    register_sidebar(array(
      'name' => __('Convenio con universidad'),
      'id' =>'partner-imagen',
      'description'   => 'Imagen de partner',
      'before_widget' => '<div class="partner-image s-mb-4 m-mb-4 l-mb-0">',
      'after_widget'  => '</div>'

   ));  
    register_sidebar(array(
      'name' => __('Banner en Pagina Frontal'),
      'id' =>'bannerfront-image',
      'description'   => 'muestra banner de congreso',
      'before_widget' => '<div class="bannerfront-image">',
      'after_widget'  => '</div>' 
    ));  
    register_sidebar(array(
      'name' => __('Aside en Home'),  
      'id' =>'frontpage-aside',
      'description'   => 'Lista de novedades',
      'before_widget' => '<div class="frontpage-image">',
      'after_widget'  => '</div>' 
    ));  
    register_sidebar(array(
      'name' => __('Clientes en Home'),  
      'id' =>'frontpage-clients',
      'description'   => 'Lista de novedades',
      'before_widget' => '<div class="client">',
      'after_widget'  => '</div>' 
    ));  
   
}
add_action('widgets_init', 'igc_front_widgets');

//Menu
function igc_setup(){ 
  add_theme_support('html5', array(
    'comment-list',
    'comment-form',
    'search-form',
    'gallery',
    'caption'
  ));
  add_theme_support( 'post-formats', array ( 
    'aside',
    'gallery',
    'link',
    'image',
    'quote',
    'status',
    'video',
    'audio',
    'chat' 
    ) ); 
  add_theme_support('post-thumbnails');
// register Menu
  register_nav_menus(array(
      'small-menu'=>'Small Menú',
      'company-information'=>'Company Information',
      'congress-info'=>'Congress Information',
      'big-menu'=>'Big Menú',
      'all-menu' =>'All Menú',
      'footer-menu' =>'Footer Menú',
      'social-media'=>'Social Media',
      'tag-link'=>'Tags links'

  )); 
  add_theme_support('title-tag');
  add_theme_support('automatic-feed-links'); //Para lectures de RSD
  remove_action('wp_head', 'wp_generator'); //Eliminar La version de  wordpress del codigo
}
add_action('after_setup_theme', 'igc_setup');