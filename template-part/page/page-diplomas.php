<?php 
/*
Template Name: Diplomados
Template Post Type: post, page, event
*/  ?>  
 
    <div class="page">
        <div class="page-container">
            <?php the_content();?>
            <!--<div class="page-banner" > 
                <div class="ed-container">
                    <div class="ed-item l-100">
                        <div class="single-banner__reference"><a href="<?php echo get_home_url(); ?>">Pagina incio</a><?php the_category(); ?> <i class="fas fa-chevron-right"></i> <span><?php the_title(); ?></span> </div>

                        <h1>Todos los Diplomados</h1>
                        <svg class="svg__book"><use href="<?php echo get_bloginfo('template_directory').'/assets/img/icons.svg#diplomas'; ?>"></svg>

                        <p>Este programa está  por cursos y talleres orientados al perfeccionamiento de los servidores del Estado y la actividad empresarial, graduados en disciplinas diversas, destinados a brindar una capacitación o profundización de conocimientos en las áreas de la Gestión  Pública y  Empresarial. El Diplomado de especialización entrega a sus egresados una actualización profesional y un complemento a su formación en aspectos específicos de modo que sean capaces de continuar con un trabajo profesional autónomo en el área o completar otros estudios académicos de post-grado. Se ofrecen en la modalidad presencial y virtual.</p>
            
                    </div>
                </div>
            </div> -->
            <div class="ed-container">
                    <div class="ed-item p-m-rl-5">
                    <h2 class="courses__title s-center">Diplomados de Gestion Pública</h2>   
                    <div class="card-container ed-grid s-grid-1 m-grid-2 lg-grid-3 xl-grid-3 rows-gap gap-2"> 
                <?php  
            // args
            $args = array(
                'numberposts'	=> -1,
                'posts_per_page'   => -1,
                'post_type'		=> 'Diplomado'
            ); 
            // query
            $the_query = new WP_Query( $args );  
            if( $the_query->have_posts() ): 
                while( $the_query->have_posts() ) :$the_query->the_post(); ?> 
                    <div class="card-wrap   ">
                        <a class="card__link" href="<?php if(has_tag( array( 'no-link', 'no'))){ echo "#no-link"; }else{the_permalink();}; ?>" >
                            <article class="card" data-aos="zoom-in-up" >
                                <figure class="card-figure  " >
                                    <?php $diploma_imagen = get_field( 'diploma_imagen' ); ?>
                                    <?php if ( $diploma_imagen ) { ?>
                                        <img src="<?php echo $diploma_imagen['url']; ?>" alt="<?php echo $diploma_imagen['alt']; ?>" />
                                    <?php } ?>
                                </figure>  
                                <div class="card-info"> 
                                    <p class="card-info__icon  card-info__icon-subject ">  
                                        <svg class="svg__hours"><use href="<?php echo get_bloginfo('template_directory').'/assets/img/icons.svg#diplomas'; ?>"></svg> 
                                        Diploma
                                    </p>
                                <h1 class="card-info__title"> 
                                    <?php the_field('diploma_titulo'); ?> 
                                </h1>   
                                <div class="card-info__body"> 
                                    <p class="card-info__icon">   
                                        <svg class="svg__date"><use href="<?php echo get_bloginfo('template_directory').'/assets/img/icons.svg#date'; ?>"></svg>
                                        <b>INICIO: </b>  <?php the_field( 'diploma_horas' ); ?> 
                                    </p>
                                    <p class="card-info__icon">  
                                        <svg class="svg__hours"><use href="<?php echo get_bloginfo('template_directory').'/assets/img/icons.svg#diplomas'; ?>"></svg> 
                    <b>CERTIFICACIÓN: </b> <?php the_field( 'diploma_horas' );?>  
                                    </p>
                                    <div class="card-info-certifies">
                                        <?php
                                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                                        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );?>  
                                        <img src="<?php echo esc_url( $logo[0]);?>" alt="<?php bloginfo('name'); ?>">
                                    </div>
                                </div>
                                <div class="card-info-footer">
                                    <div>
                                        <button class="card-info__link ">Ver Diploma</button> 
                                    </div>
                                    <div>
                                    <p class="card-info__price "> 
                                        <?php the_field( 'diploma_precio' ); ?> 
                                    </p> 
                                    </div>
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
        </div> 
    </div>
         