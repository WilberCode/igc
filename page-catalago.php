<?php 

/*
Template Name: Catálogo
Template Post Type: post, page, event
*/  
?>

<?php 
get_header();  
 
?>
 

<main class="main   pb-[60px] sm:pb-[100px] ">
   <section class="layout bg-layout"  >
      <div class="container">
         <div class=" ">
            <div class="cardfull "   >
               <div class="  cardfull-right overflow-hidden "  >
                  
                     <?php       
                     $thumbnail = thumbnail_image_url('full');  
                     if ($thumbnail) { 
                        $thumbnail =  $thumbnail;
                     } else {
                        $thumbnail = get_template_directory_uri().'/build/img/programa-thumbnail-default.png'; 
                     } 
                     ?>
                     <img class="w-full h-[130px] sm:h-[300px] max-w-[795px] object-cover object-center" src="<?=$thumbnail; ?>" alt="<?php the_title(); ?>">
                   
               </div>  
               <div  class=" cardfull-left maxsm:!p-6 " >  
                  <div>
                  <?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
                     <h1  class="  mb-4 text-secondary-500" ><?php the_title(); ?></h1>   
                     <?php the_content(); ?> 
                  <?php endwhile; endif; ?>  
                  </div>
               </div>
            </div>  
         </div>
      </div>
   </section>
   <div class="container">  
      <?php 

      $column1_html = '';
      $column2_html = ''; 
     
      $catalogo = get_field('catalogo'); 
      $counter = 1;
      
      if(!empty($catalogo) ){  ?>
             
            <?php 
            $catalogo_cantidad = round(count($catalogo)/2);

            foreach( $catalogo as $catalogo_single ) { 
               
               if($counter  <= $catalogo_cantidad){ 
                     $column1_html .= '<li class=" catalog-program " >
                                                <div  class="catalog-program-icon" ><span>'.$counter.'</span></div> <h5 class=" catalog-program-name " >'.$catalogo_single['catalogos_programa'].'</h5> <div  class="catalog-program-callaction" ><button data-program="'.$catalogo_single['catalogos_programa'].'">Solicitar</button></div>
                                       </li>';
               }else{ 
                  $column2_html .= '<li class=" catalog-program " >
                                             <div  class="catalog-program-icon" ><span>'.$counter.'</span></div> <h5 class=" catalog-program-name " >'.$catalogo_single['catalogos_programa'].'</h5> <div  class="catalog-program-callaction" ><button  data-program="'.$catalogo_single['catalogos_programa'].'">Solicitar</button></div>
                                    </li>';
               } 
         $counter++;  ?>
         <?php }  ?>   
            
         <div class="catalog-wrap pt-14">
            <div class="grid grid-cols-1 lg:grid-cols-2  lg:gap-10">
               <div>
                        <ul  class="catalog">
                        <?=$column1_html;  ?> 
                        </ul>         
               </div>                         
               <div>
                     <ul class="catalog">
                     <?=$column2_html;  ?>        
                     </ul> 
               </div>                         
            </div>  
         </div>  
        
      <?php }?>
 
   </div>
</main>

 
<div class="catalog-modal-wrap "  id="catalog-modal-wrap">
   <div  class="catalog-modal-close-wrap" id="catalog-modal-close-wrap" ></div>   
   <div class="catalog-modal bg-white px-6 sm:px-8 py-4 sm:py-8 relative card-decorator">
      <button class="catalog-modal-close" id="catalog-modal-close" >X</button>
      <?php dynamic_sidebar('catalogo-form');?> 
   </div>
</div>



























        


<?php
	get_footer();?>
