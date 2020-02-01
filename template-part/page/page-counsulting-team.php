<?php /* Template Name: Equipo de consultores
         Template Post Type: post, page, event 
*/ ?>
 
<div class="page">
    <div class="page-container">
        <div class="page-banner" > 
            <div class="ed-container">
                <div class="ed-item l-100">
                    <div class="single-banner__reference"><a href="<?php echo get_home_url(); ?>">Pagina incio</a><?php the_category(); ?> <i class="fas fa-chevron-right"></i> <span><?php the_title(); ?></span> </div>

                    <h1>EQUIPO DE CONSUTORES</h1>
                    <svg class="svg__book"><use href="<?php echo get_bloginfo('template_directory').'/assets/img/icons.svg#consulting'; ?>"></svg>

                    <p>El equipo de consultores y docentes está conformado por destacados especialistas de amplia trayectoria nacional e internacional, funcionarios, directivos y ex funcionarios de entidades representativas del país.</p>
                </div>  
            </div>  
        </div>  
        <?php  
        // args
        $args = array(
            'numberposts'	=> -1,
            'post_type'		=> 'Expositores'
        );   
        $avatar = 0;  
        $the_query = new WP_Query( $args );  ?>
        <div class="profile ed-container"> 
            <div class="col ed-item s-50 l-50">
                <ul class="profile-tabs tabs tabs-fixed-width tab-demo z-depth-1">
                    <?php if( $the_query->have_posts() ): 
                        while( $the_query->have_posts() ) :$the_query->the_post(); ?>    
                                    
                                        <li class="profile-tab tab "><a   href="#avatar<?php echo $avatar;?>"> <img src="<?php echo main_image_url('full'); ?>" alt="<?php  the_title(); ?>"> <?php  the_title(); ?></a></li> 
                                    <?php 
                                    $avatar++;    
                                endwhile;
                            else:
                                printf('<p>No hay entradas</p>');
                        endif;
                        rewind_posts();  
                    ?>
                </ul> 
            </div>
            <div class="col  ed-item s-50 l-50">
                <?php
                $content = 0; 
                if( $the_query->have_posts() ): 
                    while( $the_query->have_posts() ) :$the_query->the_post(); ?>     
                        <div id="avatar<?php echo $content;?>" class="profile-content">
                            <img src="<?php echo main_image_url('full'); ?>" alt="<?php  the_title(); ?>"> 
                            <h1><?php  the_title(); ?> </h1>
                            <?php  the_content(); ?> 
                        </div> 
                            <?php 
                            $content++;    
                    endwhile;
                else:
                        printf('<p>No hay entradas</p>');
                endif;
                rewind_posts();  
                ?>  
            </div>
        </div>        
    </div>
</div>   
