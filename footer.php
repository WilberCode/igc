<!-- Site footer markup goes here -->
<section class="bg-layout layout  "  >
      <div class="container"> 
         <div class="layout-heading">
               <h2>Ubicación</h2>  
               <p>Donde nos encuentras / Contactos </p>
         </div> 

         <div class="cardfull "   >
            <div class=" cardfull-left "  >
               <div>

               <?php  
                      $contactos =  get_field('contactos','option');
                     ?> 
              
                  <?php if(!empty( $contactos )){ ?>  
                     <?php 
                              if($contactos){
                                 foreach( $contactos as $contacto ) {   ?> 
                                   
                                       <h4> <?=$contacto['contactos_titulo'];?></h4>
                                       <?php  
                                       $contactos_info = $contacto['contactos_info'];
                                    
                                       if($contactos_info){ ?>   
                                          <?php  foreach( $contactos_info as $contactos_info_single ) {  
                                             $tag = '';
                                             $tag_close='';
                                             if($contactos_info_single['contactos_info_enlace_activo']){ 
                                                $tag = '<a href="'.$contactos_info_single['contactos_info_enlace'].'">  ';
                                                $tag_close = '</a>';
                                             } else{
                                                $tag = '<div>';
                                                $tag_close  = '</div>';
                                             }?> 
                                             <?=$tag;?>
                                                   <address class="contactinfo-data">
                                                      <div  class="contactinfo-icon-wrap" >  
                                                            <div  class="contactinfo-icon !bg-secondary-500">
                                                               <?php if( $contactos_info_single['contactos_info_icono']){?>
                                                                  <img class="style-svg" src="<?=$contactos_info_single['contactos_info_icono'] ?>"> 
                                                               <?php }else{?>
                                                                  <span class="text-white">➤</span>
                                                               <?php }?>
                                                            </div>  
                                                      </div>
                                                      <div class="contactinfo-content" >  
                                                            <h5 class="contactinfo-content-name"><?=$contactos_info_single['contactos_info_nombre'] ?></h5> 
                                                            <p class="contactinfo-content-description"><?=$contactos_info_single['contactos_info_descripcion'] ?></p> 
                                                      </div> 
                                                   </address>   
                                           <?=$tag_close;?>
                                             <?php    
                                          }  ?>    
                                       <?php }?>   
                                    <?php    
                                 }    
                              }
                              ?>   
                  <?php }?>  
               </div>

         
            </div>  
            <div  class="cardfull-right  " >  
                  <iframe  class="rounded-card h-[200px] md:h-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.3876286466257!2d-77.03754118406674!3d-12.085594145917254!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c9f33e6334c3%3A0x8703fdb409aa8654!2sInstituto%20de%20Gerencia%20Intercontinental!5e0!3m2!1ses-419!2spe!4v1667934107730!5m2!1ses-419!2spe" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
             </div>
         </div>    

      </div>
   </section>

</div>
 
<footer  class="footer" > 
   <div class="container">  
       <a class="footer-top " href="#html" title="Arriba" ><svg class="w-5 h-5 text-secondary-500 fill-current rotate-180 ">  <use href="<?php echo get_bloginfo('template_directory').'/build/svg/icons.svg#down'; ?>"> </svg> </a>
   
        <?php dynamic_sidebar('footer-subscribe'); ?>
        <div class="flex flex-col lg:flex-row gap-12 md:gap-3 mt-[5rem] ">
            <div class=" text-center lg:text-left" >
            <?php 
                  $custom_logo_id = get_theme_mod( 'custom_logo' );
                  $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );?>
                  <?php if ( has_custom_logo() ) { ?>
                  <a href="<?php echo home_url();?>" rel="home">
                     <img class="max-w-[300px] inline-block p-3 rounded-10 bg-white" src="<?php echo esc_url( $logo[0]);?>"
                        alt="<?php bloginfo('name'); ?>">
                  </a>
                  <?php }else{?>
                  <a href="<?php echo home_url();?>" rel="home">
                     <?php echo  '<h1 class="text-primary-500 text-lg">'.get_bloginfo( "name" ).'</h1>'; ?>
                  </a>
            <?php }?>    
            <div  class=" my-4" > 
               <?php dynamic_sidebar('footer-social-media'); ?> 
            </div>
            </div>
            <div class="flex-grow">
                  <?php  
                  wp_nav_menu(array(
                     'theme_location'  => 'footer',
                     'container'       => 'nav',
                     'container_class' => 'footer-nav',   
                     'container_id'    => 'footer-nav',  
                     'menu' => 'ul',
                     'menu_class'      => 'footer-menu',
                     'menu_id'         => 'footer-menu',
                  ));  
            ?> 
            </div> 
        </div>
      <!--    <div  class="flex flex-col items-center mt-10" >
            <?php// dynamic_sidebar('footer-social-copyright'); ?>
         </div> -->
         <div  class="flex flex-col items-center mt-10 border-t border-white border-opacity-5 py-3 " >
            <?php dynamic_sidebar('footer-copyright'); ?> 
         </div>
    </div>

</footer> 
  
<?php get_template_part( 'templates/partials/document-close' ); ?>

