 
<?php 
/*
Template Name: Front Page
Template Post Type: post, page, event
*/ 

get_header();

$home_url = home_url();
?>
<style>
   :root{
      --bg-current:var(--bg-primary);
   }

   
   .banner-wrap{
      animation: banner  2s ease-in-out; 
   }

   @keyframes banner {  
      0% {visibility:collapse} 
      100% { visibility:visible}   
   }
</style> 
<div class="max-w-[1700px] mx-auto" >
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<h1  class="absolute text-transparent z-[-1] text-center " ><?php the_title(); ?></h1>
 
      <div class="overflow-hidden banner-wrap bg-layout  "  >
      <?php  the_content(); ?>
      </div> 

<?php endwhile; endif; ?> 
</div>


<!--   <section class=" bg-secondary-500 sm:h-[666px]">

  </section> -->
  
<section  class="bg-white     z-20 menutabs  mb-2 "  id="menutabs">
   <div class="container maxsm:px-1 ">
      <ul  class="grid grid-cols-4  gap-1 sm:gap-6 py-6 ">
         <?php 
            if (get_field('home_menutabs')){  
               if( have_rows('home_menutabs') ){ 
                  ?>  
                     <?php while( have_rows('home_menutabs') ){
                           the_row(); ?> 
                              <li> 
                                 <a class="note flex justify-center " style="background-color:<?=get_sub_field('home_menutabs_color');  ?>" href="#<?=get_sub_field('home_menutabs_id');  ?>" >
                                    <div class=" note-icon !left-auto " >
                                       <div  class=" note-icon-bg" >
                                          <svg  class="w-full h-full "  fill="<?=get_sub_field('home_menutabs_color');  ?>"><use href="<?php echo get_bloginfo('template_directory').'/build/svg/icons.svg#decorator';?>"></svg>
                                       </div> 
                                       <div class="note-icon-image " >
                                          <svg  class="w-6 h-6 text-dark fill-current  "   ><use href="<?php echo get_bloginfo('template_directory').'/build/svg/icons.svg#'.get_sub_field('home_menutabs_id').'';?>"></svg>
                                       </div>
                                    </div>
                                    <div  class="text-center" >  
                                             <h3  class="mt-2"> <?=get_sub_field('home_menutabs_nombre');  ?></h3>  
                                    </div>  
                                 </a>

                              </li> 

                        <?php  
                        }  ?>  
            <?php  }
         
         }  ?> 
         
      </ul>
   </div>
</section>
<main  class="flex-1 bg-layout" id="main">   
 
    <?php
    $counter_program = 1;
    if( have_rows('home_programas') ): ?> 

      <?php while( have_rows('home_programas') ): the_row();  ?>
         <?php $home_programas_programa =  get_sub_field('home_programas_programa'); 
                  if($home_programas_programa):
                     $home_programas_programa_nombre = $home_programas_programa['home_programas_programa_nombre'];  
                     $home_programas_programa_cantidad = $home_programas_programa['home_programas_programa_cantidad'];   
                        ?>
         
         <section class="layout" id="<?=$home_programas_programa_nombre; ?>" style="background-color:<?=get_sub_field('home_programas_color');?>" >
            <div class="container">
               <div class="layout-heading">
                       
                     <?php if (get_sub_field('home_programas_titulo')) {  ?> 
                        <h2><?php echo get_sub_field('home_programas_titulo'); ?></h2>
                     <?php } ?>
                     <?php if (get_sub_field('home_programas_descripcion')) {  ?> 
                        <p><?=get_sub_field('home_programas_descripcion'); ?> </p>
                     <?php } ?>
               </div> 
            
                     
                     <?php echo do_shortcode('['.$home_programas_programa_nombre.' programa="'.$home_programas_programa_nombre.'" cantidad="'.$home_programas_programa_cantidad.'"]'); ?>
                  <?php endif;?> 
                  </div>

                  <?php   
                  if($home_programas_programa_cantidad >= 6):   ?>
                     <div  class="text-center pt-6 sm:pt-10 mb-0 "><a class="btn" href="<?=$home_url;?>/<?=$home_programas_programa_nombre; ?>">Ver más <?php echo get_sub_field('home_programas_titulo'); ?></a></div>
                  <?php 
                     $counter_program++; 
                  endif;?>
         </section>
      <?php endwhile; ?> 
   <?php endif; ?>
         
 
   </main>  

   <section class="bg-layout layout " id="in-house"  >
      <div class="container"> 
      <?php if( have_rows('home_in_house') ): ?>
         <?php while( have_rows('home_in_house') ): the_row();   
            $home_in_house_imagen = get_sub_field('home_in_house_imagen');
         ?>
  
            <div class="cardfull "   >
               <div  class=" cardfull-right " >  
                  <img class="rounded-card w-full max-w-[798px]" src="<?= esc_url( $home_in_house_imagen['sizes']['inhouse-thumbnail']); ?>" alt="">               
                     
               </div>
               <div class=" cardfull-left "  >
                  <div class=" m-0  editor "> 
                        <?=get_sub_field('home_in_house_descripcion');?>
                        <?php 
                         $home_in_house_boton =   get_sub_field('home_in_house_boton'); 
                         if(!empty($home_in_house_boton['home_in_house_boton_texto'])){ 
                        ?>
                           <a  class="btn bg-secondary mt-4" href="<?=$home_in_house_boton['home_in_house_boton_enlace']; ?>"><?=$home_in_house_boton['home_in_house_boton_texto']; ?></a>
                        <?php }?>
                  </div>
               </div>
                  
            </div>  
         <?php endwhile; ?>
      <?php endif; ?>
        

      </div> 
   </section>
   <section class="bg-white layout clients" id="clientes" >
      <div class="container"> 
       <div class="layout-heading">
            <h2>Clientes</h2>  
            <p  class="text-sm sm:text-h5" >Que ya confiaron en nosotros </p>
      </div>
      <?php 
             if (get_field('home_clientes')){  
                  if( have_rows('home_clientes') ){ 
                     ?>  
                     <ul  class="clients-images flex flex-wrap justify-center items-center space-x-6 sm:space-x-12 space-y-6 ">
                           <?php while( have_rows('home_clientes') ){
                              the_row();   
                              $home_clientes_logo = get_sub_field('home_clientes_logo');
                              ?> 
                                 <li> 
                                   <img src="<?=$home_clientes_logo['url'];  ?>" alt="<?=get_sub_field('home_clientes_nombre');  ?>">  
                                 </li> 
 
                          <?php  
                           }  ?>  
                     </ul>
               <?php  }
            
            }  ?> 
      </div>
   </section>

 
<?php
get_footer();?>  
