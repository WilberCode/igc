<?php /* Template Name: Contactos
         Template Post Type: post, page, event 
*/ ?>

 
    <div class="page">
        <div class="page-container">
            <div class="page-banner contact-banner" > 
                <div class="ed-container">
                    <div class="ed-item l-100"> 
                        <h1>Nuestros Contactos</h1>
                        <svg class="svg__book"><use href="<?php echo get_bloginfo('template_directory').'/assets/img/icons.svg#contact'; ?>"></svg>

                        <p>Estamos disponibles a su servicio en nuestras redes sociales. Si quiere una atención personalizada se puede acercar a la siguiente dirección: Av. Arenales 2081 – Lince</p>
                   </div>
                </div>
            </div>
            <div class="contact-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.387590739292!2d-77.03755968561737!3d-12.085596745913545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c8f5625a324b%3A0x9588a5ae35fb13fd!2sAv.+Arenales+2081%2C+Lince+15046!5e0!3m2!1ses!2spe!4v1545957794486"   frameborder="0" style="border:0" allowfullscreen></iframe> 
            </div>    
            <div class="contact-card__wrap">
                <div class="contact-card ed-grid s-grid-1 m-grid-1 l-grid-5 gap-0">
                    <div class="contact-info   l-cols-2">
                        <h1>Información de Contacto</h1>
                        <div class="contact-address">
                            <?php
                                wp_nav_menu(array(
                                    'theme_location'  => 'company-information',
                                    'container'       => 'div',
                                    'container_class' => 'company-nav',
                                    'container_id'    => 'company-nav',
                                    'menu_class'      => 'company-menu',
                                    'menu_id'         => 'company-menu'  
                                ));
                            ?>
                            <?php
                            wp_nav_menu(array(
                                'theme_location'  => 'social-media',
                                'container'       => 'div',
                                'container_class' => 'footer-social',
                                'container_id'    => 'footer-social',
                                'menu_class'      => 'footer-social__menu',
                                'menu_id'         => 'footer-social__menu'  
                            ));  
                            ?>   
                        </div>
                        <p>
                        Estamos disponibles a su servicio en nuestras redes sociales. Si quiere una atención personalizada se puede acercar a la siguiente dirección: Av. Arenales 2081 – Lince
                        </p>

                    </div>
                    <div class="contact-form   l-cols-3  ">
                        <div class="ed-container">
                            <div class="ed-item">
                                <h1>Si desea más información, complete este formulario. Nos pondremos en contacto con usted a la mayor brevedad posible.</h1>
                                <?php 
                                    echo do_shortcode('[everest_form id="2360"]'); 
                                ?>   
                            </div>
                        </div>
                       
                     </div>
                </div>  
            </div>   
            <div class="content-wrap">
                <div class="content"> 
                </div>
            </div>
        </div>
    </div>
       

 