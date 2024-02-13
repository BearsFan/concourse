 <!doctype html>
 <html class="no-js" lang="">
     <head>
         <meta charset="utf-8">
         <meta http-equiv="x-ua-compatible" content="ie=edge">
         <title></title>
         <meta name="description" content="">
         <meta name="viewport" content="width=device-width, initial-scale=1">

         <link rel="manifest" href="site.webmanifest">
         <link rel="apple-touch-icon" href="/wp-content/themes/alletess/img/favicon.png">
         <link rel="icon" type="image/x-icon" href="/wp-content/themes/alletess/img/favicon.png">
         
         <link rel="preconnect" href="https://fonts.googleapis.com">
         <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
         <link href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Text:ital,wght@0,400;0,700;1,400&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,700&display=swap" rel="stylesheet">
        
     </head>

     <body 
     <?php body_class(); ?>
     >
 
 
  <?php 
  wp_head(); 
  
  $logo = get_field('logo','option');
  $logourl = get_field('logo_url','option');
  $mit = get_field('mit','option');
  $login = get_field('clinician_login_url','option');
  ?>
  
    <header>
     <div class="wrapper">
       
       
       
       <div class="logos">
       
          <a href="/" id="menulink"><img src="<?php echo $logo['url'] ?>" id="logo" alt="<?php echo $logo['alt'] ?>" /></a>
          
          <a href="<?php echo $logourl; ?>" target="_blank" id="mitlogo"><img src="<?php echo $mit['url'] ?>"  alt="<?php echo $mit['alt'] ?>" /></a>
          
      </div>
       
      <div class="menu">
            <?php
            wp_nav_menu(
               array(
                'menu' => 'main-menu', 
                'container' => 'nav', 
                'orderby' => 'menu_order' ,
                'after' => '<span class="toggle"><i class="fa fa-plus"></i><i class="fa fa-minus"></i></span>'
              ) 
              );

              ?>  
       </div>
      <!-- end menu -->
        
       
       <div id="burger">
         <i class="fa fa-bars"></i>
         <i class="fa fa-times"></i>
       </div>
     
     </div>
   </header>
   