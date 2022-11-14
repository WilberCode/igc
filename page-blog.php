

<?php 
get_header();  
 
?> 
<main class="main   py-12 ">
   <div class="container">
   <?php if (have_posts()) : while (have_posts()): the_post(); ?>

        <h1  class=" text-center mb-8" ><?php the_title(); ?></h1>   
        <?php the_content(); ?>


    <?php endwhile; endif; ?>
   </div>
</main>


<?php
	get_footer();?>
