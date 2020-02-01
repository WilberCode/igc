<?php /* Template Name: Registro Curso
         Template Post Type: post, page, event 
*/ ?>
 <style>
            .main{ 
                margin-top:0 !important; 
            }
            body{ 
                position:relative;
                background:red;
            }
            body::before {
                content: '';
                position: absolute; 
                top: 0;
                left: 0;
                bottom: 0;
                height: 100%;
                width: 100%;   
                background: linear-gradient(rgba(57, 132, 138, 0.95), rgba(42, 170, 187, 0.85)), url(https://images.pexels.com/photos/935863/pexels-photo-935863.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940) center 40%/cover no-repeat;
                z-index:-2;   
            } 
            .header,.footer,.clients{
                display: none;
            }  
            .page-register{
               
            } 
            .igc-popup{
                display:none;
            }
            .page-register-view {
                width: 100vw;
                height: auto;   
            }
        </style>
 
    <div class="page page-register page-register-view"> 
        <div class="ed-container">
            <div class="ed-item s-100 m-60 l-50">
            <div class="page-register__content">
                <h1>Cursos de Especialización de Gestión Pública</h1>
                <p><i class="fas fa-hand-point-right"></i> Capacítate en Gestión Pública y dale un plus a tu perfil profesional!</p>
                <time><i class="far fa-calendar-alt"></i> Fecha de Inicio: 13 de febrero 2019</time> 
            </div>
        </div>
        <div class="ed-item s-100  m-40 l-50 "> 
            <div class="page-register__form">
                    <h1>Registrarse</h1>       
                    <?php echo do_shortcode('[wpforms id="1548" title="false" description="false"]'); ?>   
            </div>
        </div>  
        </div>
    </div> 