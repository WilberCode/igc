<?php
 include(get_template_directory().'/inc/customizer.php');  
 include(get_template_directory().'/inc/head.php');
 include(get_template_directory().'/inc/theme-customizer.php');
 include(get_template_directory().'/inc/widgets.php');
//  include(get_template_directory().'/template-part/page/page-in-house.php');
function igc_scripts(){ 
    wp_enqueue_style( 'style', get_stylesheet_uri(), array(), '1.0.0','all');
    wp_enqueue_script('font-Awesome-JavaScript',"https://use.fontawesome.com/releases/v5.0.6/js/all.js");
    wp_enqueue_style('font-Awesome-Css',"https://use.fontawesome.com/releases/v5.0.13/css/all.css"); 
    wp_enqueue_style('font-Awesome-Css 1',"https://fonts.googleapis.com/icon?family=Material+Icons");  
    wp_enqueue_style('MontserratandRoboto',"https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i");  
    wp_enqueue_script('script materialize',get_template_directory_uri().'/assets/materialize/js/materialize.min.js',array(),'1.0.0',true);
    wp_enqueue_script('script index',get_template_directory_uri().'/assets/js/index-dist.js',array(),'1.0.0',true);
     // wp_enqueue_script('script',get_template_directory_uri().'/js/script.js',array(),'1.0.0',true);
 

}
add_action('wp_enqueue_scripts', 'igc_scripts'); 
 

// //Para obtener solo la url de la imagen thumbnail
function main_image_url($size){
    global $post; 
    $image_id = get_post_thumbnail_id($post -> ID);
    $main_image = wp_get_attachment_image_src($image_id, $size);
    //0 = ruta o url, 1 = width, 2 = height, 3 = boolean
    return $main_image[0];
}

 //Para Registrar logo
 function igc_custom_logo_setup() {
    $defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults ); 
 }
 add_action( 'after_setup_theme', 'igc_custom_logo_setup' ); 

// Activar para que los custom field se activen 
 //WordPress Custom Fields Missing When ACF is Active 
 add_filter('acf/settings/remove_wp_meta_box', '__return_false'); 
 
//Activar para que Text area ACF acepte shortcode
function my_acf_format_value( $value, $post_id, $field ) { 
	// run do_shortcode on all textarea values
	$value = do_shortcode($value);  
	// return
	return $value;
} 
add_filter('acf/format_value/type=textarea', 'my_acf_format_value', 10, 3);


// Funcion que imprime distintas descripciones
if(!function_exists('igc_description')):
    function igc_description(){
        if(is_home()||is_front_page()){
            $description = get_bloginfo('description');
        }else if(is_category()||is_tag()){
            $description = strip_tags(term_description());
        }else if(is_single()||is_page()){
            the_post(); 
            $description = htmlentities(get_the_excerpt(), ENT_HTML5,'UTF-8');
            rewind_posts();
        }else if(is_author()){
            $description = get_the_author_meta('description');
        }else if(is_search()){
            $description = __('Resultados de la busqueda:','igc').get_search_query();
        }else if(is_404()){
            $description = __('Error 404:No se Encontrado.','igc').get_bloginfo('description');
        }else{
            $description = get_bloginfo('description');
        }
        echo $description;
    }
endif;  


// Horas
function get_time_ago(){ 
    return human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' atrás';
}

function my_acf_google_map_api( $api ){
	
    $api['key'] = 'AIzaSyDyanFBJzINh89uaDEKU8eAqeLNRJW5r-c'; 
	return $api;
	
}


add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');






function events_endpoint() {
    register_rest_route( 'eventos/', 'destacados', array(  
        'methods'  =>   'GET' ,
        'callback' => 'get_events',
    ));
}
add_action( 'rest_api_init', 'events_endpoint' );
 
 
function get_events(){
	// Set the arguments based on our get parameters
	// $today = date('Ymd',strtotime('today'));
	$args = array (
		'post_type'     => 'Cursos',
		'posts_per_page'    => -1
	);
	// Run a custom query
	$meta_query = new WP_Query($args);
	if($meta_query->have_posts()) {
		//Define and empty array
		$i = 0;
		$data = array();
		// Store each post's data in the array
		while($meta_query->have_posts()) {
			$meta_query->the_post();
			$data[$i]['title']          =   get_the_title();
			$data[$i]['excerpt']        =   get_the_excerpt(); 
			$data[$i]['thumbnail']      =   get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
			$data[$i]['link']           =   get_the_permalink();
			$i++;
		}
		// Return the data
		return $data;
	}
}




