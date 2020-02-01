<?php get_header();  ?>  

<?php
    if(is_page('cursos')){ 
        get_template_part('template-part/page/page-courses');
    }elseif(is_page('diplomados')){ 
        get_template_part('template-part/page/page-diplomas');
    }elseif(is_page('acerca-de-nosotros')){ 
        get_template_part('template-part/page/page-about-us');
    }elseif (is_page('congresos')) {
        get_template_part('template-part/page/page-congresses'); 
    }elseif (is_page('cursos-in-house')) {
        get_template_part('template-part/page/page-in-house');
    }elseif (is_page('consultoria')) {
        get_template_part('template-part/page/page-consultancy');
    }elseif (is_page('contactos')) {
        get_template_part('template-part/page/page-contact'); 
    }elseif (is_page('expositores')) {
        get_template_part('template-part/page/page-counsulting-team'); 
    }elseif (is_page('registro-curso')) {
        get_template_part('template-part/page/page-register-course');
    // }elseif (is_page('blog')) {
    //     get_template_part('template-part/page/blog');
    }else{
        get_template_part('404');
    }

?>
 <?php get_footer();


