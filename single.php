<?php
get_header();
?> 
<?php // get_template_part('template-part/post/single-course'); 
?>
<div class="single">
   <?php $color = ""; ?>
      <?php if(in_category("los-cursos")){  
          $color = "background: var(--bg-courses);";
       } elseif(in_category("diplomas")){  
          $color = "background: var(--bg-diplomas);";
       } elseif(in_category("los-congresos")){  
          $color = "background: var(--bg-congresses);"; 
       } elseif(in_category("in-house")){  
          $color = "background: var(--bg-inhouse); ";
      }else{
         $color = "background: var(--first-color-medium);";
      }?>
   <style>
      .single-figure{
         background: linear-gradient(rgba(0,0,0, 0.25), rgba(0,0, 0, 0.70)), url(<?php echo main_image_url('full'); ?>) center 40%/cover no-repeat;
      } 
   </style>
   <figure class="single-figure">  
      <div class="single-figure__wrap">
         <div class="single-figure__content">
          <span class="blog__category" style="<?php echo $color ?>"> <?php the_category(" ");?></span> 
            <h1 class="single-figure__title"><?php the_title(); ?></h1>
            <div class="single-figure__info">
               <?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
               <span><?php the_author(); ?></span>
               
               <time> <svg ><use href="<?php echo get_bloginfo('template_directory').'/assets/img/icons.svg#date'; ?>"></svg> <?php the_date(); ?></time>
               <time> <svg ><use href="<?php echo get_bloginfo('template_directory').'/assets/img/icons.svg#hour'; ?>"></svg> <?php echo get_time_ago(); ?></time>
                
            </div>  
            
         </div>
      </div>
      <!-- <img  src="<?php //echo get_bloginfo('template_directory').'/assets/svg/figure-circle.svg'; ?>"> -->
   </figure>  
   
   <div class="ed-container">  
      <div class="ed-item">  
         <div class="single-show">
            <div class="single-show__content content-editor">
               <?php the_content();?> 
            </div>
            <br>
            <?php 
            
               if ( comments_open() || get_comments_number() ) {
                  comments_template();
               }
            ?>  
         </div> 
      </div>
   </div> 
</div>
<?php  
get_footer();