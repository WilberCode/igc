<?php

function ju_head(){
    ?>
    <style type="text/css" >
        .customizer-bg{
            background-color:<?php echo get_theme_mod('header_bg_color','#0E205F');?> !important;
            color:#ffffff; 
        }
        /* Destinations */
        @media screen and (max-width:400px){
            .cus-bg__dest p{
            background-color:<?php echo get_theme_mod('header_bg_color','#0E205F');?> !important;
            color:#ffffff; 
            }
        } 
        .cus-bdc__desc{
            border-left-color:<?php echo get_theme_mod('header_bg_color','#0E205F');?> !important;
        }
        .cus-bg__dests::before{
            background-color:<?php echo get_theme_mod('header_bg_color','#0E205F');?> !important;
            
        }
        .cus-bg__dest::before{
            background-color:<?php echo get_theme_mod('header_bg_color','#0E205F');?> !important;
            border:5px solid  rgba(0,0,0,0.2)  !important;
            box-shadow: 0 0 0 5px rgba(0,0,0,.2);
        } 
        /* Services */
        .services__title::before{
            background-color:<?php echo get_theme_mod('header_bg_color','#0E205F');?> !important;
            
        }
        .terminals__title::before{
            background-color:<?php echo get_theme_mod('header_bg_color','#0E205F');?> !important;
            
        }
        .services__item:before { 
            border-bottom:2px solid <?php echo get_theme_mod('header_bg_color','#0E205F');?> !important;
            border-right: 2px solid <?php echo get_theme_mod('header_bg_color','#0E205F');?> !important;
        }
        /* Questions List */
        .questions__list{
            background-color:<?php echo get_theme_mod('header_bg_color','#0E205F');?> !important;
        }
        .questions__btn{
            background-color:<?php echo get_theme_mod('header_bg_color','#0E205F');?>;
        } 
    </style>

    <?php
}
add_action('wp_head','ju_head');
