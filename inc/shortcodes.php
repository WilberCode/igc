<?php 
/*  List public posts of Cursos */ 
function get_cursos($atts){ 
	
	global $post; 

	$atts = shortcode_atts(
		array(
			'programa' => 'cursos',
         'cantidad'=> -1,
		), $atts, 'cursos' );


	$post_result = ''; 
   
 
	$args = array(
	'post_type' => $atts['programa'],
	'orderby' => 'date',
	'order' => 'desc',
	'posts_per_page' => $atts['cantidad'],
	);
	$post_service  = '';
	$listing = new WP_query($args);
	$html_links =  '';
	$html_links_wrap = '';
	$html_links_loop  = '';


   $curso_inversion_precio_normal = null;
   $curso_inversion_precio_rebajado = null;
   $curso_inversion_precio_descuento_porcentaje  = null;
   $curso_inversion_precio_promocion = null;
   $curso_inversion_precio_html = '';

	if ($listing->have_posts()) : 
		while ($listing->have_posts()) : $listing->the_post();   
		  
         if(!empty(get_field('curso_inversion')['curso_inversion_precio_normal'])){ 
            if( have_rows('curso_inversion') ){
               while( have_rows('curso_inversion') ){
                  the_row(); 
                     /*   echo '<code> <pre> ';
                  print_r( $curso_inversion_precio_normal);
                  echo '</pre> </code>'; */
                  $curso_inversion_precio_normal = get_sub_field('curso_inversion_precio_normal');
                  $curso_inversion_precio_rebajado = get_sub_field('curso_inversion_precio_rebajado');
                  $curso_inversion_precio_promocion = get_sub_field('curso_inversion_precio_promocion'); 

                  $valid_promotion = false;
                  $field_date_time = false;
                  try {
                     $field_date_time = new DateTime($curso_inversion_precio_promocion); 
                  } catch (Exception $e) {
                     error_log($e);
                  } 
                  $current_date = new DateTime();

                  
                  if ($current_date != false) {
                    if(!($current_date> $field_date_time)){  
                       $valid_promotion = true;
                    }
                 }
                 
                 if ($curso_inversion_precio_rebajado && $valid_promotion || (empty($curso_inversion_precio_promocion) && !empty($curso_inversion_precio_rebajado ) ) ){ 

                     $curso_inversion_precio_ahorro = ($curso_inversion_precio_normal - $curso_inversion_precio_rebajado);
                     $curso_inversion_precio_descuento_porcentaje = round(100/($curso_inversion_precio_normal / $curso_inversion_precio_ahorro)); 
                     
                     $curso_inversion_precio_html = ' <div class="investment-price-info" >
                                                         <div class="investment-price-normal ">Normal: <span>'.$curso_inversion_precio_normal.'</span> </div>
                                                         <span class="investment-price-discount bg-secondary" >'.$curso_inversion_precio_descuento_porcentaje.'% Descuento</span>
                                                      </div>
                                                      <var  class="investment-price-current ">S/.'.$curso_inversion_precio_rebajado.'</var>'; 
                  }else{   
                     $curso_inversion_precio_html =  ' <div class="investment-price-normal ">Precio: </div>   <var  class="investment-price-current ">S/.'.$curso_inversion_precio_normal.'</var>';
                     
               
                  }
                  $curso_inversion_precio_html = ' <div  class="investment-price investment-price-wrap" >
                                                         '.$curso_inversion_precio_html.'
                                                   </div>  ';
                  
            
               }
            }else{
               $curso_inversion_precio_html ='';
            }
         }else{
            $curso_inversion_precio_html ='';
         }

         // Thumbnail
         $url_image = thumbnail_image_url('programa-thumbnail');  
			if ($url_image) { 
            $curso_thumbnail =  '<img  src="'.$url_image.'" alt="'.get_the_title().'">   ';
			} else {
				$curso_thumbnail  = '<img class="h-[273px]"  src="'.get_template_directory_uri().'/build/img/programa-thumbnail-default.png" alt="'.get_the_title().'"> ';
             
         }   

         //Tipo
         $post_type_plural = get_post_type();
         $post_type_singular =  substr($post_type_plural, -1) == 's'?substr($post_type_plural,0, -1):$post_type_plural;  

         // Fecha de inicio  
         $curso_inicio = get_field('curso_inicio')?'<div  class="card-info" ><svg><use href="'.get_bloginfo('template_directory').'/build/svg/icons.svg#calendar"></svg> <span class="card-info__attribute" >Inicio de clases: </span><span  class="card-info__value">'.get_field('curso_inicio').'</span> </div>':'';
         $curso_certificacion = get_field('curso_certificacion')?'<div  class="card-info" ><svg><use href="'.get_bloginfo('template_directory').'/build/svg/icons.svg#diplomas"></svg> <span class="card-info__attribute" >Certificación: </span><span  class="card-info__value"> '.get_field('curso_certificacion').'</span> </div>':'';
         
         $post_service =  ' <a class="card" href="'.get_the_permalink().'" >
                           '.$curso_thumbnail.'
                           <div  class=" card-body" > 
                              <div class=" card-mode" >
                                 <span class="card-mode__type" > '.ucfirst($post_type_singular).' </span> 
                                 <div  class="card-mode-live bg-red" ><svg><use href="'.get_bloginfo('template_directory').'/build/svg/icons.svg#live"></svg> <span> en vivo </span> </div> 
                              </div>
                              <h3 class="card__title"> '.get_the_title().' </h3>  
                              <div>
                                 '. $curso_inicio.'
                                 '. $curso_certificacion.'
                                 
                              </div>
                              <div class="mt-auto" >
                               '.$curso_inversion_precio_html.'
                                 <button  class="btn  btn-outline bg-secondary w-full mt-5">Más Información</button>
                              </div>
                           </div>
                           
                        </a>     ' ;
         $post_result .=  '<article  class="card-wrap" >      
						'.$post_service.'   
						</article> '; 
	    endwhile;
	endif; 
	 

  


	$post_result_html = ' 
							<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-[15px] lg:gap-x-[40px] gap-y-[20px] md:gap-y-[40px] place-content-center   "> 
								'.$post_result.'
							</div>   ';
   
   // reset the query 
	wp_reset_postdata(); 
	return $post_result_html;
	
    

} 

