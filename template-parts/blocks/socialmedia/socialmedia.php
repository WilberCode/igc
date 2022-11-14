<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'socialmedia-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'socialmedia';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$socialmedia_name = get_sub_field('socialmedia_name')?: 'Nombre de red social';  
$socialmedia_icon = get_sub_field('socialmedia_icon')?: '➤'; 
$socialmedia_link = get_sub_field('socialmedia_link')?: '/#';

?>



    <section  id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">  
                <?php 
                  if( have_rows('socialmedia')){
                          while ( have_rows('socialmedia') ) { the_row();      ?>  
                             
                            <a class="socialmedia-icon-wrap" target="_blank" href="<?php echo get_sub_field('socialmedia_link'); ?>" title="<?php echo get_sub_field('socialmedia_name'); ?>">    
                                <div  class="socialmedia-icon">
                                    <?php if(get_sub_field('socialmedia_icon')){ ?>
                                        <img class="style-svg" src="<?php echo get_sub_field('socialmedia_icon'); ?>" alt="<?php echo get_sub_field('socialmedia_name'); ?>">
                                    <?php }else{?>
                                            <span><?php echo $socialmedia_icon  ?></span>
                                    <?php }?>
                                </div>    
                            </a>  

                         <?php   
                        }  
                      } else{ 
                        echo 'Agrega tus redes sociales';
                     };

                  ?>   
         
    </section>
