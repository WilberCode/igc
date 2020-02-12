<div id="congresses" class=" congresses "> 
        <h1 class="courses__title s-center m-center lg-center">Congresos Nacionales e Internacionales</h1> 
            <div class="card-container ed-grid  s-grid-1 m-grid-2 lg-grid-2 xl-grid-2  rows-gap  gap-2 "> 
            <?php
                    // args
                    $args = array(
                        'numberposts'	=> -1,
                        'posts_per_page'   => 6,
                        'post_type'		=> 'Congreso'
                    ); 
                    // query
                    $the_query = new WP_Query( $args );  
                    if( $the_query->have_posts() ): 
                        while( $the_query->have_posts() ) :$the_query->the_post(); ?> 
                            <div class="  card-wrap"> 
                                    <a class="card__link" href="<?php the_permalink(); ?>" > 
                                    <article class="card" data-aos="zoom-in-up"  data-aos-once="true">
                                        <figure class="card-figure">
                                            <?php $imagen_del_curso = get_field( 'congreso_imagen' ); ?>
                                            <?php if ( $imagen_del_curso ) { ?>
                                                <img src="<?php echo $imagen_del_curso['url']; ?>" alt="<?php echo $imagen_del_curso['alt']; ?>" />
                                            <?php } ?> 
                                        </figure>  

                                        <div class="card-info"> 
                                            <p class="card-info__icon  card-info__icon-subject ">  
                                                <svg class="svg__hours"><use href="<?php echo get_bloginfo('template_directory').'/assets/img/icons.svg#congresses'; ?>"></svg> 
                                                Congreso
                                            </p>
                                        <h1 class="card-info__title"> 
                                            <?php the_field('congreso_titulo'); ?> 
                                        </h1>   
                                        <div class="card-info__body"> 
                                            <p class="card-info__icon">   
                                                <svg class="svg__date"><use href="<?php echo get_bloginfo('template_directory').'/assets/svg/icons.svg#calendar'; ?>"></svg>
                                                <b>INICIO: </b>  <?php the_field( 'congreso_fecha' ); ?> 
                                            </p>
                                            <p class="card-info__icon">  
                                                <svg class="svg__hours"><use href="<?php echo get_bloginfo('template_directory').'/assets/img/icons.svg#hour'; ?>"></svg> 
                            <b>HORA: </b> <?php the_field('congreso_hora');?>  
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
                                                <button class="card-info__link ">Ver Congreso</button> 
                                            </div>
                                            <div>
                                            <p class="card-info__price "> 
                                                <?php the_field('congreso_precio'); ?> 
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
                <a class=" btn-more " href="<?php echo get_home_url(); ?>/congresos"> Ver más Congresos</a>
            </div>
        
    </div>