<?php
 
// Widgets
 
function wph_widgets_registration(){ 
/*     register_sidebar(array(
        'name' => __('Header - Slogan'),
        'id' =>'header-slogan',
        'description'   => 'Slogan',
        'before_widget' => '<div class="header-slogan">',
		'after_widget'  => '</div>', 
		'before_title' => '<h2 class="hidden">',
        'after_title'  => '</h2>'
    ));    */ 
    register_sidebar(array(
        'name' => __('Curso - Formulario'),
        'id' =>'curso-form',
        'description'   => 'Formulario de contacto',
        'before_widget' => '<div class="single-form">',
		  'after_widget'  => '</div>', 
    ));    
    register_sidebar(array(
        'name' => __('Diploma - Formulario'),
        'id' =>'diploma-form',
        'description'   => 'Formulario de contacto',
        'before_widget' => '<div class="single-form">',
		  'after_widget'  => '</div>', 
    ));    
    register_sidebar(array(
        'name' => __('Congreso - Formulario'),
        'id' =>'congreso-form',
        'description'   => 'Formulario de contacto',
        'before_widget' => '<div class="single-form">',
		  'after_widget'  => '</div>', 
    ));  
    register_sidebar(array(
        'name' => __('Catalogo - Formulario'),
        'id' =>'catalogo-form',
        'description'   => 'Formulario de Catalogo',
        'before_widget' => '<div class="single-form">',
		  'after_widget'  => '</div>', 
    ));  
    register_sidebar(array(
        'name' => __('Blog - Sidebar'),
        'id' =>'blog-sidebar',
        'description'   => 'Contenido de barra lateral',
        'before_widget' => '<div class="blog-sidebar">',
		  'after_widget'  => '</div>', 
    ));  

    register_sidebar(array(
        'name' => __('Footer - Formulario de Suscripcion'),
        'id' =>'footer-subscribe',
        'description'   => 'Suscripcion',
        'before_widget' => '<div class="footer-subscribe">',
		'after_widget'  => '</div>', 
        'before_title' => '<h2 class="hidden">',
        'after_title'  => '</h2>'
    ));  


	register_sidebar(array(
        'name' => __('Footer - Redes Sociales'),
        'id' =>'footer-social-media',
        'description'   => 'Informacion de Redes Sociales',
        'before_widget' => '<div class="footer-social-media">',
         'after_widget'  => '</div>', 
         'before_title' => '<h2 class="hidden">',
        'after_title'  => '</h2>'
    ));  
	register_sidebar(array(
        'name' => __('Header - Redes Sociales'),
        'id' =>'footer-social-media-header',
        'description'   => 'Informacion de Redes Sociales',
        'before_widget' => '<div class="header-socialmedia">',
         'after_widget'  => '</div>', 
         'before_title' => '<h2 class="hidden">',
        'after_title'  => '</h2>'
    ));  
	register_sidebar(array(
        'name' => __('Footer - Copyright'),
        'id' =>'footer-copyright',
        'description'   => 'Informacion de Copyright',
        'before_widget' => '<div class="footer-copyright">',
		'after_widget'  => '</div>', 
		'before_title' => '<h2 class="hidden">',
        'after_title'  => '</h2>'
    ));  
  
}
add_action('widgets_init', 'wph_widgets_registration');
 