 <?php 
get_header();?>
<div class="single-banner">
	<div class="ed-container"> 
		<div class="ed-item s-100 m-60 lg-70	">
			<div class="single-banner__wrap ">
				<figure class="single-banner__figure">
					<?php $curso_image = get_field( 'curso_imagen' ); ?>
					<?php if ( $curso_image ) { ?>
					<img src="<?php echo $curso_image['url']; ?>" alt="<?php echo $curso_image['alt']; ?>"
					/>
					<?php } ?>
				</figure>
				<h1 class="single-banner__title">
					<?php the_field( 'curso_titulo' ); ?>
					
				</h1>
				
			</div> 
			<div class="single-banner__info  ">
				<p class="single-banner__mode ">
					<i class="fas fa-map-marker-alt"></i> Curso presencial 
				</p>
				<div class="ed-grid s-grid-1  lg-grid-2 rows-gap cols-gap-none ">
					<div class="single-banner__section  ">
						<div class="single-banner__svg-wrap s-cross-center s-main-center s-to-center">
							<svg class=" ">
								<use href="<?php echo get_bloginfo('template_directory').'/assets/img/icons.svg#date'; ?>">
							</svg>
						</div>
						<p>
							<strong>INICIO</strong>: <?php the_field( 'curso_fecha_inicio' );?>
						</p>
					</div>
					<div class="single-banner__section ">
						<div class="single-banner__svg-wrap s-cross-center s-main-center s-to-center">
							<svg class="svg__hour">
								<use href="<?php echo get_bloginfo('template_directory').'/assets/img/icons.svg#diplomas'; ?>">
							</svg>
						</div>
						<p>
							<strong>CERTIFICACIÓN</strong>: <?php the_field( 'curso_horas_academicas' ); ?>
						</p>
					</div>
					<div class="single-banner__section ">
						<div class="single-banner__svg-wrap s-cross-center s-main-center s-to-center">
							<svg >
								<use href="<?php echo get_bloginfo('template_directory').'/assets/img/icons.svg#day';?>">
							</svg>
						</div>
						<p >
							<strong>DÍAS</strong>: <?php the_field( 'curso_dias' ); ?> 
						</p>
					</div> 
					<div class="single-banner__section ">

						<div class="single-banner__svg-wrap s-cross-center s-main-center s-to-center">
							<svg class="svg__hours">
								<use href="<?php echo get_bloginfo('template_directory').'/assets/img/icons.svg#hour'; ?>">
							</svg>
						</div>
						<p>
							<strong>HORARIOS</strong>: <?php the_field( 'curso_hora_inicio' ); ?>
						</p>
					</div>
					<div class="single-banner__section ">
						<div class="single-banner__svg-wrap s-cross-center s-main-center s-to-center">
						<!--	<i class="fal fa-wallet"></i>-->
							<svg class="">
								<use href="<?php echo get_bloginfo('template_directory').'/assets/img/icons.svg#wallet'; ?>">
							
							</svg>
						</div>
						<p>
							<strong>INVERSIÓN</strong>: 	<span> <?php the_field( 'curso_precio' ); ?> </span>
						</p>
					</div>
				</div>
				<div class="ed-grid s-1-3">
					<a class="btn-brochure  " target="_blank" href="<?php the_field( 'curso_brochure_url' ); ?>">
						<i class="far fa-file-pdf"></i>Descargar temario PDF</a>
				</div>
			</div>
		</div>
		<div class="single-banner__contact ed-item s-100 m-40 lg-30"> 
			<div class="course-form">
				<h1>Solicitar más información.</h1>
				<p>Para cualquier consulta y mayor información solo  completa tus datos y nos pondremos en contacto.</p> 
	 
			    	<?php  
							$file = './style.scss'; 
							if (file_exists(dirname(__FILE__) . $file)) {   
							//echo do_shortcode('[wpforms id="2123" title="false" description="false"]');  
							echo do_shortcode('[everest_form id="2840"]');  
									}else{ 
							echo  do_shortcode('[everest_form id="2358"]');  
							}
							?> 
			</div> 
			
		</div>
	</div>
</div>

