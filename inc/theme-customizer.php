<?php
function ju_customize_register($wp_customize){
    $wp_customize->add_setting('header_bg_color',array(
        'default'   => '#0E205F',
        'transport' => 'refresh',

    ));
    
    $wp_customize->add_section('ju_color_theme_section',array(
        'title'     => __('Color','My-header'),
        'priority'  => 30
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'theme_colors',array(
        'label'     => __('Nav Sticky color', 'my-trick'),
        'section'   => 'ju_color_theme_section',
        'settings'  => 'header_bg_color',
    )));
}

add_action('customize_register','ju_customize_register');

