<!DOCTYPE html>
<html lang="<?php bloginfo("language"); ?>">
<head>
    <meta charset="<?php bloginfo("charset"); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="decription" content="<?php echo igc_description(); ?>">
    <!-- <meta property="og:image" content=" <?php //if(is_front_page()){ echo get_bloginfo('template_directory').'/assets/img/gestion_publica.jpg';}else{echo main_image_url('full');}?>" class="next-head">
    <meta name="twitter:image" content="<?php // if(is_front_page()){ echo get_bloginfo('template_directory').'/assets/img/gestion_publica.jpg';}else{echo main_image_url('full');}?>" class="next-head">
    <meta property="twitter:card" content="<?php // if(is_front_page()){ echo "Capacitate en Gestion Pública";}else{echo the_title();  }?>" class="next-head">
    <meta property="twitter:title" content="<?php // the_title(); ?>" class="next-head">
    <meta property="twitter:site" content="@institutoIGC" class="next-head">
    <meta property="twitter:description" content="Capacita en la especialidad de Gestión Pública 2019" class="next-head">
     -->
    <!-- PWA -->
    <meta name="theme-color" content="#203066" class="next-head">  
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.1.0/css/all.css">
    <!-- Animate on Scroll -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" /> 
    <?php wp_head();?> 
    <!-- Facebook Pixel Code -->
    <script>    
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '2504771669565427');
    fbq('track', 'PageView');    
    </script>  
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=2504771669565427&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->
</head>
<body <?php body_class();?> >   
    <header class="header"> 
        <?php if(!is_front_page()){?>
            <style>
               
                .header-banner{
                    display:none ;
                }
                .nav-first{
                    display:none !important;
                }
                .logo__img{
                    width:9em !important;
                    padding-top:.3em;
                    padding-bottom:.3em;
                }
                @media (max-width: 576px){
                    .logo__img{
                        width:8em !important;
                    }
                }
                .logo-img-space{
                    transform:none !important;
                }
                
                .big-menu .menu-item .sub-menu{
                    top:60px !important;
                }
                .nav-first-wrap{
                    justify-content:flex-end !important;
                    height:100%;
                }
            </style>
        <?php }?>
       
       
        <div class="header-content ed-container" id="header-content"> 
                <div class="logo ed-item l-30">
                    <?php 
                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );?>
                     <?php if ( has_custom_logo() ) { ?> 
                    <a class="logo__url" href="<?php echo home_url();?>" rel="home">
                        <img id="logo__img" class="logo__img" src="<?php echo esc_url( $logo[0]);?>" alt="<?php bloginfo('name'); ?>" >
                    </a> 
                     <?php }else{?>
                    <a class="logo__title" href="<?php echo home_url();?>" rel="home">
                        <?php echo  '<h1 class="logo__title">'.get_bloginfo( "name" ).'</h1>'; ?>
                    </a>     
                     <?php }?>

                </div>
                <div class="nav-container ed-item l-70 ">
                    <div class="header-banner" id="info-wrap"> 
                        <!-- <div class="header-banner__wrap "> 
                            <?php  
                              //  dynamic_sidebar('header-image');
                            ?>
                        </div>  -->
                        <div  class="partner ed-grid s-grid-1  lg-grid-3 gap-1">
                            <div class="partner-title  s-cols-1  m-cols-1 lg-cols-1 s-mb-4 m-mb-4 l-mb-0" >
                                <div>
                                    <p>Convenios Internacionales</p>
                                    <span>2005 - 2019 - 2021</span>
                                </div>
                            </div>
                            <div class="partner-image-wrap  s-cols-2   m-cols-2 lg-cols-2 s-main-center s-main-start ">
                                <?php       
                            dynamic_sidebar('partner-imagen'); 
                                ?> 
                            </div>
                        </div>
                    </div>  
                    <div class="nav-first-wrap">
                        <div class="nav-first" id="nav-first">
                            <?php
                            wp_nav_menu(array(
                                'theme_location'  => 'small-menu',
                                'container'       => 'div',
                                'container_class' => 'small-nav',
                                'container_id'    => 'small-nav',   
                                'menu_class'      => 'small-menu',
                                'menu_id'         => 'small-menu'  
                            )); 
                            ?>   
                        </div> 
                          <?php
                        wp_nav_menu(array(
                            'theme_location'  => 'social-media',
                            'container'       => 'div',
                            'container_class' => 'footer-social',
                            'container_id'    => 'footer-social',
                            'menu_class'      => 'footer-social__menu',
                            'menu_id'         => 'footer-social__menu'  
                        ));  
                        ?>   
                    </div>
                </div>  
                
        </div> 
        <div class="nav-second " id="nav-second">
            <div class="ed-container">
                <div class="ed-item l-70">
                    <?php
                        wp_nav_menu(array(
                            'theme_location'  => 'big-menu',
                            'container'       => 'div',
                            'container_class' => 'big-nav',
                            'container_id'    => 'big-nav',
                            'menu_class'      => 'big-menu',
                            'menu_id'         => 'big-menu'  
                        )); 
                        ?>
                </div>
                <div class="ed-item l-30 s-cross-center"> 
                    <div class="front-search" id="front-search" > 
                        <?php get_search_form(true); ?>  
                    </div> 
                </div>
            </div>
        </div>   
        <span class="toggle toggle-all" id="toggle"></span>
        <div class="nav-all " id="nav-all">
                <?php
            wp_nav_menu(array(
                'theme_location'  => 'all-menu',
                'container'       => 'div',
                'container_class' => 'all-nav',
                'container_id'    => 'all-nav',
                'menu_class'      => 'all-menu collapsible',
                'menu_id'         => 'all-menu'  
            )); 
            ?>
        </div>  
    </header>
    <?php if(is_front_page()){?>
        <main class="main " id="main"> 
    <?php }?>