<div class="single-content bg-second-medium">
	<div class="ed-container">
		<div class="ed-item s-100 m-100 lg-70 margin-r-l-0">
			<ul class="tabs ed-container">
				<li class="tab ed-item s-20 m-20 l-20"> <a class="active" href="#curso">Presentación</a> </li>
				<li class="tab ed-item s-20 m-20 l-20"> <a href="#temario">Temario</a> </li>
				<li class="tab ed-item s-20 m-20 l-20"> <a  href="#docentes">Docentes</a> </li>
				<li class="tab ed-item s-20 m-20 l-20 "> <a  href="#beneficios">Beneficios</a> </li>
				<li class="tab ed-item s-20 m-20 l-20"> <a   href="#inversion">Inversion y formas de Pago</a> </li>
			</ul>
			<div class="single-tabs__info p-r-l-05">
				<div id="curso" class="col s12 single-showtabs">
					<h1 class="single-showtabs__title">Presentacion del curso</h1>
					<div class="single-showtabs__body single-showtabs__body-pre content-editor"> 
						<?php if(have_posts()):
								while(have_posts()): 
									the_post(); ?>
						<?php  the_content(); ?>
						<?php endwhile;
								else:
									printf('<p>No hay entradas</p>');
							endif;
							rewind_posts(); ?>
					</div>

				</div>
				<div id="temario" class="single-showtabs col s12 ">
					<h1 class="single-showtabs__title">Temario a dictarse</h1>
					<div class="single-showtabs__body">
						<?php // the_field( 'curso_temario' ); ?> 
						<ul class="collapsible">
						<?php 
							if( have_rows('curso_temario') ):  
									while ( have_rows('curso_temario') ) : the_row();  
												$curso_temario_title = get_sub_field('curso_temario_titulo');  	
												$curso_temario_description = get_sub_field('curso_temario_descripcion');  
										?> 
												<li>
												<div class="collapsible-header"><i class="material-icons add">add</i><i class="material-icons remove">remove</i> <?php echo $curso_temario_title; ?></div>
												<div class="collapsible-body"><span><?php echo $curso_temario_description; ?></span></div>
												</li> 
								 <?php   
									endwhile; 
							else : 
									echo "Temario Vacio"; 
							endif; 
							?>
					</ul>
					</div>
				</div>
				<div id="docentes" class="col s12 single-showtabs">
					<h1 class="single-showtabs__title">La plana docente está conformada por destacados especialistas en Contrataciones con el Estado.</h1>
					<div class="single-showtabs__body ed-container ">  
							<?php 
							if( have_rows('curso_profesores') ):  
									while ( have_rows('curso_profesores') ) : the_row();  
												$image = get_sub_field('curso_profesor_imagen');  	
												$biografia = get_sub_field('curso_profesor_biografia');  
										?>
										<div class="single-teacher__wrap ed-item s-100 m-100 l-100    m-to-center ed-container">
											<div class="single-teacher ed-item s-100 m-50 l-50"> 
												<picture>
													<img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
												</picture>   
												<?php if( have_rows('cursos_profesor_informacion') ):  
														while( have_rows('cursos_profesor_informacion') ): the_row();  
														// vars
															$nameandlast = get_sub_field('curso_profesor_nombres_y_apellidos');
															$profession = get_sub_field('curso_profesor_profesion');?>
															<h1> <?php echo $nameandlast;?> </h1>
															<span>(<?php echo $profession?>)</span> 
														<?php endwhile; ?> 
												<?php else: echo "No hay profesores ";  
											   endif; ?>  
											</div>
											<div class="single-teacher__description-wrap ed-item s-100 m-50 l-50">
												<div class="single-teacher__description">
													<?php echo $biografia; ?>
												</div>
											</div>
										</div>
								 <?php   
									endwhile; 
							else : 
									echo "No hay profesores"; 
							endif;

							?>
					</div>
				</div>
				<div id="beneficios" class=" benefits col s12 single-showtabs">
					<h2 class="single-showtabs__title">Beneficios por adquirir el curso</h2>
					<div class="single-showtabs__body">
					<div class="benefits-gift ed-grid s-grid-12  m-grid-12 lg-grid-12 margin-r-l-0" >
							<div class="benefits-gift__item s-cols-12 m-cols-3 lg-cols-3"><span><i class="fas fa-check"></i></span></div>
							<div class="benefits-gift__item s-cols-12 m-cols-6 lg-cols-6"><h1>Participación en el Curso </h1> </div>
							<div class="benefits-gift__item icon s-cols-12 m-cols-3 lg-cols-3"><svg class="svg__coffe">
								<use href="<?php echo get_bloginfo('template_directory').'/assets/img/icons.svg#classroom'; ?>">
							</svg></div>
						</div>
						<div class="benefits-gift ed-grid s-grid-12  m-grid-12 lg-grid-12 margin-r-l-0 " >
							<div class="benefits-gift__item s-cols-12 m-cols-3 lg-cols-3"><span><i class="fas fa-check"></i></span></div>
							<div class="benefits-gift__item s-cols-12 m-cols-6 lg-cols-6"><h1>Pioner </h1></div>
							<div class="benefits-gift__item s-cols-12 m-cols-3 lg-cols-3"><img class="" src="<?php echo get_bloginfo('template_directory').'/assets/img/separatas.png'; ?>" alt=""></div>
						</div>
						<div class="benefits-gift ed-grid s-grid-12  m-grid-12 lg-grid-12 margin-r-l-0" >
							<div class="benefits-gift__item s-cols-12 m-cols-3 lg-cols-3"><span><i class="fas fa-check"></i></span></div>
							<div class="benefits-gift__item s-cols-12 m-cols-6 lg-cols-6"><h1>CD </h1></div>
							<div class="benefits-gift__item s-cols-12 m-cols-3 lg-cols-3"><img class="" src="<?php echo get_bloginfo('template_directory').'/assets/img/dvd.png'; ?>" alt=""></div>
						</div>
						<div class="benefits-gift ed-grid s-grid-12  m-grid-12 lg-grid-12 margin-r-l-0" >
							<div class="benefits-gift__item s-cols-12 m-cols-3 lg-cols-3"><span><i class="fas fa-check"></i></span></div>
							<div class="benefits-gift__item s-cols-12 m-cols-6 lg-cols-6"><h1>Block de apuntes</h1> </div>
							<div class="benefits-gift__item s-cols-12 m-cols-3 lg-cols-3"><img class="" src="<?php echo get_bloginfo('template_directory').'/assets/img/cuaderno.png'; ?>" alt=""></div>
						</div>
						<div class="benefits-gift ed-grid s-grid-12  m-grid-12 lg-grid-12 margin-r-l-0" >
							<div class="benefits-gift__item s-cols-12 m-cols-3 lg-cols-3"><span><i class="fas fa-check"></i></span></div>
							<div class="benefits-gift__item s-cols-12 m-cols-6 lg-cols-6"><h1>Certificado </h1></div>
							<div class="benefits-gift__item icon s-cols-12 m-cols-3 lg-cols-3">	<svg class="svg__diploma s-cross-center s-main-center s-to-center" >
								<use href="<?php echo get_bloginfo('template_directory').'/assets/img/icons.svg#diplomas'; ?>"></svg>
							</div>
						</div>
						<div class="benefits-gift ed-grid s-grid-12  m-grid-12 lg-grid-12 margin-r-l-0" >
							<div class="benefits-gift__item s-cols-12 m-cols-3 lg-cols-3"><span><i class="fas fa-check"></i></span></div>
							<div class="benefits-gift__item s-cols-12 m-cols-6 lg-cols-6"><h1>Coffe Break</h1> </div>
							<div class="benefits-gift__item icon s-cols-12 m-cols-3 lg-cols-3"><svg class="svg__coffe">
								<use href="<?php echo get_bloginfo('template_directory').'/assets/img/icons.svg#coffe'; ?>">
							</svg></div>
						</div>  
					</div>
				</div>
				<div id="inversion" class="col s12 single-showtabs">
					<h2 class="single-showtabs__title  ">Inversion y formas de Pago</h2>
					<div class="single-showtabs__body">
						<h3 class="fw-normal s-center">INVERSIÓN</h3>
						<div class="single-investment ed-grid s-grid-1  m-grid-2 lg-grid-2 gap-0" >   
								<div class="single-investment__section1 s-cross-center s-main-center s-to-center" >
										<div>
											<h2><?php the_field( 'curso_precio' ); ?></h2> 
											<span>	Incluido el IGV  </span>
										</div> 
								</div> 
									<div class="single-investment__section2" >
										<div>
											<h3>FINANCIAMIENTO EN CUOTAS</h3>  
											<p>Asesora Académica</p> 
										</div>
										<svg class=""> <use href="<?php echo get_bloginfo('template_directory').'/assets/img/icons.svg#back'; ?>"></svg>
									</div> 
						</div>
						<div class="adviser single-investment__user ed-grid l-grid-4 gap-0 ">
									<figure class="adviser-avatar l-cols-1">
										<img src="<?php echo get_bloginfo('template_directory').'/assets/img/asesora.png'?>" alt="">	
									</figure>
									<div class="adviser-content l-cols-2">
										<p class="adviser-content__name"><strong>Evelyn Zapana Rios</strong></p>
										<p class="adviser-content__job">Coordinadora de capacitación</p>
										<a  class="adviser-content__btn" href="https://api.whatsapp.com/send?phone=945504555" target="_blank">
										<svg> <use href="<?php echo get_bloginfo('template_directory').'/assets/img/icons.svg#whatsapp';?> " ></svg>
										<p class="adviser-content__btn-number">995504555</p>
										<p class="adviser-content__btn-text" >Click para conversar con una Asesora</p>
										</a>
									</div>
						</div>
						<h3 class="fw-normal  s-center">FORMAS DE PAGOS DISPONIBLES</h3>  
						<div class="single-payment"> 
							<div class="single-investment ed-grid s-grid-1  m-grid-2 lg-grid-2 gap-0" >   
									<div class="single-investment__section2" >
											<h4>	AL CONTADO O EN EFECTIVO A NOMBRE DE:</h4>  
										</div> 		
									<div class="single-investment__section1 s-cross-center s-main-center s-to-center" >
											<h5>
											<span>	Instituto de Gerencia Intercontinental SAC<span>
											</h5> 
									</div>  
							</div>
							<div class="single-investment ed-grid s-grid-1  m-grid-2 lg-grid-2 gap-0" >   
									<div class="single-investment__section2" >
											<h3>RUC</h3>  
										</div> 		
									<div class="single-investment__section1 s-cross-center s-main-center s-to-center" >
											<h5>
											<span>20510129921<span>
											</h5> 
									</div>  
							</div>
							<h3 class="s-center">Cuenta Bancaria Disponible</h3>
							<div class="single-investment ed-grid s-grid-1  m-grid-2 lg-grid-2 gap-0" >   
									<div class="single-investment__section2" >
											<img class="single-payment__img" src="<?php echo get_bloginfo('template_directory').'/assets/img/logobn.png'; ?>">

									</div> 		
									<div class="single-investment__section1 s-cross-center s-main-center s-to-center" >
										<h5 >
											<span>Cta. Cte. N° 00068-352789 <br> CCI. 01806800006835278979<span>
										</h5> 
									</div>  
							</div>  
						</div>
					</div>

				</div>


			</div>

		</div>
		<div class="ed-item s-100 100-30 lg-30">
			<div class="single-sidebar">
				<div class="sidebar-info">
					<h1 class="sidebar-info__title bg-second-medium"> Informes y Inscripciones </h1>
					<div class="sidebar-info__body">
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
						<p>
							<span>Ciudad: Lince - Lima, Peru</span>
						</p>
						<div class="whatsapp-container">
							<div class="whatsapp-number" >
								<svg class="svg__whatsapp">
									<use href="<?php echo get_bloginfo('template_directory').'/assets/img/icons.svg#whatsapp'; ?>">
								</svg>
								<p>945504555</p>
							</div>
							<a class="sidebar-info__btn" href="https://api.whatsapp.com/send?phone=945504555" target="_blank">Enviar Mensaje</a>
							
						</div>
					</div>
				</div> 
			</div>
		</div> 
	</div>