add_shortcode ('cursos','get_cursos'); 






/* List public posts of Diplomas*/ 
function get_diplomas($atts){
	
	global $post; 

	$atts = shortcode_atts(
		array(
			'programa' => 'diplomas',
         'cantidad'=> -1,
		), $atts, 'diplomas' );


	$post_result = ''; 
   
 
	$args = array(
	'post_type' => $atts['programa'],
	'orderby' => 'date',
	'order' => 'desc',
	'posts_per_page' => $atts['cantidad'],
	);
	$post_service  = '';
	$listing = new WP_query($args);
	$html_links =  '';
	$html_links_wrap = '';
	$html_links_loop  = '';


   $curso_inversion_precio_normal = null;
   $curso_inversion_precio_rebajado = null;
   $curso_inversion_precio_descuento_porcentaje  = null;
   $curso_inversion_precio_promocion = null;
   $curso_inversion_precio_html = '';

	if ($listing->have_posts()) : 
		while ($listing->have_posts()) : $listing->the_post();   
		  
         if(!empty(get_field('curso_inversion')['curso_inversion_precio_normal'])){ 
            if( have_rows('curso_inversion') ){
               while( have_rows('curso_inversion') ){
                  the_row(); 
                     /*   echo '<code> <pre> ';
                  print_r( $curso_inversion_precio_normal);
                  echo '</pre> </code>'; */
                  $curso_inversion_precio_normal = get_sub_field('curso_inversion_precio_normal');
                  $curso_inversion_precio_rebajado = get_sub_field('curso_inversion_precio_rebajado');
                  $curso_inversion_precio_promocion = get_sub_field('curso_inversion_precio_promocion'); 

                  $valid_promotion = false;
                  $field_date_time = false;
                  try {
                     $field_date_time = new DateTime($curso_inversion_precio_promocion); 
                  } catch (Exception $e) {
                     error_log($e);
                  } 
                  $current_date = new DateTime();

                  
                  if ($current_date != false) {
                    if(!($current_date> $field_date_time)){  
                       $valid_promotion = true;
                    }
                 }
                 
                 if ($curso_inversion_precio_rebajado && $valid_promotion || (empty($curso_inversion_precio_promocion) && !empty($curso_inversion_precio_rebajado ) ) ){ 

                     $curso_inversion_precio_ahorro = ($curso_inversion_precio_normal - $curso_inversion_precio_rebajado);
                     $curso_inversion_precio_descuento_porcentaje = round(100/($curso_inversion_precio_normal / $curso_inversion_precio_ahorro)); 
                     
                     $curso_inversion_precio_html = ' <div class="investment-price-info" >
                                                         <div class="investment-price-normal ">Normal: <span>'.$curso_inversion_precio_normal.'</span> </div>
                                                         <span class="investment-price-discount bg-secondary" >'.$curso_inversion_precio_descuento_porcentaje.'% Descuento</span>
                                                      </div>
                                                      <var  class="investment-price-current ">S/.'.$curso_inversion_precio_rebajado.'</var>'; 
                  }else{   
                     $curso_inversion_precio_html =  ' <div class="investment-price-normal ">Precio: </div>   <var  class="investment-price-current ">S/.'.$curso_inversion_precio_normal.'</var>';
                     
               
                  }
                  $curso_inversion_precio_html = ' <div  class="investment-price investment-price-wrap" >
                                                         '.$curso_inversion_precio_html.'
                                                   </div>  ';
                  
            
               }
            }else{
               $curso_inversion_precio_html ='';
            }
         }else{
            $curso_inversion_precio_html ='';
         }

         // Thumbnail
         $url_image = thumbnail_image_url('programa-thumbnail');  
			if ($url_image) { 
            $curso_thumbnail =  '<img  src="'.$url_image.'" alt="'.get_the_title().'">   ';
			} else {
				$curso_thumbnail  = '<img class="h-[273px]"  src="'.get_template_directory_uri().'/build/img/programa-thumbnail-default.png" alt="'.get_the_title().'"> ';
             
         }   

         //Tipo
         $post_type_plural = get_post_type();
         $post_type_singular =  substr($post_type_plural, -1) == 's'?substr($post_type_plural,0, -1):$post_type_plural;  

         // Fecha de inicio  
         $curso_inicio = get_field('curso_inicio')?'<div  class="card-info" ><svg><use href="'.get_bloginfo('template_directory').'/build/svg/icons.svg#calendar"></svg> <span class="card-info__attribute" >Inicio de clases: </span><span  class="card-info__value">'.get_field('curso_inicio').'</span> </div>':'';
         $curso_certificacion = get_field('curso_certificacion')?'<div  class="card-info" ><svg><use href="'.get_bloginfo('template_directory').'/build/svg/icons.svg#diplomas"></svg> <span class="card-info__attribute" >Certificación: </span><span  class="card-info__value"> '.get_field('curso_certificacion').'</span> </div>':'';
         
         $post_service =  ' <a class="card" href="'.get_the_permalink().'" >
                           '.$curso_thumbnail.'
                           <div  class=" card-body" > 
                              <div class=" card-mode" >
                                 <span class="card-mode__type" > '.ucfirst($post_type_singular).' </span> 
                                 <div  class="card-mode-live bg-red" ><svg><use href="'.get_bloginfo('template_directory').'/build/svg/icons.svg#live"></svg> <span> en vivo </span> </div> 
                              </div>
                              <h3 class="card__title"> '.get_the_title().' </h3>  
                              <div>
                                 '. $curso_inicio.'
                                 '. $curso_certificacion.'
                                 
                              </div>
                              <div class="mt-auto" >
                               '.$curso_inversion_precio_html.'
                                 <button  class="btn  btn-outline bg-secondary w-full mt-5">Más Información</button>
                              </div>
                           </div>
                           
                        </a>     ' ;
         $post_result .=  '<article  class="card-wrap" >      
						'.$post_service.'   
						</article> '; 
	    endwhile;
	endif; 
	 

  


	$post_result_html = ' 
							<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-[15px] lg:gap-x-[40px] gap-y-[20px] md:gap-y-[40px] place-content-center   "> 
								'.$post_result.'
							</div>   ';
   
   // reset the query 
	wp_reset_postdata(); 
	return $post_result_html;
	
    

}
 
