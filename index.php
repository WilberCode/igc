<?php
get_header(); ?> 
<main class="" >   
   <div class="container">  
         <?php the_title(); ?>
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
          else: 
              echo "sin Contenido";
          endif; 
          ?>   
   </div>
</main>  
<?php

get_footer();
