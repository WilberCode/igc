<?php get_header(); ?> 
<?php
$home_url = home_url();
$page = get_post_type();
$page_url = $home_url."/".$page; 
$bg_current = "#5e2fff";  

$curso_banner = get_field('curso_banner','option');   

$path_icon = get_bloginfo('template_directory').'/build/svg/icons.svg';

?> 

<?php if($curso_banner){
    
    $bg_current  = $curso_banner['curso_banner_color'];

   ?>
   <style>
      .banner{
         background: linear-gradient(90deg, var(--bg-secondary) 0%,var(--bg-third) 100%);
      }
      .banner::before{
         background: url(<?=$curso_banner['curso_banner_imagen']; ?>) center 40%/cover no-repeat;

      }
   </style>

<?php  }?>



<style>
   :root{
      --bg-current:<?php echo $bg_current; ?>; 
      --bg-current-gradient: <?php echo $bg_current.'0a';?>;
   }
   body{
      background-color: <?php echo $bg_current.'0f'; ?>;
   }
   .section{
      border-color:  <?php echo $bg_current.'12'; ?>;
   } 
   .note-icon-image::before, .note-icon-image::after{
      box-shadow: 0 3px 19px <?php echo $bg_current.'1a';?>
   }


</style>

<div class="curso pb-100" >
    <div class="banner " >
        <div class="container relative m-auto py-16   z-10"> 
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 ">
                <div  class="col-span-2" >  
                    <div  class="flex  items-center space-x-2 text-white italic ">
                           <?php   ?>
                           <div><span  class="w-10 h-10 rounded-12 bg-black bg-opacity-30 flex justify-center items-center " ><svg class="w-6 h-6 text-white fill-current" ><use href="<?php echo get_bloginfo('template_directory').'/build/svg/icons.svg#cursos';?>"></svg></span></div>
                           <a class="text-white text-opacity-50 hover:underline" href="<?php  echo $home_url;?>" rel="home">Home</a> <span class="text-white text-opacity-50" >❯</span> 
                           <a class="text-white  hover:underline" href="<?php echo $page_url;?>" ><?php echo ucfirst($page);?></a>
                           <div  class="card-mode-live bg-red" ><svg><use href="<?=$path_icon;?>#live"></svg> <span> En vivo </span> </div>    
                     </div>
                    <h1  class="text-white text-4xl  mt-7 max-w-[568px] " ><?php the_title(); ?> </h1> 
                     <?php 
                     if(have_posts()):  
                              while ( have_posts()): the_post(); ?> 
                              <div class="text-white max-w-lg pt-3" > <?php   the_content();?> </div> 
                           <?php   
                              endwhile; 
                     else : 
                              echo ' '; 
                     endif; 
                     ?>  
                      <div class="data mt-8" >
                        <?php if (get_field('curso_inicio')){ ?>
                           <div class="data-item "> 
                                 <div class="data-item-icon"><svg ><use href="<?=$path_icon;?>#calendar" ></svg> </div>
                                 <div class="ml-3" ><span class=" text-lg tracking-wide font-semibold font-SignikaNegative  " >Inicio de clases</span> 
                                 <span class="font-inter font-normal block " ><?php  the_field('curso_inicio');  ?> </span></div>
                          </div>
                        <?php    }?> 
                        <?php if (get_field('curso_modalidad')){ ?>
                           <div class="data-item "> 
                              <div class="data-item-icon"><svg ><use href="<?=$path_icon;?>#live"></svg></div> 
                              <div class="ml-3" ><span class=" text-lg tracking-wide font-semibold font-SignikaNegative  " >Modalidad</span> 
                              <span class="font-inter font-normal block " >Virtual</span></div>
                           </div>
                        <?php  }else{?>
                           <div class="data-item "> 
                              <div class="data-item-icon"><svg ><use href="<?=$path_icon;?>#location"></svg></div> 
                              <div class="ml-3" ><span class=" text-lg tracking-wide font-semibold font-SignikaNegative  " >Modalidad</span> 
                              <span class="font-inter font-normal block " >Presencial</span></div>
                           </div>
                        <?php  } ?>

                        <?php if (get_field('curso_sesiones')){ ?>
                           <div class="data-item "> 
                              <div  class="data-item-icon" ><svg ><use href="<?php echo get_bloginfo('template_directory').'/build/svg/icons.svg#list';?>"></svg></div> 
                              <div class="ml-3" ><span class=" text-lg tracking-wide font-semibold font-SignikaNegative  " >Sesiones</span> 
                              <span class="font-inter font-normal block " ><?php  the_field('curso_sesiones');  ?></span></div>
                           </div>
                        <?php }?>
                        <?php if (get_field('curso_certificacion')){ ?>
                           <div class="data-item "> 
                              <div  class="data-item-icon" >   <svg ><use href="<?php echo get_bloginfo('template_directory').'/build/svg/icons.svg#diplomas';?>"></svg> </div>  
                              <div class="ml-3" >
                                 <span class=" text-lg tracking-wide font-semibold font-SignikaNegative  " >Certificación</span> 
                                 <span class="font-inter font-normal block " ><?php  the_field('curso_certificacion');  ?></span>
                              </div>
                           </div>
                        <?php }?>
                        
                     </div> 
                </div>
                <div >  
                </div>
            </div>
           
        </div>  
    </div>  
   <div class="container m-auto">
       <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 mt-6 lg:mt-4"> 
           <div class="main lg:col-span-2   "> 
            <!-- Presentación -->
            <?php if (get_field('curso_presentacion')){ ?> 
       
               <section class="section   !p-0  !border-l-4 bg-white mb-4  " style="border-left-color:var(--bg-current)"> 
                  <details open class="section-details">
                     <summary  class="section-details__summary " ><h4>Presentación</h4> </summary>
                     <div  class="section-details-content editor" > 
                        <?php  the_field('curso_presentacion');  ?>
                     </div>
                  </details>
               </section>
            <?php } ?>

            <?php 
             if (get_field('curso_info')){ 
                  if( have_rows('curso_info') ){   ?> 
                           <?php while( have_rows('curso_info') ){
                              the_row();   ?> 
                              <section class="section   !p-0  !border-l-4 bg-white mb-4  " style="border-left-color:var(--bg-current)"> 
                                 <details  class="section-details">
                                    <summary  class="section-details__summary " ><h4><?=get_sub_field('curso_info_titulo');?></h4> </summary>
                                    <div  class="section-details-content editor" > 
                                       <?=get_sub_field('curso_info_descripcion');  ?>
                                    </div>
                                 </details>
                              </section>
                          <?php 
                           }  ?> 
               <?php  }
            
            }  ?> 


            <!-- Tabs -->   
            <style>
               .tabs::before{
                  background-color:<?php echo $bg_current ?>; background:linear-gradient(90deg, <?php echo $bg_current ?> 0%, var(--bg-third) 100%);  
               }
            </style>
            <ul class="tabs " >
               <li class="tabs-item tab " > <a href="#temario"><span>Temario</span></a> </li>
               <li class="tabs-item tab " > <a href="#docentes"><span>Docentes</span></a> </li>
               <li class="tabs-item tab " > <a href="#diasyhorarios"><span>Dias y Horarios</span></a> </li> 
               <li class="tabs-item tab " > <a href="#inversion"><span>Inversión</span></a> </li>
            </ul>

            <!-- Temario -->   
            <?php
               $curso_temario = get_field('curso_temario'); 
               if(  !empty($curso_temario['curso_sesiones_lista'])  ){ ?>  
                    <section class="section">
                        <div   id="temario" class=" temario" > 
                                 <h2>Temario</h2>
                                 <?php 
                                  $curso_brochure =  $curso_temario['curso_brochure'];
                                 if($curso_brochure){  

                                    $curso_brochure_tipo =  $curso_brochure['curso_brochure_tipo']; 
                                    $curso_url = '';

                                    if($curso_brochure_tipo){   
                                          
                                       if($curso_brochure_tipo == 'curso_brochure_tipo_archivo'){ 
                                          $curso_url = $curso_brochure['curso_brochure_archivo']; 
                                       } 
                                       if($curso_brochure_tipo == 'curso_brochure_tipo_url'){  
                                          $curso_url = $curso_brochure['curso_brochure_url']; 
                                       }   
                                       ?>
                                       <?php   if($curso_url){   ?>
                                          <div class="text-center mt-4 "><a  href="<?=$curso_url;?>" target="_blank" class=" btn bg-secondary  items-center  " > <svg class="w-5 h-5 text-white mr-2 fill-current  " ><use href="<?php echo get_bloginfo('template_directory').'/build/svg/icons.svg#download';?>"></svg>  Descargar Temario</a></div>
                                       <?php }  ?>

                                    <?php }   
                                  } ?>
               
                                    <?php  
                                    $curso_sesiones_lista = $curso_temario['curso_sesiones_lista'];
                                    $counter = 1;
                                    if($curso_sesiones_lista){ ?> 
                                       <ul class="collapsible editor">  
                                          <?php   foreach( $curso_sesiones_lista as $curso_sesion ) { ?>	 
                                                   <li class="collapsible-item  <?=$counter==1?'active':''; ?>" >  
                                                         <div class="collapsible-header  ">
                                                            <div class="collapsible-header__counter" ><span ><?=$counter;?></span> </div>
                                                               <div class="collapsible-header__title"><h5>Sesión <?=$counter;?></h5> <h6><?=$curso_sesion['curso_sesiones_lista_titulo'];  ?></h6></div> 
                                                               <div class="collapsible-header__down" > <span  ><svg><use href="<?=$path_icon;?>#down"></svg></span> </div> 
                                                          </div>
                                                          <?php if($curso_sesion['curso_sesiones_lista_descripcion']){?>
                                                            <div class="collapsible-body"><?=$curso_sesion['curso_sesiones_lista_descripcion'];  ?> </div>
                                                          <?php } ?>
                                                        
                                                   </li>
                                    <?php   
                                       $counter++;  
                                     }  ?>
                                     </ul> 
                                
                                   <?php }?>

 
                           </div>  
                        </section>


               <?php } ?> 

               <!-- Certificado -->           

               <?php
               $curso_certificado = get_field('curso_certificado','option');
               if( $curso_certificado ){ ?>  
                  <section class="section editor">
                     <h2 >Certificación</h2> 
                     <?=$curso_certificado;?>
                  </section> 
              <?php }?>  

               <!-- Beneficios -->                      

              <?php 
               $curso_beneficios = get_field('curso_beneficios','option');  
               if( $curso_beneficios){   
                        ?>
                        <section class="section"> 
                           <h2 >Beneficios</h2>  
                           <?php if($curso_beneficios['curso_beneficios_descripcion']){ ?>
                              <div class="editor mt-6" ><?=$curso_beneficios['curso_beneficios_descripcion']; ?></div>
                           <?php } ?> 
                           <?php
                              $curso_beneficios_opciones = $curso_beneficios['curso_beneficios_opciones'];
                              if(!empty( $curso_beneficios_opciones )){ ?>   
                              <ul class="info pt-2"> 
                              <?php  foreach( $curso_beneficios_opciones  as $curso_beneficios_opcion  ) { ?>	  
                                 <li>
                                       <div class="info-icon">
                                          <span  class="card-decorator text-white"> 
                                             <?php if($curso_beneficios_opcion['curso_beneficios_opciones_icono']){?>
                                                <img class="style-svg" src="<?=$curso_beneficios_opcion['curso_beneficios_opciones_icono'];?>" alt="<?=$curso_beneficios_opcion['curso_beneficios_opciones_titulo']; ?>"> 
                                             <?php  }else{?>
                                                ➤
                                             <?php  }?>
                                          </span> 
                                       </div>
                                       <div  class="info-body" >
                                             <?php if($curso_beneficios_opcion['curso_beneficios_opciones_titulo']){?>
                                                <h5><?=$curso_beneficios_opcion['curso_beneficios_opciones_titulo']; ?></h5> 
                                             <?php  }?>
                                             <?php if($curso_beneficios_opcion['curso_beneficios_opciones_descripcion']){?> 
                                                <div><?=$curso_beneficios_opcion['curso_beneficios_opciones_descripcion']; ?></div>  
                                             <?php  }?>
                                       </div>
                                    </li> 
                               <?php    
                                  }  ?>  
                             </ul> 
                           <?php  } ?>    

                           </section>  
               <?php } ?> 
            
               <!-- Docentes -->

               <?php  
               $curso_docentes = get_field('curso_docentes');  
                  if( $curso_docentes){ ?>
                          <section class="section"  id="docentes">
                              <h2 >Plana Docente</h2>   
                              <?php 
                               $curso_docentes_descripcion =  get_field('curso_docentes_descripcion','option');
                               if ($curso_docentes_descripcion) {  
                              ?>
                                 <div class="my-3">
                                    <?=$curso_docentes_descripcion; ?>
                                 </div>
                              <?php  }  ?>
                              
                              <?php  foreach( $curso_docentes as $curso_docente ) { ?>	 
                                      <div class="teacher grid grid-col-1 lg:grid-cols-6 lg:gap-4  mt-5  ">
                                          <div class=" teacher-avatar lg:col-span-1  inline-flex  nowrap items-center justify-center lg:justify-between  ">  
                                             <div class="">
                                                   <div class="text-center text-white   w-full  lg:w-52 px-4 py-6 relative z-[4]  card-decorator  "  style="background:linear-gradient(11deg, var(--bg-third)  0%,<?php echo $bg_current;?>  100%)">
                                                     
                                                      <picture>
                                                         <?php 
                                                         $curso_docentes_foto = get_the_post_thumbnail_url($curso_docente->ID, 'docente-thumbnail');
                                                         if($curso_docentes_foto){ ?>
                                                            <img class="rounded-full bg-gray-50 w-28 h-40 m-auto object-cover object-center border-[6px]  "  style="border-color:<?php echo $bg_current.'d6';?>; " src="<?=$curso_docentes_foto;?>" alt="<?=$curso_docente->post_title?>">
                                                            <?php }else{?>
                                                               <img class="rounded-full bg-gray-50 w-28 h-40 m-auto object-cover object-center border-[6px]  "  style="border-color:<?php echo $bg_current.'d6';?>; " src="<?=get_template_directory_uri()."/build/img/thumbnail-default.png";?>"  >
                                                         <?php }?>
                                                      </picture>   

                                                      <h6 class="mt-3 text-current "> <?=$curso_docente->post_title ?> </h6>
                                                      <?php if($curso_docente->post_excerpt):?>
                                                         <span class=" text-xs pt-2 inline-flex">(<?=$curso_docente->post_excerpt ?>)</span>  
                                                      <?php endif;?>
                                                         
                                                   </div>
                                             </div>
                                          </div> 
                                          <?php if($curso_docente->post_content):?> 
                                             <div class=" teacher-body lg:col-span-5   pt-24 lg:pt-4 pb-4 lg:py-6 pl-4 lg:pl-32 xl:pl-24 pr-4  rounded-card -mt-20 lg:mt-0 border   " style="border-color:<?php echo $bg_current.'12';?>" >
                                                <div class=" text-center md:text-left text-sm py-4 px-6 rounded-card editor h-full "  style="background-color:<?php echo $bg_current.'0a';?>">
                                                      <?=$curso_docente->post_content?> 
                                                </div>
                                             </div>
                                          <?php endif;?> 
                                    </div> 
                        <?php   
                           }  ?>
                           </section>
               <?php }else{ ?> 
                  <section class="section"  id="docentes">
                              <h2 >Docentes</h2>   
                              <p>Según la disponibilidad del docente.</p>
                   </section>

               <?php };  ?> 
 

             <!-- Horario y Frecuencia -->
            <?php if (get_field('curso_frecuencia')){ ?>
               <section class="section" id="diasyhorarios">
                  <h2 >Dias y Horarios que se va a realizar las clases</h2>
                  <ul class="info"> 
                     <li>
                        <div class="info-icon">
                           <span  class="card-decorator"><svg><use href="<?php echo get_bloginfo('template_directory').'/build/svg/icons.svg#calendarandhour';?>"></svg></span> 
                        </div>
                        <div  class="info-body" > 
                              <?php the_field('curso_frecuencia')?>  
                        </div>
                     </li>
                  
                  </ul>
               </section>
            <?php }?>

             <!-- Inversión -->
             <?php if(!empty(get_field('curso_inversion')['curso_inversion_precio_normal'])){ ?>
               <?php 
               $curso_inversion_precio_normal = null;
               $curso_inversion_precio_rebajado = null;
               $curso_inversion_precio_descuento_porcentaje  = null;
               $curso_inversion_precio_promocion = null;
               $valid_promotion = false;
                  if( have_rows('curso_inversion') ): ?>
                  <?php while( have_rows('curso_inversion') ): the_row(); 

                     $curso_inversion_precio_normal = get_sub_field('curso_inversion_precio_normal');
                     $curso_inversion_precio_rebajado = get_sub_field('curso_inversion_precio_rebajado'); 
                     $curso_inversion_precio_promocion = get_sub_field('curso_inversion_precio_promocion'); 
   
                     ?> 


                     <section class="section" id="inversion">
                        <h2 >Inversión</h2>
                        <div class="card-fill md:flex  w-full mt-3   text-white rounded-12  overflow-hidden ">
                              <div class=" card-fill-header flex flex-col items-center justify-center py-12 px-6 w-full md:w-2/5  " style="background-color:<?php echo $bg_current.'eb';?>" >
                                 <h4 class="text-white" >Precio</h4>
                                 <p>El precio ya incluye IGV</p>
                              </div>
                              <div  class="card-fill-body bg-current-single flex flex-col items-center justify-center py-12 px-6 w-full space-y-6  md:w-3/5" >
                                 <div class="investment-price">

                                    <?php 
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
                                             ?> 
                                             <svg  class=" investment-price-discount--icon "><use href="<?=$path_icon;?>#sales"></svg>

                                             <div class="investment-price-info">
                                                <div class="investment-price-normal ">Normal: <span>S/.<?=$curso_inversion_precio_normal; ?></span> </div>
                                                <span class="investment-price-discount !bg-white !text-current-single "><?=$curso_inversion_precio_descuento_porcentaje; ?>% Descuento</span>
                                             </div>
                                             <var class="investment-price-current !text-white !text-[2rem] sm:!text-[3rem] md:!text-[3.75rem] ">S/.<?=$curso_inversion_precio_rebajado; ?></var>

                                    <?php }else{   ?> 
                                                   
                                                   <var class="investment-price-current !text-white !text-[2rem] sm:!text-[3rem] md:!text-[3.75rem] ">S/.<?=$curso_inversion_precio_normal; ?></var>
                                          
                                    <?php }?> 
                                 </div>
                                 <?php  
 
                                    if($curso_inversion_precio_rebajado && $valid_promotion){  
                                       $date_selected_translated= date_i18n("d \d\\e F", strtotime($curso_inversion_precio_promocion));
                                       ?>
                                           <div  class="bg-white rounded-16 py-3 px-4 text-current-single font-semibold investment-price-promotion">Promoción válida hasta el <?=$date_selected_translated ?> </div>  

                                  <?php }  ?>   
                              </div>
                        </div> 
                              
                     </section> 


                  <?php endwhile; ?>
               <?php endif; ?>
               <?php } ?>

             <!-- Propuesta -->                          
               <?php 
             if (get_field('curso_propuesta')){  
                  if( have_rows('curso_propuesta') ){
                     $counter = 1;  
                     $curso_propuesta_color = get_field('curso_propuesta_color','option');
                     ?> 
                    <section class="section">
                        <h2 >Propuestas de Pago </h2>
                        <div  class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-2">
                           <?php while( have_rows('curso_propuesta') ){
                              the_row();   ?> 
                                <div class="note flex justify-center " style="background-color:<?=$curso_propuesta_color['curso_propuesta_color_opcion'.$counter];?>" >
                                    <div class=" note-icon !left-auto " >
                                       <div  class=" note-icon-bg" >
                                          <svg  class="w-full h-full "  fill="<?=$curso_propuesta_color['curso_propuesta_color_opcion'.$counter];?>"><use href="<?php echo get_bloginfo('template_directory').'/build/svg/icons.svg#decorator';?>"></svg>
                                       </div> 
                                       <div class="note-icon-image " >
                                          <span  class="text-current-single  text-lg" ><?=$counter;?></span>
                                       </div>
                                    </div>
                                    <div  class="text-center" > 
                                             <h5 class="py-2 border-b border-solid " style="border-color:<?php echo $bg_current.'0a';?>">  <?=get_sub_field('curso_propuesta_opcion');  ?></h5>
                                             <h4  class="mt-2">  <?=get_sub_field('curso_propuesta_titulo');  ?></h4>
                                             <div class="mt-2 " >
                                             <?=get_sub_field('curso_propuesta_descripcion');  ?>
                                             </div>
                                               
                                    </div>  
                                </div> 
                          <?php 
                          $counter++;
                           }  ?> 
                           </div>
                        </section>
               <?php  }
            
            }  ?> 
            <!-- Pago -->
            <section class="section">
                    <?php  
                      $curso_pagos =  get_field('curso_pagos','option');
                     ?>
                  <h2 >¿Como realizar el Pago?</h2>
                
              
                  <?php if(!empty($curso_pagos['curso_pago_disponible'])){ ?>   
                        <div class=" payment-heading px-10 sm:px-16 py-5 rounded-card text-white  flex space-x-6 items-center bg-current-single mt-8 " >
                           <div><span class="w-[40px] h-[40px] rounded-full border-2 border-white inline-flex items-center justify-center text-xl">1</span></div> <h5 class="text-white" >Realiza Pago por Depósito o Transferencia </h5>
                        </div>

                        <div class="note " style="background-color:<?php echo $bg_current.'0a';?>" >
                           <div class=" note-icon " >
                              <div  class=" note-icon-bg" >
                                  <svg  class="w-full h-full "  fill="<?php echo $bg_current.'0a';?>"><use href="<?php echo get_bloginfo('template_directory').'/build/svg/icons.svg#decorator';?>"></svg>
                              </div> 
                              <div class="note-icon-image " >
                                 <svg  class="w-6 h-6 text-yellow-500 fill-current "  ><use href="<?php echo get_bloginfo('template_directory').'/build/svg/icons.svg#info';?>"></svg>
                              </div>
                           </div>
                           <?php if( $curso_pagos){ ?>
                                 <div >
                                    <?=$curso_pagos['curso_pago_descripcion']?>
                                 </div>
                           <?php } ?>
                         </div>
                        <div class="note " style="background-color:<?php echo $bg_current.'0a';?>" >
                           <div class=" note-icon " >
                              <div  class=" note-icon-bg" >
                                  <svg  class="w-full h-full "  fill="<?php echo $bg_current.'0a';?>"><use href="<?php echo get_bloginfo('template_directory').'/build/svg/icons.svg#decorator';?>"></svg>
                              </div> 
                              <div class="note-icon-image " >
                                 <svg  class="w-6 h-6 text-current-single fill-current "  ><use href="<?php echo get_bloginfo('template_directory').'/build/svg/icons.svg#check';?>"></svg>
                              </div>
                           </div>
                           <div class="md:flex "  >
                              <div class="  md:w-3/5 maxmd:pb-4  "  >
                                    <h4>Deposita</h4>
                                    <div class="mt-2 " ><span class="font-SignikaNegative text-h5 text-dark "  > A nombre de: </span> INSTITUTO DE GERENCIA INTERCONTINENTAL </div>
                                    <div  ><span class="font-SignikaNegative text-h5 text-dark "  > RUC: </span> 20507198555 </div>
                                    
                              </div> 
                           
                              <div  class="  md:w-2/5 flex items-center md:justify-center border-t md:border-l md:border-t-0 pt-4" styles="border-color:var(--bg-current-gradient)" > 
                                 <div class="md:px-4">
                                    <a class="font-SignikaNegative text-h5 text-dark hover:underline _blank " target="_blank" href="https://www.rnp.gob.pe/Constancia/RNP_Constancia/default_Todos.asp?RUC=20507198555"  > RNP Vigente </a> 
                                    <p>Somos una entidad autorizada.</p>
                                 </div>
                                
                              </div> 
                           </div>  
                        </div> 
                        <?php
                           $curso_pago_disponible =  $curso_pagos['curso_pago_disponible'];
                           if($curso_pago_disponible){
                              foreach( $curso_pago_disponible as $curso_pago_disponible_single ) {   ?> 
                                 <div class="payment-bank  " style="border-color:<?php echo $bg_current.'12';?>" >
                                    <div class="payment-bank-logo  md:w-2/5  "  >
                                       <img src="<?=$curso_pago_disponible_single['curso_pago_bancos']['curso_pago_bancos_imagen']['url'];?>" alt="<?=$curso_pago_disponible_single['curso_pago_bancos']['curso_pago_bancos_imagen']['alt'] ?>">
                                    </div> 
                              
                                    <?php  
                                    $curso_pago_bancos_cuentas = $curso_pago_disponible_single['curso_pago_bancos']['curso_pago_bancos_cuentas'];
                                 
                                    if($curso_pago_bancos_cuentas){ ?>  
                                          <div  class="payment-bank-account--wrap md:w-3/5" style="background-color:<?php echo $bg_current.'0a';?>"> 
                                             <div  class="payment-bank-account--content">
                                             <?php  foreach( $curso_pago_bancos_cuentas as $curso_pago_banco_cuenta ) { ?>	  
                                                   <div class="payment-bank-account copy-input "><span class="payment-bank-account__descr" style="border-color:<?php echo $bg_current.'12';?>" ><?=$curso_pago_banco_cuenta['curso_pago_bancos_cuentas_descripcion']; ?></span><span class="payment-bank-account__number copy-text  "><?=$curso_pago_banco_cuenta['curso_pago_bancos_cuentas_numero']; ?> </span> <button><svg><use href="<?php echo get_bloginfo('template_directory').'/build/svg/icons.svg#copy';?>"></svg> </button> </div>

                                                <?php    
                                             }  ?>  
                                          </div>
                                       </div>
                                    <?php }?>
                                 </div>  
                                 <?php    
                              }    
                           }
                           ?>  
                  <?php } ?>  
            </section> 

            <?php
               $curso_comunicate = get_field('curso_comunicate','option');
               if( $curso_comunicate ){ ?>  
                  <section class="section">
                     <h2 >Comunícate con un asesor</h2> 
                     <div class="md:flex  w-full mt-3 bg-white   rounded-card  overflow-hidden  p-2 border  " style="border-color:<?php echo $bg_current.'12';?>" >
                        <div class="   flex flex-col items-center justify-center py-12 px-6 w-full md:w-2/5  "  >
                              <h5><?=$curso_comunicate['curso_comunicate_descripcion'];?></h5>
                        </div>
                        <div  class=" rounded-card   flex items-center justify-center py-12 px-6 w-full  md:w-3/5" style="background-color:<?php echo $bg_current.'0a';?>"> 
                           <div >  
                           <?php  
                                    $curso_comunicate_contactos = $curso_comunicate['curso_comunicate_contactos'];
                                
                                    if($curso_comunicate_contactos){    
                                       foreach( $curso_comunicate_contactos as $curso_comunicate_contacto ) {  
                                          $tag = '';
                                          $tag_close='';
                                          if($curso_comunicate_contacto['curso_comunicate_contactos_enlace_activo']){ 
                                             $tag = '<a href="'.$curso_comunicate_contacto['curso_comunicate_contactos_enlace'].'" target="_blank">  ';
                                             $tag_close = '</a>';
                                           } else{
                                             $tag = '<div>';
                                             $tag_close  = '</div>';
                                          }?> 
                                          <?=$tag;?>
                                                   <address class="contactinfo-data">
                                                      <div>  
                                                            <div  class="contactinfo-icon">
                                                                   <img class="style-svg" src="<?=$curso_comunicate_contacto['curso_comunicate_contactos_icono'] ?>"> 
                                                            </div>  
                                                      </div>
                                                      <div class="contactinfo-content" >  
                                                            <h5 class="contactinfo-content-name"><?=$curso_comunicate_contacto['curso_comunicate_contactos_nombre'] ?></h5> 
                                                            <p class="contactinfo-content-description"><?=$curso_comunicate_contacto['curso_comunicate_contactos_medio'] ?></p> 
                                                      </div> 
                                                   </address>   
                                          <?=$tag_close;?>
                                    <?php    
                                        }   
                                     }?>
                                     
                              </div>
                                 
                              </div>
                           </div>   
                     </section> 
              <?php }?>  
            
           </div>
          <!-- Sidebar -->
          <aside class="aside  col-start-1 lg:col-start-3 row-start-1 lg:row-start-1 xl:pl-[13px] "> 
                  <section  class=" aside-content  card-decorator overflow-hidden bg-white lg:sticky   z-40 w-full max-w-[421px] mx-auto   lg:top-[88px]" > 
                  <div class="rounded-card overflow-hidden p-[2px] " style="background-color:<?php echo $bg_current.'0a';?>" >
                        <?php 
                                 
                        $thumbnail = thumbnail_image_url('programa-thumbnail');  
                        if ($thumbnail) { 
                           $thumbnail =  $thumbnail;
                        } else {
                           $thumbnail = get_template_directory_uri().'/build/img/programa-thumbnail-default.png';
                              
                        }    
                        ?>
                         <div id="single-thumbnail"> 
                              <img class="rounded-card w-full max-w-[416px] " src="<?=$thumbnail; ?>"  alt="<?php the_title(); ?>">
                        </div>
                        <?php if(!empty(get_field('curso_inversion')['curso_inversion_precio_normal'])){ ?>
                              <div  class="flex justify-center py-2 px-2 "  >
                                 <div class="investment-price"> 
                                          <?php if ($curso_inversion_precio_rebajado && $valid_promotion || (empty($curso_inversion_precio_promocion) && !empty($curso_inversion_precio_rebajado ) )){?>
                                             <div class="investment-price-info">
                                                <div class="investment-price-normal  !text-current-single ">Normal: <span>S/.<?=$curso_inversion_precio_normal; ?></span> </div>
                                                <span class="investment-price-discount !bg-current-single  text-white "><?=$curso_inversion_precio_descuento_porcentaje; ?>% Descuento</span>
                                             </div>
                                             <var class="investment-price-current  !text-[2rem] sm:!text-[3rem] md:!text-[3.75rem] !text-current-single ">S/.<?=$curso_inversion_precio_rebajado; ?></var>
                                          <?php }else{?>
                                             <var class="investment-price-current  !text-[2rem] sm:!text-[3rem] md:!text-[3.75rem]  !text-current-single ">S/.<?=$curso_inversion_precio_normal; ?></var>
                                          <?php }?>
                                    
                                       
                                 </div>
                              </div>
                           <?php }?>
                     </div> 
                     <!-- Precio --> 
                     <div  class="px-4 sm:px-6">
                        <?php dynamic_sidebar('curso-form');?>   
                     </div>  
                    
                  </section>
            </aside>
       </div>
   </div>  
    
 </div>

<?php get_footer(); ?> 
