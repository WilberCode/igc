<?php 

/*
Template Name: Pantalla con Banner
Template Post Type: post, page, event
*/  
?>

<?php 
get_header();  
?>

<main class="main  flex-1 ">
    <?php if (have_posts()) : 
        while (have_posts()) : the_post(); ?> 

        <?php the_content(); ?>


        <?php endwhile; 
    endif; ?>
</main>


<?php
	get_footer();?>
