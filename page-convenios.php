<?php 

/*
Template Name: Convenios
Template Post Type: post, page, event
*/  
?>

<?php 
get_header();  
 
?>
<main class="main   py-12 ">
    <div class="container">
        <?php if (have_posts()) : while (have_posts()): the_post(); ?>

        <h1 class=" text-center mb-8"><?php the_title(); ?></h1>
        <?php the_content(); ?>


        <?php endwhile; endif; ?>

        <?php  
             $convenios =  get_field('convenios');
             if ($convenios) {
     
              foreach( $convenios as $convenio ) {  
                  if ($convenio['convenios_header']) {?>

        <div class="cardfull flex-col border-primary-500 border-opacity-10 border mb-10  ">
            <div class=" md:flex justify-between items-center md:space-x-2 px-6 sm:px-10 py-3 ">
                <h3 class="maxlg:text-h5"><?=$convenio['convenios_header']['convenios_header_descripcion'] ?></h3>
                <span><?=$convenio['convenios_header']['convenios_header_years'] ?></span>
            </div>
            <?php  
                     }  

                     $convenios_body = $convenio['convenios_body'];

                     if($convenios_body){ ?>
            <div class="bg-layout  rounded-card p-2 sm:p-6 ">
                <div class="flex flex-wrap justify-center">
                    <?php  foreach( $convenios_body as $convenios_body_single ) { ?>



                    <?php 
                           $tag = '';
                           $tag_close='';
                           if($convenios_body_single['convenios_body_enlace_activo']){ 
                              $tag = '<a href="'.$convenios_body_single['convenios_body_enlace'].'" target="_blank"  class="p-4 w-full max-w-[332px]" > ';
                              $tag_close = '</a>';
                           } else{
                              $tag = '<div  class="p-4 w-full max-w-[332px]" >';
                              $tag_close  = '</div>';
                           }?>
                    <?=$tag;?>
                    <figure class="bg-white rounded-12  p-6   ">
                        <img class="object-contain h-20 m-auto"
                            src="<?=$convenios_body_single['convenios_body_imagen'] ?>"
                            alt="<?=$convenios_body_single['convenios_body_nombre'] ?>">
                    </figure>
                    <?=$tag_close;?>
                    <?php    
                              }  ?>
                </div>
            </div>
            <?php } 
                  ?>

        </div>
        <?php  
                   }
             }
           ?>


    </div>


</main>


<?php
	get_footer();?>
