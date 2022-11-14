<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js" id="html">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <title><?= wp_get_document_title() ?></title>  
    <script>document.documentElement.className = document.documentElement.className.replace(/\bno-js\b/, 'js');</script>
     <meta name="keywords" content="igc, capacitacion, especializacion, programas, cursos, diplomas, in-house,congresos, congresos de secretarias, gestion publica, finanzas publicas, presupuesto publico, invierte peru, siaf, seace, osce"> 
    
     <meta name="facebook-domain-verification" content="bea79dlokk1it97em4n50s3pcb00w1" />
    <?php wp_head(); ?>  
 
   <!-- Google tag (gtag.js) -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-139305718-1"></script>
      <script>
          setTimeout(function(){ 
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-139305718-1');
         },3000);
      </script>
        <!-- Facebook Pixel Code -->
    <script>    
         setTimeout(function(){ 
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '2504771669565427');
            fbq('track', 'PageView');    
         },3000);
    </script>  
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=2504771669565427&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->

      
</head>
<body <?php body_class();  ?>  > 
    <?php wp_body_open(); 	?>