add_shortcode ('diplomas','get_diplomas'); 




/* List public posts of Congresos */ 
function get_congresos($atts){ 
	
	global $post; 

	$atts = shortcode_atts(
		array(
			'programa' => 'congresos',   
			'cantidad' => -1,   
		), $atts, 'congresos' );


	$post_result = ''; 
   $post_status =null;
  if(current_user_can('administrator')){
      $post_status = array('publish', 'draft','private');
  }else{
      $post_status = array('publish', 'draft');
  }
 
	$args = array(
	'post_type' => $atts['programa'],
	'orderby' => 'date',
	'order' => 'desc',
   'post_status' =>  $post_status,
	'posts_per_page' => $atts['cantidad'],
	);
	$post_service  = '';
	$listing = new WP_query($args);
	$html_links =  '';
	$html_links_wrap = '';
	$html_links_loop  = '';


   $congreso_inversion_precio_normal = null;
   $congreso_inversion_precio_rebajado = null;
   $congreso_inversion_precio_descuento_porcentaje  = null;
   $congreso_inversion_precio_promocion = null; 
   $congreso_inversion_precio_html = '';
   $congreso_estado = '';

	if ($listing->have_posts()) : 
		while ($listing->have_posts()) : $listing->the_post();  
      
         if(!empty(get_field('congreso_inversion')['congreso_inversion_precio_normal'])){ 
            if( have_rows('congreso_inversion') ){
               while( have_rows('congreso_inversion') ){
                  the_row();  

                  $congreso_inversion_precio_normal = get_sub_field('congreso_inversion_precio_normal');
                  $congreso_inversion_precio_rebajado = get_sub_field('congreso_inversion_precio_rebajado');
                  $congreso_inversion_precio_promocion = get_sub_field('congreso_inversion_precio_promocion'); 



                  $valid_promotion = false;
                  $field_date_time = false;
                  try {
                     $field_date_time = new DateTime($congreso_inversion_precio_promocion); 
                  } catch (Exception $e) {
                     error_log($e);
                  } 
                  $current_date = new DateTime(); 
                 
                  if ($current_date != false) {
                     if(!($current_date> $field_date_time)){  
                        $valid_promotion = true;
                     }
                  }

                  if ($congreso_inversion_precio_rebajado && $valid_promotion  || (empty($congreso_inversion_precio_promocion) && !empty($congreso_inversion_precio_rebajado ))){

                     $congreso_inversion_precio_ahorro = ($congreso_inversion_precio_normal - $congreso_inversion_precio_rebajado);
                     $congreso_inversion_precio_descuento_porcentaje = round(100/($congreso_inversion_precio_normal / $congreso_inversion_precio_ahorro)); 
                     
                     $congreso_inversion_precio_html = ' <div class="investment-price-info" >
                                                         <div class="investment-price-normal ">Normal: <span>'.$congreso_inversion_precio_normal.'</span> </div>
                                                         <span class="investment-price-discount bg-secondary" >'.$congreso_inversion_precio_descuento_porcentaje.'% Descuento</span>
                                                      </div>
                                                      <var  class="investment-price-current ">S/.'.$congreso_inversion_precio_rebajado.'</var>'; 
                  }else{   
                     $congreso_inversion_precio_html =  ' <div class="investment-price-normal ">Precio: </div>   <var  class="investment-price-current ">S/.'.$congreso_inversion_precio_normal.'</var>';
                     
               
                  }
                  $congreso_inversion_precio_html = ' <div  class="investment-price investment-price-wrap" >
                                                         '.$congreso_inversion_precio_html.'
                                                   </div>  ';
                  
            
               }
            }else{
               $congreso_inversion_precio_html ='';
            }
         }else{
            $congreso_inversion_precio_html ='';
         }

   
         $url_image = thumbnail_image_url('programa-thumbnail');  
         if ($url_image) { 
            $congreso_thumbnail =  '<img  src="'.$url_image.'" alt="'.get_the_title().'">   ';
         } else {
            $congreso_thumbnail  = '<img class="h-[273px]"  src="'.get_template_directory_uri().'/build/img/programa-thumbnail-default.png" alt="'.get_the_title().'"> ';
            
         }   

         $post_type_plural = get_post_type();
         $post_type_singular =  substr($post_type_plural, -1) == 's'?substr($post_type_plural,0, -1):$post_type_plural;  

         // Fecha de inicio  
         $congreso_inicio = get_field('congreso_inicio')?'<div  class="card-info" ><svg><use href="'.get_bloginfo('template_directory').'/build/svg/icons.svg#calendar"></svg> <span class="card-info__attribute" >Fecha de Inicio: </span><span  class="card-info__value">'.get_field('congreso_inicio').'</span> </div>':'';
         $congreso_certificacion = get_field('congreso_certificacion')?'<div  class="card-info" ><svg><use href="'.get_bloginfo('template_directory').'/build/svg/icons.svg#diplomas"></svg> <span class="card-info__attribute" >Certificación: </span><span  class="card-info__value"> '.get_field('congreso_certificacion').'</span> </div>':'';
     
         
         if (get_field('congreso_estado')){ 
            $congreso_estado =  ' <div  class="card-mode-live bg-red" ><svg><use href="'.get_bloginfo('template_directory').'/build/svg/icons.svg#live"></svg> <span> En vivo </span> </div> ';
         }else{
            $congreso_estado =  '<div  class="card-mode-live bg-secondary" ><svg><use href="'.get_bloginfo('template_directory').'/build/svg/icons.svg#check"></svg> <span>Realizado</span> </div> ';

         } 
         $tag_start ='';
         $tag_end ='';
         if (get_post_status()=='draft') { 
            $tag_start = '<div class="card">';
            $tag_end = '</div>';
         }else{
            $tag_start = '<a class="card" href="'.get_the_permalink().'" >';
            $tag_end = '</a>';
         }

         $post_service =  ' '.$tag_start.'
                              '.$congreso_thumbnail.'
                           <div  class=" card-body" >  
                              <div class=" card-mode" >
                                 <span class="card-mode__type" > '.ucfirst($post_type_singular).' </span> 
                                 '.$congreso_estado.'
                               </div>
                              <h3 class="card__title card__title-congreso "> '.get_the_title().' </h3>  
                              <div>
                                 '. $congreso_inicio.'
                                 '. $congreso_certificacion.'
                                 
                              </div>
                              <div class="mt-auto" >
                               '.$congreso_inversion_precio_html.'
                                 <button  class="btn  btn-outline bg-secondary w-full mt-5">Más Información</button>
                              </div>
                           </div>
                           
                        '.$tag_end .'' ;
         $post_result .=  '<article  class="card-wrap" >      
						'.$post_service.'   
						</article> '; 
	    endwhile;
	endif; 
	  
   
	$post_result_html = '  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-[15px] lg:gap-x-[40px] gap-y-[20px] md:gap-y-[40px] place-content-center   "> 
                           '.$post_result.'
                           </div>   ';
	// reset the query 
	wp_reset_postdata(); 
	return $post_result_html;
	
    

   
}

add_shortcode ('congresos','get_congresos'); 



 
  

 
 
