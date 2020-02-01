<div id="courses" class="courses">  
            <?php
              dynamic_sidebar('bannerfront-image');
        ?>   
        <h1 class="courses__title "> <span class="new">Nuevo</span> Cursos Presenciales</h1>  
        <div class="card-container ed-grid  s-grid-1 m-grid-2 lg-grid-2 xl-grid-2  rows-gap  gap-2 "> 
            <?php
                    // args
                    $args = array(
                        'numberposts'	=> -1,
                        'posts_per_page'   => 6,
                        'post_type'		=> 'Cursos'
                    ); 
                    // query
                    $the_query = new WP_Query( $args );  
                    if( $the_query->have_posts() ): 
                        while( $the_query->have_posts() ) :$the_query->the_post(); ?> 
                            <div class="  card-wrap">
                                <a class="card__link" href="<?php echo get_the_permalink();?>" >
                                    <article class="card" data-aos="zoom-in-up"  data-aos-once="true">
                                        <figure class="card-figure">
                                            <?php $curso_image = get_field( 'curso_imagen' ); ?>
                                            <?php if ( $curso_image ) { ?>
                                                <img src="<?php echo $curso_image['url']; ?>" alt="<?php echo $curso_image['alt']; ?>" />
                                            <?php } ?> 
                                        </figure>  
                                        <div class="card-info"> 
                                                <p class="card-info__icon  card-info__icon-subject ">  
                                                    <svg class="svg__hours"><use href="<?php echo get_bloginfo('template_directory').'/assets/img/icons.svg#courses'; ?>"></svg> 
                                                    Curso
                                                </p>
                                            <h1 class="card-info__title"> 
                                                <?php the_field( 'curso_titulo' ); ?> 
                                            </h1>   
                                            <div class="card-info__body"> 
                                                <p class="card-info__icon">   
                                                    <svg class="svg__date"><use href="<?php echo get_bloginfo('template_directory').'/assets/img/icons.svg#date'; ?>"></svg>
                                                  <b>INICIO: </b>  <?php the_field( 'curso_fecha_inicio' ); ?> 
                                                </p>
                                                <p class="card-info__icon">  
                                                    <svg class="svg__hours"><use href="<?php echo get_bloginfo('template_directory').'/assets/img/icons.svg#diplomas'; ?>"></svg> 
                                <b>CERTIFICACIÓN: </b> <?php the_field( 'curso_horas_academicas' );?>  
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
                                                    <button class="card-info__link ">Ver curso</button> 
                                                </div>
                                               <div>
                                                <p class="card-info__price "> 
                                                    <?php the_field( 'curso_precio' ); ?> 
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
        <div class="s-center"> 
            <a class=" btn-more" id="btn-more" href="<?php echo get_home_url(); ?>/cursos"> Ver más Cursos</a>
            
        </div>
    </div>