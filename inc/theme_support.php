<?php 
function wph_theme_support() {

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Custom background color.
    add_theme_support(
        'custom-background',
        array(
            'default-color' => 'f5efe0',
        )
    ); 
    /*
    * Enable support for Post Thumbnails on posts and pages.
    *
    * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
    */ 

    add_theme_support('post-thumbnails');

    // Set post thumbnail size.
      set_post_thumbnail_size( 1200, 9999 );  
  
    
    
    
	// Custom logo.
	$logo_width  = 120;
	$logo_height = 90;

	// If the retina setting is active, double the recommended width and height.
	if ( get_theme_mod( 'retina_logo', false ) ) {
		$logo_width  = floor( $logo_width * 2 );
		$logo_height = floor( $logo_height * 2 );
	}

	add_theme_support(
		'custom-logo',
		array(
			'height'      => $logo_height,
			'width'       => $logo_width,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);
      /*
    * Let WordPress manage the document title.
    * By adding theme support, we declare that this theme does not use a
    * hard-coded <title> tag in the document head, and expect WordPress to
    * provide it for us.
    */
    add_theme_support( 'title-tag' );

    /*
    * Switch default core markup for search form, comment form, and comments
    * to output valid HTML5.
    */
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style',
            'navigation-widgets',
        )
    );

    add_theme_support( 
        'post-formats', 
        array ( 
            'aside',
            'gallery',
            'link',
            'image',
            'quote',
            'status',
            'video',
            'audio',
            'chat' 
    ) );    
    remove_action('wp_head', 'wp_generator'); //Eliminar La version de  wordpress del codigo

    /*
    * Make theme available for translation.
    * Translations can be filed in the /languages/ directory.
    * If you're building a theme based on Twenty Twenty, use a find and replace
    * to change 'twentytwenty' to the name of your theme in all the template files.
    */
    load_theme_textdomain( 'wph' );

    // Add support for full and wide align images.
    add_theme_support( 'align-wide' );

    // Add support for responsive embeds.
    add_theme_support( 'responsive-embeds' );

 

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );
    
    add_theme_support(
        'editor-color-palette',
        array(
            array(
                'name'  => esc_html__( 'Primer Color', 'escuela' ),
                'slug'  => 'primary',
                'color' => '#0792A8',
            ),
            array(
                'name'  => esc_html__( 'Segundo Color', 'escuela' ),
                'slug'  => 'secondary',
                'color' => '#055A81',
            )
             
        )
    );
 

}



add_action( 'after_setup_theme', 'wph_theme_support' );
 


//Menus
function wph_menus() {

	register_nav_menus(array(
        'main'=>'Menú Principal',
        'secondary'=>'Menú Secundario',
        'third'=>'Menú Tercero',
        'mobile'=>'Menú Móvil',
        'footer' =>'Footer Menú',
        'social-media'=>'Social Media', 
    
    )); 
}

add_action( 'init', 'wph_menus' );

 
 
