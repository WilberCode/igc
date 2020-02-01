<?php
 

function wpb_customize_register($wp_customize){
    //frontpage section
    $wp_customize -> add_section('frontpage',array(
        'title' => __('Front Page', 'wpfrontpage'),
        'description' => sprintf(__('Options for Frontpage','wpfrontpage')),
        'priority' => 130
    ));  
    // $wp_customize -> add_setting('btn_url', array(
    //     'default' => _x('http://test.com','wpfrontpage'),
    //     'type'    => 'theme_mod'
    // ));
    // $wp_customize -> add_control('btn_url', array(
    //     'label'   => __('URL del boton', 'wpfrontpage'),
    //     'section' => 'frontpage',
    //     'priority' => 4
    // ));
     

      // Footer Images
    // First font Image
    $wp_customize -> add_setting('newsletter_image', array(
        'default' => get_bloginfo('template_directory').'/assets/img/banner.jpg',
        'type'    => 'theme_mod'
    ));
    $wp_customize -> add_control(new WP_Customize_Image_Control($wp_customize,'newsletter_image',array(
        'label'   => __('Imagen de fondo en Newsletter', 'wpfrontpage'),
        'section' => 'frontpage',
        'setting' => 'newsletter_image',
        'priority' => 1
    )) ); 
      // Footer Images
    // First font Image
    $wp_customize -> add_setting('footer_image', array(
        'default' => get_bloginfo('template_directory').'/assets/img/banner.jpg',
        'type'    => 'theme_mod'
    ));
    $wp_customize -> add_control(new WP_Customize_Image_Control($wp_customize,'footer_image',array(
        'label'   => __('Imagen de fondo en footer', 'wpfrontpage'),
        'section' => 'frontpage',
        'setting' => 'footer_image',
        'priority' => 1
    )) ); 

    // Logos Página de cursos 
    $wp_customize -> add_setting('cursos_image', array(
        'default' => get_bloginfo('template_directory').'/assets/img/logo.jpg',
        'type'    => 'theme_mod'
    ));
    $wp_customize -> add_control(new WP_Customize_Image_Control($wp_customize,'cursos_image',array(
        'label'   => __('Logo de cursos', 'wpfrontpage'),
        'section' => 'frontpage',
        'setting' => 'cursos_image',
        'priority' => 1
    ))); 

    
    }
    add_action('customize_register','wpb_customize_register');


























