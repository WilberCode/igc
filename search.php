<?php get_header();?>
<div class="msearch">
	<div class="msearch-container">
		<div class="msearch-form">
			<?php get_search_form(true);?>
		</div>
		<h1 class="msearch__result">Los resultados para la busqueda
			<b>
				<?php echo  get_search_query();?>
			</b> son:
		</h1>
		<div class="msearch-posts  ">
			<?php if(have_posts()):
					while(have_posts()):  the_post(); ?>  
						<article class="msearch-post ed-container">
							<?php if(main_image_url('full')){  ?>
							<a href="<?php if(has_tag( array( 'no-link', 'no'))){ echo "#no-link"; }else{the_permalink();}; ?>" class="msearch-post__picture ed-item s-100 m-40 l-40" >
								<img src="<?php echo main_image_url('full'); ?>" alt="">
							</a>
							<div class="msearch-post__content ed-item s-100 m-60 l-60"> 
								<a href="<?php if(has_tag( array( 'no-link', 'no'))){ echo "#no-link"; }else{the_permalink();}; ?>" class="msearch-post__link"> 
									<h1 class="msearch-post__title">
										<?php the_title(); ?>
									</h1>  
								</a>
							</div>
							<?php }else{	?>
								<a href="<?php if(has_tag( array( 'no-link', 'no'))){ echo "#no-link"; }else{the_permalink();}; ?>" class="msearch-post__link  l-to-center "> 
									<h1 class="msearch-post__title">
										<?php the_title(); ?>
									</h1>  
								</a>
							<?php }?>
						</article>  
			<?php endwhile;  ?>
			<div class="msearch-navigation">
				<?php echo paginate_links();?>
			</div>
			<?php else:?>
			<div class="msearch-not">
				<p class="msearch-not__first">No se han encontrado resultados.</p>
				<p class="msearch-not__second">Prueba con otras palabras clave.</p>
			</div>
			<?php endif;
                        rewind_posts();  
                        ?> 
		</div>
	</div>
</div>
<?php get_footer();