</div>
	<div class="single-gift">
	    <div  class="ed-container p-r" >
	   		<div  class="ed-item" > 
				<h1 class="single-gift__title">TE OFRECEMOS</h1>
				<div class="single-gift__wrap ed-grid s-grid-2  m-grid-3  lg-grid-5">
					<div class="single-gift__content">
						<h2 class="single-gift__name">DVD</h2>
						<div class="single-gift__body">
							<img src="<?php echo get_bloginfo('template_directory').'/assets/img/dvd.png'; ?>" alt="">
						</div>
					</div>
					<div class="single-gift__content">
						<h2 class="single-gift__name">Separatas</h2>
						<div class="single-gift__body">
							<img src="<?php echo get_bloginfo('template_directory').'/assets/img/separatas.png'; ?>">
						</div>
					</div>
					<div class="single-gift__content">
						<h2 class="single-gift__name">Material de lectura</h2>
						<div class="single-gift__body">
							<img src="<?php echo get_bloginfo('template_directory').'/assets/img/cuaderno.png'; ?>" alt="">
						</div>
					</div>
					<div class="single-gift__content">
						<h2 class="single-gift__name">Certificado</h2>
						<div class="single-gift__body">
							<svg class="svg__diploma s-cross-center s-main-center s-to-center" >
								<use href="<?php echo get_bloginfo('template_directory').'/assets/img/icons.svg#diplomas'; ?>">
							</svg>
						</div>
					</div>
					<div class="single-gift__content">
						<h2 class="single-gift__name">Coffe Break</h2>
						<div class="single-gift__body s-cross-center s-main-center s-to-center">
							<svg class="svg__coffe">
								<use href="<?php echo get_bloginfo('template_directory').'/assets/img/icons.svg#coffe'; ?>">
							</svg>
						</div>
					</div> 
				</div>
			</div>
 		</div> 
	</div>
	<div class="single-comments">  
	<br>
		<div class="ed-container">
			<div class="ed-item p-m-rl-5">
				<?php 
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
				?>  
			</div>
		</div>
	</div>
<?php
get_footer();
    ?>