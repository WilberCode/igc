
            <!-- <div class="clients">
                <div class="ed-container"> 
                    <div class="ed-item"> 
                        <h1>Nuestros Clientes</h1> 
                            <?php 
                               // echo do_shortcode(' [logoshowcase  cat_id="20"  slides_column="5"]  ');
                            ?>   
                    </div>    
                </div>  
            </div>   -->
           
       </div> 
     </div>    
 
 <?php  
if(is_home()){?>
 </main>  
 <?php }
?>
 
 
 
 <?php    
  ?> 
   <style type="text/css" >
      .footer::before{
        background: linear-gradient(rgba(52, 66, 115, 0.98),  rgb(52, 66, 115)), url(<?php  echo get_theme_mod('footer_image'); ?>) center 40%/cover no-repeat;
  
    } 
    </style> 
 <footer class="footer">  
    <div class="ed-container">
        <div class="first-col ed-item s-100 m-50 lg-40">
            <div class="footer-logo">
                <?php $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' ); 
                    
                    if ( has_custom_logo() ) { ?> 
                            <a class="logo__url" href="<?php echo home_url();?>" rel="home">
                                <img class="logo__img" src="<?php echo esc_url( $logo[0]);?>">
                            </a>    
                <?php } else {?>
                    <a class="logo__title" href="<?php echo home_url();?>" rel="home">
                        <?php echo  '<h1 class="logo__title">'.get_bloginfo( "name" ).'</h1>'; ?>
                    </a> 
                <?php }?>
            </div>  
            <?php  dynamic_sidebar('footer_contact');?>  
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
        <div class="second-col   ed-item s-100 m-50  lg-60">
                <?php
                wp_nav_menu(array(
                'theme_location' => 'footer-menu', 
                'container_class' => 'footer-menu__wrap',
                'container_id' => 'footer-menu__wrap',
                'menu_class'=>'footer-menu',
                'menu_id'=>'footer-menu'
                // 'link_after' => '<span class="menu-item__line"></span>'
            ));
            ?> 
        </div> 
        <div class="ed-item col-12">
            <div class="footer-copyright">
                <p>Copyright &copy; <?php the_date('Y'); ?> Instituto de Gerencia Intercontinental. Todos los derechos reservados. </p>
            </div>
        </div> 
    </div> 
 </footer>
 <div class="goback">
    <a href="#">
        <!-- <img src="<?php// bloginfo('template_url'); ?>/assets/img/gobacklink.svg" alt=""> -->
    </a>
 </div>
<?php
wp_footer();
?>    
     
     <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
       
    </script>
    </body> 
  
</html>