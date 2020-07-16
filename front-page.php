<?php get_header();?>
<div class="banner" id="banner">
    <?php   
        echo do_shortcode('[metaslider id="3376"]');
    ?>	    
</div> 
 
<div class=" s-pt-4 l-pt-4 xl-pt-4" ></div>
<?php $file = './style.scss';?>  
<?php get_template_part("/template-part/post/content-tabs"); ?> 

<div  class="  ed-grid m-grid-1 m-grid-3 l-grid-4 gap-2  l-mb-4" >
    <div class=" m-cols-1 m-cols-2 l-cols-3 l-pr-1 ">
    <?php
       get_template_part("content"); ?>
    </div>
    <div class=" m-cols-1 m-cols-1 l-cols-1 frontpage-sidebar "> 
        <div class="frontpage-form ">
            <div class="frontpage-form-header">
                <h2> Solicita un curso que deseas tomar</h2>
            </div>
            <div class="frontpage-form-body"> 
             <?php   

                if (file_exists(dirname(__FILE__) . $file)) {  
                    echo do_shortcode('[everest_form id="3034"]'); 
                }else{
                    echo do_shortcode('[everest_form id="3290"]'); 
                }
                ?>
            </div>
        </div>
        <?php       
        dynamic_sidebar('frontpage-aside'); 
        ?>  
    </div>
</div> 
 
<style>
        .request::before{
            content: '';
            position: absolute; 
            background: linear-gradient(rgba(55, 66, 115, 0.92),rgba(55, 66, 115, 0.96)),url(<?php  echo get_theme_mod('request_image'); ?> ) center 40%/cover no-repeat;
        }
</style>
 <div class="request   ">  
     <div class="ed-container full">
        <div class="ed-item s-100 m-40 l-55 xl-55 ">
            <div class="request-content">
                <h2 class="fw-normal">Capacítate en los Programas más requeridos en la <span>Gestión Pública</span></h2>
                <div class="request-content__offer">
                    <h3 class="fw-normal ml-8  ">Te Ofrecemos</h3>
                    <ul>
                        <li>Cursos Presenciales(Certificados)</li>
                        <li>Cursos y Diplomas en DVD(Certificados)</li>
                        <li>Programas In-House(Certificados)</li> 
                    </ul>
                </div>
                <img src="<?php echo get_bloginfo('template_directory').'/assets/img/programas.png'; ?>" alt="Programas">
            </div>
        </div>
        <div class="ed-item s-100 m-60 l-45  xl-45 l-cross-center"> 
            <div class="request-form">
                <h2 class="fw-bold mw-small m-center">Complete los campos <br> y solicita el curso que deseas llevar</h2>
              <?php   

                if (file_exists(dirname(__FILE__) . $file)) {  
                    echo do_shortcode('[everest_form id="3000"]'); 
                }else{
                    echo do_shortcode('[everest_form id="2806"]'); 
                }
                ?>
            </div> 
        </div>
    </div>
</div>
<style>
    .subscribe::before{ 
        background: linear-gradient(rgba(40, 46, 107, 0.92), rgba(40, 46, 107, 0.92)), url(<?php  echo get_theme_mod('newsletter_image'); ?>) center 40%/cover no-repeat;
    }
</style>  
<div class="subscribe  4">
        <div class="subscribe-wrap " > 
                <div class="subscribe-content ed-grid  s-grid-1 m-grid-1 lg-grid-4 xl-grid-4  rows-gap  gap-2" > 
                    <div class="subscribe-content-email" > 
                        <svg ><use href="<?php echo get_bloginfo('template_directory').'/assets/svg/icons.svg#email'; ?>"></svg>
                    </div>
                    <div class="subscribe-content__form s-cols-1 m-cols-1 l-cols-2 xl-cols-2 " >   
                        <h1>Suscríbete Aquí</h1>
                        <p>Para recibir novedades de cursos, información sobre diplomados, ofertas especiales y mucho más.</p>  
                        <?php   

                        if (file_exists(dirname(__FILE__) . $file)) {  
                            echo do_shortcode('[wpforms id="1593"]');  
                        }else{
                            echo do_shortcode('[wpforms id="1740"]'); 
                        }
                        ?>
                     </div>
                    <div class="subscribe-content-circle" >  
                        <svg xmlns="http://www.w3.org/2000/svg"   viewBox="0 0 214.127 221">
                        <path id="Trazado_826" data-name="Trazado 826" d="M0,0H203a6,6,0,0,1,6,6V215a6,6,0,0,1-6,6H0S65,161,22,92,0,0,0,0Z" transform="translate(5.127)" fill="#344273"/>
                        </svg>
                     </div> 
        </div>
</div>

<div class="ed-container l-mb-4 xl-mb-4">
    <div class="ed-item l-100 l-mb-4 ">
        <div class="gallery">
            <h1 class=" " >Congresos, Cursos, Diplomados y Talleres Desarrolladas</h1> 
            <div class="gallery-list  "> 
                <?php
                
                if (file_exists(dirname(__FILE__) . $file)) {  
                    echo do_shortcode('[meta_gallery_carousel id="2836" show_caption="false " show_title="false" slide_to_show="4" autoplay_speed="1000"] ');
 
                }else{
                    echo do_shortcode('[meta_gallery_carousel id="2357" show_caption="false " show_title="false" slide_to_show="4" autoplay_speed="1000"] ');
                }?>
            </div>
        </div>
    </div>
</div> 
<div class="client-container xl-mt-4">
        <div class="ed-container"> 
            <div class="ed-item"> 
                <h1>Nuestros Clientes</h1> 
                <div class="client-wrap">
                    <?php  dynamic_sidebar('frontpage-clients');?> 
                </div> 
            </div>     
        </div>  
</div>  
<?php
// printf('<div class="file">front-page.php</div>');
get_footer();   