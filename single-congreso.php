 <?php 
get_header();?>
<?php if(has_tag( array( 'congreso-realizado', '2018','2017','2016','2015','2014'))){ 
		the_content();
	}else{ ?>

<div class="single-congress ">  
	<style>
		.single-congress__banner{
			background: linear-gradient(<?php the_field('congreso_color');echo'f2,';the_field('congreso_color');echo'f2';?>),url(<?php echo get_bloginfo('template_directory').'/assets/img/congreso_banner.jpg'; ?>)  center 40%/cover no-repeat !important; 
		} 
		.tabs-info__show-title,.single-sidebar .sidebar-info__title{
			background:<?php the_field('congreso_color');?>  ;
			background-image: url(<?php echo get_bloginfo('template_directory').'/assets/img/congreso_banner.jpg'; ?>);
			background-position: top left ;
			background-size: cover;
			background-repeat: no-repeat;  
			background-blend-mode:darken;
		} 
		.single-sidebar .sidebar-info__title{
			background-position: top !important;
		}
		
	</style>
	<div class="single-congress__banner">
		<div class="ed-container"> 
			<div class=" ed-item s-100 m-60 l-60 xl-60 single-congress__banner-content s-mb-2 s-ml-05 s-mr-05">
					<h1 class="single-congress__title" ><?php the_title(); ?></h1> 
					<p class="single-congress__description"><?php the_field( 'congreso_eslogan' ); ?></p>   
					<div class="">
						<a class="btn-brochure " target="_blank" href="<?php the_field('congreso_url_temario_pdf'); ?>">
							<i class="far fa-file-pdf"></i>Descargar PDF
						</a>
					</div>
			</div>
			 <div class="ed-item s-100 m-40 l-40 xl-40 single-congress__banner-card s-ml-05 s-mr-05"> 
				<div class="congress-inscription">
					<img class="l-radius" src="<?php echo main_image_url('full'); ?>" alt="<?php the_title(); ?>" />
					<div class="congress-inscription__form">
						<h1 class=" s-center mw-small m-left lg-left fw-bold" >Inscribirse en el Congreso</h1>
						<?php  
							$file = './style.scss'; 
							if (file_exists(dirname(__FILE__) . $file)) {   
								echo do_shortcode('[everest_form id="3026"]');  
							}else{ 
								echo do_shortcode('[everest_form id="2982"]'); 
							}
							?> 
					</div>
				</div>
			 </div>
		</div>
	</div> 
	<div class="single-congress__tabs-first">
			<div class="presentation-tabs">
				<div class="ed-container">
					<div class="ed-item  p-r-l-0">
					<ul class="tabs ed-grid s-grid-3  m-grid-3   lg-grid-3 gap-0 margin-r-l-0 ">
						<li class="tab "> <a class="active" href="#presentation">PRESENTACIÓN</a> </li>
						<li class="tab "> <a href="#dirigido">DIRIGIDO A</a> </li>
						<li class="tab "> <a href="#porque">¿ POR QUÉ DEBE USTED ASISTIR ?</a> </li> 
					</ul>
					</div>
				</div>
			</div>
			<div class="ed-container">
				<div class="ed-item s-100 m-100 lg-100 margin-r-l-0"> 
					<div class="tabs-info">
						<div id="presentation" class="col s12 tabs-info__showtabs">
							<p><?php the_field( 'congreso_presentacion' ); ?></p>
						</div>
						<div id="dirigido" class="col s12 tabs-info__showtabs">
						
							<p><?php the_field( 'congreso_dirigido_a' ); ?></p>
						</div>
						<div id="porque" class="col s12 tabs-info__showtabs">
							<p><?php the_field( 'congreso_por_que' ); ?></p>
						</div>
					</div> 
				</div>
			</div> 
	</div>
	<div class="single-congress__tabs-second">   
	    <div class="tabs-wrap" style="background: linear-gradient(<?php the_field('congreso_color');echo "d9" ?>,<?php the_field('congreso_color');echo "d9" ?>),url(<?php echo get_bloginfo('template_directory').'/assets/img/congreso_banner.jpg'; ?>) center 40%/cover no-repeat !important;" >
			<div class="ed-container">
				<div class="ed-item">
					<h1 class="tabs-title  s-center m-center lg-center ">
						Información General
					</h1>
				</div>
			</div>	
			<div class="ed-container">
				<div class="ed-item p-r-l-0 ">
					<ul class="tabs ed-grid s-grid-5  m-grid-5 lg-grid-5 gap-0 margin-r-l-0 ">
						<li class="tab "> <a class="active"  href="#programa">Programa a Desarrollar</a></li>
						<li class="tab "> <a href="#conferencistas">Conferencistas Magistrales</a></li>
						<li class="tab "> <a href="#lugarfecha">Lugar, fechas y Horarios</a></li> 
						<li class="tab "> <a href="#beneficios">Beneficios de su Inscripción</a></li> 
						<li class="tab "> <a   href="#inversion">Inversión y Formas de Pago</a></li>
					</ul> 
				</div>
			</div>				
		</div>
		<div class="ed-container">
			<div class="ed-item s-100 m-100 l-70 margin-r-l-0"> 
				<div class="tabs-info">
					<div id="programa" class="program tabs-info__show bg-first">
						<h1  class="tabs-info__show-title"> Programa a Desarrollar </h1>
						<div class="tabs-info__show-body single-showtabs__body">
							<?php the_field( 'congreso_programa_desarrollar' ); ?> 
							<ul class="collapsible">
						<?php 
							if( have_rows('congreso_temario') ):  
									while ( have_rows('congreso_temario') ) : the_row();  
												$congreso_temario_title = get_sub_field('congreso_temario_titulo');  	
												$congreso_temario_description = get_sub_field('congreso_temario_descripcion');  
										?> 
												<li>
												<div class="collapsible-header"><i class="material-icons add">add</i><i class="material-icons remove">remove</i> <?php echo $congreso_temario_title; ?></div>
												<div class="collapsible-body"><span><?php echo $congreso_temario_description; ?></span></div>
												</li> 
								 <?php   
									endwhile; 
							else : 
									echo '<span class="bg-info">Temario Vacio</span>'; 
							endif; 
							?>
					</ul>
						</div>
					</div>
					<div id="conferencistas" class="speakers tabs-info__show">
						<h1  class="tabs-info__show-title" > Conferencistas Magistrales </h1>
						<div class="tabs-info__show-body bg-first "> 
						<?php 
							if( have_rows('congreso_conferencistas')):  
									while ( have_rows('congreso_conferencistas') ) : the_row();  
												$image = get_sub_field('congreso_conferencista_imagen');  	
												$biografia = get_sub_field('congreso_conferencista_biografia');  
										?>
										<div class="single-teacher__wrap ed-item s-100 m-100 l-100    m-to-center ed-container">
											<div class="single-teacher ed-item s-100 m-50 l-50"> 
												<picture>
													<img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
												</picture>   
												<?php if( have_rows('congreso_conferencista_informacion') ):  
														while( have_rows('congreso_conferencista_informacion') ): the_row();  
														// vars
															$name = get_sub_field('congreso_conferencista_nombre');
															$profession = get_sub_field('congreso_conferencista_profesion');?>
															<h1> <?php echo $name;?> </h1>
															<span>(<?php echo $profession?>)</span> 
														<?php endwhile; ?> 
												<?php else: echo '<span class="bg-info">No hay Conferencistas</span>';  
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
									echo '<span class="bg-info">No hay Conferencistas</span>'; 
							endif;

							?>
						</div> 
					</div>
					<div id="lugarfecha" class=" placedate tabs-info__show">
						<h1  class="tabs-info__show-title" > Lugar, fechas y Horarios </h1>
						<div class="tabs-info__show-body"> 
							<div class="igc-card">
								<!-- <h1 class="igc-card__title">INVERSIÓN</h1> -->
								<div class="igc-card__grid ed-grid s-grid-1 m-grid-2  l-grid-2 gap-0">
									<div class="igc-card__item"> 
										<h1>
											<svg ><use href="<?php echo get_bloginfo('template_directory').'/assets/img/icons.svg#date';?>"> </svg>
											FECHA
										</h1>
									</div>
									<div class="igc-card__item igc-card__item--info">
										<!--<h1 class="igc-card__item-price"><span>S/.450.00</span> Incluye IGV</h1>-->
										
										 <h1 class="igc-card__item-titleWhite fc-first-medium"><?php the_field( 'congreso_fecha' ); ?></h1>
									</div>
								</div>  
								<div class="igc-card__grid ed-grid s-grid-1 m-grid-2  l-grid-2 gap-0">
									<div class="igc-card__item">
										<h1>
										<svg ><use href="<?php echo get_bloginfo('template_directory').'/assets/img/icons.svg#hour';?>"> </svg>
											HORA
										</h1>
									</div>
									<div class="igc-card__item igc-card__item--info">
										<!--<h1 class="igc-card__item-price"><span>S/.450.00</span> Incluye IGV</h1>-->
										 <h1 class="igc-card__item-titleWhite fc-first-medium"><?php the_field( 'congreso_hora' ); ?></h1>
									</div>
								</div>  
								<div class="igc-card__grid ed-grid s-grid-1 m-grid-2  l-grid-2 gap-0">
									<div class="igc-card__item">
										<h1>
										<svg ><use href="<?php echo get_bloginfo('template_directory').'/assets/img/icons.svg#location';?>"></svg>
											LUGAR
										</h1>
									</div>
									<div class="igc-card__item igc-card__item--info">
										<!--<h1 class="igc-card__item-price"><span>S/.450.00</span> Incluye IGV</h1>-->
										 <h1 class="igc-card__item-titleWhite fc-first-medium"><?php the_field( 'congreso_lugar' ); ?></h1>
									</div>
								</div> 
								<div class="single-congress__map" >
									<?php the_field( 'congreso_mapa' ); ?>
									<?php  
										$location = get_field('congreso_map');

										if( !empty($location) ):
										?>
										<div class="acf-map">
											<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
										</div>
										<?php endif; ?>
								</div>
							</div> 
						</div> 
					</div>
					<div id="inversion" class=" investment tabs-info__show">
						<h1  class="tabs-info__show-title " > Inversión y Formas de Pago </h1>
						<div class="tabs-info__show-body"> 
							<h3 class="fw-normal s-center">INVERSIÓN</h3>    
							<?php 
							if( have_rows('congreso_inversion')):  
									while ( have_rows('congreso_inversion') ) : the_row();   
										?>
										<?php $inversion_tipo = get_sub_field('congreso_inversion_tipo');?>
										<h3 class="s-center"> <?php echo $inversion_tipo;?> </h3>
										 <div class="single-investment ed-grid s-grid-1  m-grid-2 lg-grid-2 gap-0" >  
											<?php if( have_rows('congreso_inversion_individual') ):  
												while( have_rows('congreso_inversion_individual') ): the_row();  
												// vars
													$precio_descripcion = get_sub_field('congreso_precio_descripcion');
													$cartera_imagen = get_sub_field('congreso_cartera_imagen');
													$cartera_precio = get_sub_field('congreso_cartera_precio');?>
													<div class="single-investment__section2" > 
													   <div><?php echo $precio_descripcion;?></div>
													</div> 	
													<div class="single-investment__section1 s-cross-center s-main-center s-to-center" >
													 	<div class="s-center">
														 <?php if( get_field('tipo_congreso') == 'secretaria' ){ ?>
															<?php echo $cartera_imagen?>
														 <?php }else if( get_field('tipo_congreso') == 'normal' ){ ?>
														 	<?php echo $cartera_precio?>
														 <?php }else{
															 echo '<span class="bg-info" >Selecciona el tipo de congreso</span>';
														 }?>  
														 </div>
													</div>  
												<?php endwhile; ?> 
											<?php else: echo '<span class="bg-info">Inversión vacio</span>';  
											endif; ?>    
										</div>
								 <?php   
									endwhile; 
							else : 
									echo '<span class="bg-info">Inversión vacio</span>'; 
							endif; 
							?>

							 
							<br>
							<h3 class="s-center mw-small fw-bold">Consulta con nuestra asesora académica para una mejor Información</h3> 
							<div class="adviser single-investment__user ed-grid l-grid-4 gap-0">
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
						<br>
						<h3 class="fw-normal s-center">FORMAS DE PAGOS DISPONIBLES</h3>  
						<div class="single-payment"> 
							<div class="single-investment ed-grid s-grid-1  m-grid-2 lg-grid-2 gap-0" >   
									<div class="single-investment__section2" >
										<h5> AL CONTADO O EN EFECTIVO A NOMBRE DE:</h5>  
									</div> 		
									<div class="single-investment__section1 s-cross-center s-main-center s-to-center" >
										<h5>
										<?php if( get_field('congreso_escuela')){ ?>	
											<span>	ESCUELA DE GERENCIA Y GESTIÓN<span>
										<?php } else {?>
											<span>	Instituto de Gerencia Intercontinental SAC<span>
										<?php }?> 
										</h5> 
									</div>  
							</div>
							<div class="single-investment ed-grid s-grid-1  m-grid-2 lg-grid-2 gap-0" >   
									<div class="single-investment__section2" >
										<h3>RUC</h3>  
									</div> 		
									<div class="single-investment__section1 s-cross-center s-main-center s-to-center" >
											<h5>
												<?php if( get_field('congreso_escuela')){ ?>	
													<span>20510129921<span>
												<?php } else {?>
													<span>20507198555<span>
												<?php }?>  
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
										<?php if( get_field('congreso_escuela')){ ?>	
											<span>Cta. Cte.: 00068-119332 <br>
											     Cuenta de detracción: 00046035054 <br>
												 CCI: 01806800006811933272
											<span> 
										<?php } else {?>
											<span>Cta. Cte. N° 00068-352789 <br> CCI. 01806800006835278979<span>
										<?php }?>
										
										</h5> 
									</div>  
							</div> 
						</div>
						</div> 
					</div>
					<div id="beneficios" class=" benefits tabs-info__show bg-first-medium">
						<h1  class="tabs-info__show-title" >Beneficios de su Inscripción</h1>
						<div class="tabs-info__show-body">  
						<div class="benefits-gift ed-grid s-grid-12  m-grid-12 lg-grid-12 margin-r-l-0" >
							<div class="benefits-gift__item s-cols-12 m-cols-3 lg-cols-3"><span><i class="fas fa-check"></i></span></div>
							<div class="benefits-gift__item s-cols-12 m-cols-6 lg-cols-6"><h1>Participación en el Congreso </h1> </div>
							<div class="benefits-gift__item icon s-cols-12 m-cols-3 lg-cols-3"><svg class="svg__coffe">
								<use href="<?php echo get_bloginfo('template_directory').'/assets/img/icons.svg#congresses'; ?>">
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
				</div>
			</div>
			<div class="ed-item s-100 m-100 l-30 margin-r-l-0 p-r-l-05 ">
				<div class="single-congress__wallets">
					<div class="single-sidebar">
						<div class="sidebar-info  " style="background:white" >
							<?php if( get_field('tipo_congreso') == 'secretaria' ){ ?>
								<h1 class="sidebar-info__title  s-center m-center lg-center"> Alternaltivas de Carteras </h1>
								<div class="sidebar-info__body">
									<?php the_field( 'congreso_carteras' ); ?>  
								</div>
							<?php } else if( get_field('tipo_congreso') == 'normal' ){?>  
								<h1 class="sidebar-info__title "> Informes y Inscripciones </h1>
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
									<p> <span>Ciudad: Lince - Lima, Peru</span> </p>
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
				<?php } else{?> 
					<h1 class="sidebar-info__title  s-center m-center lg-center"> Selecciona el tipo de congreso </h1>
					<div class="sidebar-info__body">
						<span class="bg-info">Campo vacio</span>  
					</div>
				<?php }?> 
				</div> 
				
			</div> 
		</div> 
	</div>
	 
</div> 
<?php }; ?>

