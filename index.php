<?php /* Template Name: Blog
         Template Post Type: post, page, event 
*/ ?>

<?php get_header(); ?>
<div class="blog s-pt-4 m-pt-4  l-pt-4 xl-pt-4" > 
    <div class="ed-container">
        <div class="ed-item">
            <div class="blog-categories">
                <?php  if( have_posts()):
                while( have_posts()): 
                    the_post(); ?>  
                        <?php if(in_category("los-cursos")){  
                            if(is_category("los-cursos")){ ?>  
                                <a class="blog__icon"  style=" background: var(--bg-courses);" href="https://igc.edu.pe/blog" ><svg class=""> <use href="<?php echo get_bloginfo('template_directory').'/assets/img/icons.svg#back'; ?>"></svg></a> 
                            <?php } ?>
                            <span class="blog__category" style=" background: var(--bg-courses);"> <?php the_category(" ");?></span> 
                        <?php } elseif(in_category("diplomas")){ 
                             if(is_category("diplomas")){ ?>  
                                <a class="blog__icon" style="background: var(--bg-diplomas);" href="https://igc.edu.pe/blog" ><svg class=""> <use href="<?php echo get_bloginfo('template_directory').'/assets/img/icons.svg#back'; ?>"></svg></a> 
                            <?php } ?>
                            <span class="blog__category" style="background: var(--bg-diplomas);"> <?php the_category(" ");?></span> 
                        <?php } elseif(in_category("los-congresos")){
                             if(is_category("los-congresos")){ ?>  
                                <a class="blog__icon" style="background: var(--bg-congresses);" href="https://igc.edu.pe/blog" ><svg class=""> <use href="<?php echo get_bloginfo('template_directory').'/assets/img/icons.svg#back'; ?>"></svg></a> 
                            <?php } ?>
                            <span class="blog__category" style="background: var(--bg-congresses);"> <?php the_category(" ");?></span> 
                        <?php } elseif(in_category("in-house")){
                             if(is_category("in-house")){ ?>  
                                <a class="blog__icon" style="background: var(--bg-inhouse);" href="https://igc.edu.pe/blog" ><svg class=""> <use href="<?php echo get_bloginfo('template_directory').'/assets/img/icons.svg#back'; ?>"></svg></a> 
                            <?php } ?>
                            <span class="blog__category" style="background: var(--bg-inhouse);"> <?php the_category(" ");?></span> 
                         <?php }?>  
                <?php endwhile;
                else:
                    printf('<p>No hay entradas</p>');
                endif;
                rewind_posts();  ?> 
            </div>
        </div>
    </div>
    <div class="ed-container" >  
        <div class="ed-item s-100 m-70 lg-70 m-l-r-0 " >
            <div class="post-container">
            <?php  
                if( have_posts()):
                    while( have_posts()): 
                      the_post(); 
                    ?>
                <div class="post-wrap ">
                    <?php if(in_category("los-cursos")){?>
                        <span class="post__category" style=" background: var(--bg-courses); opacity:.8;"> <?php the_category(" ");?></span> 
                    <?php } elseif(in_category("diplomas")){?>
                        <span class="post__category" style="background: var(--bg-diplomas); opacity:.8;"> <?php the_category(" ");?></span> 
                    <?php } elseif(in_category("los-congresos")){?>
                        <span class="post__category" style="background: var(--bg-congresses); opacity:.8;"> <?php the_category(" ");?></span> 
                    <?php } elseif(in_category("in-house")){?>
                        <span class="post__category" style="background: var(--bg-inhouse); opacity:.8;"> <?php the_category(" ");?></span> 
                    <?php }?>     
                        
                    <a class="post__link " href="<?php echo get_the_permalink();?>">
                        <article class="post ed-grid s-grid-1 m-grid-2 lg-grid-3 xl-grid-4  gap-0"> 
                            <figure class="post-figure lg-cols-1">
                                <img src="<?php echo main_image_url(" full ");?>" alt="<?php the_title(); ?>">  
                                <div class="post-figure__overlay" >
                                <?php if ( has_post_format( 'video' ) ) {?> 
                                    <svg class="">
                                        <use href="<?php echo get_bloginfo('template_directory').'/assets/img/icons.svg#play'; ?>">
                                    </svg> 
                                <?php } elseif( has_post_format( 'image' ) ) {?>
                                    <svg class="">
                                        <use href="<?php echo get_bloginfo('template_directory').'/assets/img/icons.svg#gallery'; ?>">
                                    </svg>
                               <?php }else{?>
                                    <svg class="">
                                        <use href="<?php echo get_bloginfo('template_directory').'/assets/img/icons.svg#file'; ?>">
                                    </svg>
                              <?php }   ?>
                               </div> 
                            </figure>
                            <div class="post-info lg-cols-2">
                                <h1 class="post-info__title">
                                    <?php the_title(); ?>
                                </h1>
                                <div class="post-info__excerpt">
                                    <?php  the_excerpt(); ?>
                                </div> 
                               
                           <!-- <div class="post__category"><?php // the_category(" ");  ?></div> -->
                            
                                <div class="post-info__body">
                                  <!--   <p class="post-info___hours">
                                       <svg class="svg__hours">
                                            <use href="<?php //echo get_bloginfo('template_directory').'/assets/img/hours.svg#hours'; ?>">
                                        </svg> 
                                    </p>-->
                                    <p class="post-info__date">
                                       <!--  <svg class="svg__date">
                                            <use href="<?php // echo get_bloginfo('template_directory').'/assets/img/date.svg#date'; ?>">
                                        </svg> -->
                                        <?php the_date(); ?>
                                    </p>
                                    <p class="post-info__author">
                                       <!--  <svg class="svg__date">
                                            <use href="<?php // echo get_bloginfo('template_directory').'/assets/img/date.svg#date'; ?>">
                                        </svg> -->
                                        Redacción <span><?php the_author(); ?></span>
                                    </p> 
                                   
                                </div>
                            </div>
                        </article>
                    </a> 
                </div> 
                <?php endwhile;
                    else:
                        printf('<p>No hay entradas</p>');
                    endif;
                    rewind_posts();  ?>
            </div>   
        </div>
        <div class="ed-item s-100 m-30 lg-30 " > 
            <?php //get_template_part('./page-blog-widget') ?>  
            <?php dynamic_sidebar('blog_sidebar');?> 
         </div>
    </div>
</div> 
 
<?php get_footer(); ?>