<?php get_template_part( 'templates/partials/document-open' ); ?>



<header class="header"  > 
   <div class=" header-info bg-primary-500 bg-opacity-5 py-2">
      <div  class="container">
      
      <div class="flex justify-end items-center space-x-5 ">
         <?php dynamic_sidebar('footer-social-media-header'); ?> 
         <?php  
                           wp_nav_menu(array(
                              'theme_location'  => 'third',
                              'container'       => 'nav',
                              'container_class' => 'header-nav-third maxsm:hidden',   
                              'container_id'    => 'header-nav-third',  
                              'menu' => 'ul',
                              'menu_class'      => 'header-menu-third  ',
                              'menu_id'         => 'header-menu-third',
                           ));  
                     ?> 

         </div>
      </div> 
   </div>
    <div class="header-wrap ">  
      <div class="container h-full ">
         <div class="h-full bg-white   " id="navbar-sticky"  > 
               <div  class="  sticky-content flex   justify-between items-center space-x-2   w-full h-full   " >  
                     <div  class="flex justify-between items-center maxlg:flex-1 space-x-2  z-40 "  id="navbar-sticky-mobile">
                        <div  class="header-logo flex items-center  w-full   md:max-w-[250px] z-40  " >
                                 <?php 
                                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                                    $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );?>
                                    <?php if ( has_custom_logo() ) { ?>
                                    <a href="<?php echo home_url();?>" rel="home">
                                       <img src="<?php echo esc_url( $logo[0]);?>"
                                             alt="<?php bloginfo('name'); ?>">
                                    </a>
                                    <?php }else{?>
                                    <a href="<?php echo home_url();?>" rel="home">
                                       <?php echo  '<h1 class="text-primary-500 text-lg">'.get_bloginfo( "name" ).'</h1>'; ?>
                                    </a>
                                 <?php }?>    
                        </div> 
                        <button id="nav-toggle" class="nav-toggle btn-custom ">
                              <div  class="nav-toggle-iconburger" id="nav-toggle-iconburger">
                                 <span></span>
                                 <span></span>
                                 <span></span>
                                 <span></span>
                                 <span></span>
                                 <span></span>
                              </div>
                        </button> 
                  </div>
                  <?php  
                     wp_nav_menu(array(
                           'theme_location'  => 'main',
                           'container'       => 'nav',
                           'container_class' => 'header-nav',   
                           'container_id'    => 'header-nav',  
                           'menu' => 'ul',
                           'menu_class'      => 'header-menu flex-grow',
                           'menu_id'         => 'header-menu',
                     ));  
                  ?>     
                  <div  class="z-40" >   
                     <?php  
                           wp_nav_menu(array(
                              'theme_location'  => 'secondary',
                              'container'       => 'nav',
                              'container_class' => 'header-nav-secondary',   
                              'container_id'    => 'header-nav-secondary',  
                              'menu' => 'ul',
                              'menu_class'      => 'header-menu-secondary  ',
                              'menu_id'         => 'header-menu-secondary',
                           ));  
                     ?> 
                  </div>  
               </div>
            
         </div>  
         <div class="mobile-nav-wrap" id="mobile-nav-wrap"  > 
               <?php  
               wp_nav_menu(array(
                  'theme_location'  => 'mobile',
                  'container'       => 'nav',
                  'container_class' => 'mobile-nav',
                  'container_id'    => 'mobile-nav',  
                  'menu' => 'ul',
                  'menu_class'      => 'mobile-menu',
                  'menu_id'         => 'mobile-menu' ,
               ));  
         ?> 
        </div>
      </div>   
     </div>   
</header>  
 
 <div class=" search-home  ">
    <div class=" max-w-xl m-auto flex-1 flex flex-col-reverse sm:flex-row items-center space-x-4 px-3" > 
        <?php get_search_form(true); ?>
        <button id="search-home-close"  class="cursor-pointer maxsm:mb-1" >
            <svg class="w-10 h-10 ">  <use href="<?php echo get_bloginfo('template_directory').'/build/svg/icons.svg#close'; ?>"> </svg> 
        </button>
    </div>
</div>  

<div class="page-content flex-1">


  