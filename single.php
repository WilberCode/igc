<?php 
 get_header();

 $home_url = home_url();  
?> 
<div  class="py-12 mt-4 sm:mt-8" >
   <div class="container">
      <div  class=" flex flex-col md:flex-row gap-10  " > 
         <main class="w-full   mb-10 max-w-[958.11px] mx-auto    " > 
               <div  class="flex  items-center space-x-2 italic ">
                  <?php   ?>
                  <div><span  class="w-10 h-10 rounded-12 bg-secondary-500  flex justify-center items-center " ><svg class="w-6 h-6 text-white  fill-current" ><use href="<?php echo get_bloginfo('template_directory').'/build/svg/icons.svg#blog';?>"></svg></span></div>
                  <a class=" hover:underline" href="<?=$home_url; ?>" rel="home">Home</a> <span class="" >❯</span> 
                  <a class=" hover:underline" href="<?=$home_url?>/blog" >Blog</a>  
            </div>
               <h1  class="lg:text-[49.31px]  leading-tight  pt-3 pb-6  " > <?php the_title();?>  </h1>
              <div class="blog-post" > 
                 
                  <?php
                     if ( have_posts() ) :

                        // Start the Loop.
                        while ( have_posts() ) :
                           the_post(); 
                           $the_content = apply_filters('the_content', get_the_content());
                           if ( !empty($the_content) ) {
                              echo $the_content;
                           }else{
                              echo "No hay contenido 😔 ";
                           }
                           ?>
                           
                        <?php
                        endwhile;   
                     else : 
                        echo "sin Contenido";
                     endif; 
                     ?>  
                  </div> 
                  <hr class="mt-10">
                  <div class="mt-8 mb-8  "> 
                     <h2  class="text-[24px] maxlg:max-w-[440px] mx-auto" >Más publicaciones</h2> 
                     <div class="mt-6 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1  lg:grid-cols-2 xl:grid-cols-3  gap-4 maxmd:hidden" > 

                        <?php 
                           $args = array( 
                           'post_type' =>get_post_type( get_the_ID()),  
                           'orderby' => 'comment_count',
                           'order' => 'desc',
                           'post__not_in' => array(get_the_ID()),
                           'posts_per_page' => 3,
                           'offset' => 1
                           );


                           $listing = new WP_query($args); 
                           // create output
                           if ($listing->have_posts()) : 
                              while ($listing->have_posts()) : $listing->the_post();
                  
                                          $thumbnail = thumbnail_image_url('programa-thumbnail');  
                                          if ($thumbnail) { 
                                             $thumbnail =  $thumbnail;
                                          } else {
                                          $thumbnail = get_template_directory_uri().'/build/img/programa-thumbnail-default.png';
                                             
                                          }    


                                             $time_icon = get_bloginfo("template_directory").'/build/svg/icons.svg';
                                             ?> 
                                                   
                                                
                                                <a href="<?=get_permalink()?>"  class="blog-card max-w-[440px] mx-auto" > 
                                                      <article  class="card-decorator flex  flex-col   overflow-hidden h-full  w-full  lg:rounded-16 " > 
                                                            <figure  class=" " >
                                                               <img class="h-full w-full object-cover object-center "  src=" <?=$thumbnail;?> " alt="<?=get_the_title();?>"> 
                                                            </figure>  
                                                            <div  class=" flex flex-col px-6 py-4 gap-2 h-full  ">
                                                               <div  class=" " >
                                                                     <h2  class="text-h5"> <?=get_the_title()?></h2>  
                                                               </div>
                                                               <div  class="flex flex-col justify-between gap-2    mt-auto "> 
                                                                     <div class="inline-flex   items-center gap-2" >
                                                                        <img class="w-10 h-10  rounded-full " src="<?=get_avatar_url(get_the_author_meta('ID'))?> " alt="<?=get_the_author_meta('first_name'); ?>">   
                                                                        <span><?=get_the_author_meta('first_name'); ?></span>
                                                                     </div>
                                                                     <div>
                                                                        <time  class="inline-flex   items-center gap-2" > <svg  class="w-7 h-7 text-gray-400 fill-current " ><use href="<?= $time_icon;?>#calendar"></svg><?=human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' atrás'; ?></time>
                                                                     </div>
                                                               </div> 
                                                            </div>
                                                         </article>
                                                </a>
                           <?php	endwhile;
                           else: ?>
                                 <p  class="mt-2" >Por ahora no tenemos más publicaciones.</p>
                           <?php  endif; 
                           // reset the query
                           wp_reset_postdata();
                        ?>
            
                     </div>
                     <div class="mt-6 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1  lg:grid-cols-2 xl:grid-cols-3  gap-4 md:hidden" > 

                        <?php 
                           $args = array( 
                           'post_type' =>get_post_type( get_the_ID()),  
                           'orderby' => 'comment_count',
                           'order' => 'desc',
                           'post__not_in' => array(get_the_ID()),
                           'posts_per_page' => 4, 
                           );


                           $listing = new WP_query($args); 
                           // create output
                           if ($listing->have_posts()) : 
                              while ($listing->have_posts()) : $listing->the_post();

                                          $thumbnail = thumbnail_image_url('programa-thumbnail');  
                                          if ($thumbnail) { 
                                             $thumbnail =  $thumbnail;
                                          } else {
                                          $thumbnail = get_template_directory_uri().'/build/img/programa-thumbnail-default.png';
                                             
                                          }    


                                             $time_icon = get_bloginfo("template_directory").'/build/svg/icons.svg';
                                             ?> 
                                                   
                                                
                                                <a href="<?=get_permalink()?>"  class="blog-card max-w-[440px] mx-auto" > 
                                                      <article  class="card-decorator flex  flex-col   overflow-hidden h-full  w-full  lg:rounded-16 " > 
                                                            <figure  class=" " >
                                                               <img class="h-full w-full object-cover object-center "  src=" <?=$thumbnail;?> " alt="<?=get_the_title();?>"> 
                                                            </figure>  
                                                            <div  class=" flex flex-col px-6 py-4 gap-2 h-full  ">
                                                               <div  class=" " >
                                                                     <h2  class="text-h6"> <?=get_the_title()?></h2>  
                                                               </div>
                                                               <div  class="flex flex-col justify-between gap-2    mt-auto "> 
                                                                     <div class="inline-flex   items-center gap-2" >
                                                                        <img class="w-10 h-10  rounded-full " src="<?=get_avatar_url(get_the_author_meta('ID'))?> " alt="<?=get_the_author_meta('first_name'); ?>">   
                                                                        <span><?=get_the_author_meta('first_name'); ?></span>
                                                                     </div>
                                                                     <div>
                                                                        <time  class="inline-flex   items-center gap-2" > <svg  class="w-7 h-7 text-gray-400 fill-current " ><use href="<?= $time_icon;?>#calendar"></svg><?=human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' atrás'; ?></time>
                                                                     </div>
                                                               </div> 
                                                            </div>
                                                         </article>
                                                </a>
                           <?php	endwhile;
                           else: ?>
                                 <p  class="mt-2" >Por ahora no tenemos más publicaciones.</p>
                           <?php  endif; 
                           // reset the query
                           wp_reset_postdata();
                        ?>

                        </div>
                  </div>    
                  
            </main> 
            <aside class="mx-auto lg:w-full max-w-[440px] md:max-w-none lg:max-w-[440px] blog-sidebar   "> 
               <div class="mb-8  maxmd:hidden  "> 
                  <h2  class="text-[24px]" >Los más recientes</h2> 
                  <div class="mt-6" >
                     <?php 
                        $args = array( 
                        'post_type' =>get_post_type( get_the_ID()),  
                        'orderby' => 'comment_count',
                        'order' => 'desc',
                        'post__not_in' => array(get_the_ID()),
                        'posts_per_page' => 1
                        );


                        $listing = new WP_query($args); 
                        // create output
                        if ($listing->have_posts()) : 
                           while ($listing->have_posts()) : $listing->the_post();
               
                                       $thumbnail = thumbnail_image_url('programa-thumbnail');  
                                       if ($thumbnail) { 
                                          $thumbnail =  $thumbnail;
                                       } else {
                                       $thumbnail = get_template_directory_uri().'/build/img/programa-thumbnail-default.png';
                                          
                                       }    


                                          $time_icon = get_bloginfo("template_directory").'/build/svg/icons.svg';
                                          ?> 
                                                
                                             
                                             <a href="<?=get_permalink()?>"  class="blog-card" > 
                                                   <article  class="card-decorator flex  flex-col   overflow-hidden h-full  w-full  lg:rounded-16 " > 
                                                         <figure  class=" " >
                                                            <img class="h-full w-full object-cover object-center "  src=" <?=$thumbnail;?> " alt="<?=get_the_title();?>"> 
                                                         </figure>  
                                                         <div  class=" flex flex-col px-6 py-4 gap-2 h-full  ">
                                                            <div  class=" " >
                                                                  <h2  class="text-h5"> <?=get_the_title()?></h2>  
                                                            </div>
                                                            <div  class="flex flex-col justify-between gap-2    mt-auto "> 
                                                                  <div class="inline-flex   items-center gap-2" >
                                                                     <img class="w-10 h-10  rounded-full " src="<?=get_avatar_url(get_the_author_meta('ID'))?> " alt="<?=get_the_author_meta('first_name'); ?>">   
                                                                     <span><?=get_the_author_meta('first_name'); ?></span>
                                                                  </div>
                                                                  <div>
                                                                     <time  class="inline-flex   items-center gap-2" > <svg  class="w-7 h-7 text-gray-400 fill-current " ><use href="<?= $time_icon;?>#calendar"></svg><?=human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' atrás'; ?></time>
                                                                  </div>
                                                            </div> 
                                                         </div>
                                                      </article>
                                             </a>
                        <?php	endwhile;
                        else: ?>
                              <p  class="mt-2" >Por ahora no tenemos más publicaciones.</p>
                        <?php  endif; 
                        // reset the query
                        wp_reset_postdata();
                     ?>
            
                     </div>
                  </div>   
                  <div class="pt-6">
                     <?php dynamic_sidebar('blog-sidebar');?> 
                  </div> 
            </aside>  
      </div>
   

   </div>
 
</div>

<?php
  
get_footer();
