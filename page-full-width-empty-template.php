<?php 

/*
Template Name: Pantalla completa vacía
Template Post Type: post, page, event
*/  
?>

<?php 
get_header();  
?>

<main class="main  flex-1 ">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <h1  class="absolute text-transparent z-[-1] text-center " ><?php the_title(); ?></h1>

    <?php the_content(); ?>


    <?php endwhile; endif; ?>
</main>


<?php
	get_footer();?>