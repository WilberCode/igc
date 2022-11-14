<?php

get_header(); ?> 
  <main class="main   pt-12 pb-[60px] sm:pb-[100px]  " > 
 
     <div class="container" >   
        
        <h1  class=" text-center mb-8" ><?php single_post_title(); ?></h1>    
 
        <?php  
              //query subpages
              $args = array(
              'post_type' =>'post' ,
              'orderby' => 'date',
              'order' => 'desc',
              'posts_per_page' => -1,
              );
              
              $listing = new WP_query($args); 
              // create output
              $portada_html ='';
              $tres_post_html ='';
              $posts_restantes_html ='';
              $counter=1;
              if ($listing->have_posts()) : 
                while ($listing->have_posts()) : $listing->the_post(); 
                  
                    
                    $blog_thumbnail = thumbnail_image_url('blog-thumbnail');   
                    $programa_thumbnail = thumbnail_image_url('programa-thumbnail');  
                    if (  $blog_thumbnail ||  $programa_thumbnail) { 
                     $blog_thumbnail =  $blog_thumbnail;
                     $programa_thumbnail =  $programa_thumbnail;
                    } else {
                     $blog_thumbnail = get_template_directory_uri().'/build/img/programa-thumbnail-default.png';
                     $programa_thumbnail = get_template_directory_uri().'/build/img/programa-thumbnail-default.png';
                        
                    }    

                    $the_link = get_the_permalink();
                    $the_title = get_the_title();
                    $the_excerpt = get_the_excerpt();
                    $author_avatar_url = get_avatar_url(get_the_author_meta('ID')); 
                    $author_first_name = get_the_author_meta('first_name'); 
                    $time_ago = human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' atrás';
                    $time_icon = get_bloginfo("template_directory").'/build/svg/icons.svg';
                   
                  if ($counter == 1) {
                     $portada_html .= '<a href="'.$the_link.'" class="blog-card " > 
                                     <article  class="card-decorator overflow-hidden" > 
                                      <figure>
                                          <img  class="max-h-[428px] w-full object-cover object-center" src="'.$blog_thumbnail.'" alt="'.$the_title.'"> 
                                      </figure>  
                                      <div  class="px-6 py-4" >
                                          <h2>'. $the_title.'</h2> 
                                          <div>'.$the_excerpt.'</div>
                                      </div>
                                      <div  class="px-6 py-4 flex justify-between gap-2  items-center flex-wrap "> 
                                         <div class="inline-flex   items-center gap-2" >
                                             <img class="w-10 h-10  rounded-full " src=" '.$author_avatar_url.' " alt="">   
                                             <span>'.$author_first_name.'</span>
                                         </div>
                                         <div>
                                             <time  class="inline-flex   items-center gap-2" > <svg  class="w-7 h-7 text-gray-400 fill-current " ><use href="'.$time_icon.'#calendar"></svg>'.$time_ago.'</time>
                                         </div>
                                      </div> 
                                   </article>
                                 </a> ';
                  } 
                  elseif($counter > 1 && $counter <= 4){
                     $tres_post_html .= ' <a href="'.$the_link.'"  class="blog-card  maxlg:max-w-[421px] mx-auto" > 
                                            <article  class="card-decorator flex flex-col lg:flex-row  overflow-hidden h-full   lg:rounded-16 " > 
                                                    <figure  class="lg:w-5/12" >
                                                        <img class="h-full w-full object-cover object-center "  src="'.$programa_thumbnail.'" alt="'.$the_title.'"> 
                                                    </figure>  
                                                    <div  class="lg:w-7/12 flex flex-col px-6 py-4 gap-2 h-full  ">
                                                       <div  class=" " >
                                                            <h2  class="text-h5">'. $the_title.'</h2> 
                                                            <div class="hidden" >'.$the_excerpt.'</div>
                                                        </div>
                                                        <div  class="flex flex-col justify-between gap-2    mt-auto "> 
                                                            <div class="inline-flex   items-center gap-2" >
                                                                <img class="w-10 h-10  rounded-full " src=" '.$author_avatar_url.' " alt="">   
                                                                <span>'.$author_first_name.'</span>
                                                            </div>
                                                            <div>
                                                                <time  class="inline-flex   items-center gap-2" > <svg  class="w-7 h-7 text-gray-400 fill-current " ><use href="'.$time_icon.'#calendar"></svg>'.$time_ago.'</time>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </article>
                                        </a>';
                  }else{
                     $posts_restantes_html .= '<a href="'.$the_link.'"  class="blog-card  w-full max-w-[421px] mx-auto" > 
                                                <article  class="card-decorator overflow-hidden h-full flex flex-col " > 
                                                    <figure >
                                                        <img  class="max-h-[280px] w-full object-cover object-center"  src="'.$programa_thumbnail.'" alt="'.$the_title.'"> 
                                                    </figure>  
                                                    <div  class="  flex flex-col px-6 py-4 gap-4  h-full  ">
                                                       <div  class=" " >
                                                            <h2  class="text-h5">'. $the_title.'</h2> 
                                                            <div class="hidden" >'.$the_excerpt.'</div>
                                                        </div>
                                                        <div  class="flex flex-col justify-between gap-2    mt-auto "> 
                                                            <div class="inline-flex   items-center gap-2" >
                                                                <img class="w-10 h-10  rounded-full " src=" '.$author_avatar_url.' " alt="">   
                                                                <span>'.$author_first_name.'</span>
                                                            </div>
                                                            <div>
                                                                <time  class="inline-flex   items-center gap-2" > <svg  class="w-7 h-7 text-gray-400 fill-current " ><use href="'.$time_icon.'#calendar"></svg>'.$time_ago.'</time>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </article>
                                                </a> ';
                  }
                   
                    $counter++;
                    ?>     
              <?php	endwhile;
              endif; 
              // reset the query
              wp_reset_postdata();
            ?>
                  
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-[40px] " > 
               <div  class="max-w-[661px] mx-auto" ><?=$portada_html; ?></div>
               <div  class=" grid grid-cols-1 sm:grid-cols-2  lg:grid-cols-1 gap-[40px]   " ><?=$tres_post_html; ?></div>
            </div>
            <h3  class="mt-16 pb-4 maxlg:text-center" >Más Articulos</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-[40px] mt-4">
               <?=$posts_restantes_html; ?> 
            </div>
        </div> 
  </main> 
 
 
<?php

get_footer();