<div class="single-congress__contact"  style="margin-top:5em;" >
	<div class="ed-container">
		<!-- <div class="ed-item s-100 m-100  l-50">
			<div class="single-congress__contact-form">
				<h1 class="s-center m-left lg-left" >Solicitar Más Información</h1>
				<?php  
					// $file = './style.scss'; 
					// if (file_exists(dirname(__FILE__) . $file)) {   
					// 	echo do_shortcode('[everest_form id="2841"]');  
					// }else{ 
					// 	echo do_shortcode('[everest_form id="2359"]'); 
					// }
					?> 
			</div>
		</div> -->
		<div class="ed-item s-100 m-100 l-100 ">
			<div class="single-congress__info">
				<div class="single-sidebar">
					<div class="sidebar-info" style="border-radius:6px; padding:1em;" >
						<h1 class="s-center m-left lg-left " style="color:#000" > Informes y Inscripciones </h1>
						<div class="sidebar-info__body">  
							<?php
								wp_nav_menu(array(
									'theme_location'  => 'congress-info',
									'container'       => 'div',
									'container_class' => 'company-nav',
									'container_id'    => 'company-congress',
									'menu_class'      => 'company-menu',
									'menu_id'         => 'congress-menu'  
								));
							?> 
						</div>
					</div> 
				</div>
			</div> 
		</div>
	</div>
	<img class="single-congress__contact-img" src="<?php echo get_bloginfo('template_directory').'/assets/img/secretaria.png'; ?>" alt="">

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