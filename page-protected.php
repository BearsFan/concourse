<?php
/*
Template Name: Protected Page
Template Post Type: page
*/
get_header(); 

?> 
      
    <section id="sub-page-hero">
      <div class="wrapper">
       
        <div class="inner">
        <h1><?php echo the_title(); ?></h1>
        <div class="image-stack">

          <?php
          $heros = get_field('hero_images');
          ?>
          <?php
              foreach( $heros as $hero ) {
               $image = $hero['image']; 
               $left = $hero['left']; 
               $top = $hero['top']; 
               ?>
               <img class="stack" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"
               style="
               <?php if ($left) { echo 'left:' . $left . '% ;';}  ?>
               <?php if ($top) { echo ' top:' . $top . '% ;';}  ?>
               "
                />
               <?php
          }
          ?>

        </div>
        </div>
     
     </div> 
    </section>
    
     
     <?php
     
     if ( post_password_required() ) { ?>
       <section class="content-block bg-gray subpage" style="padding:40px;"><div class="Wrapper">
         <?php echo get_the_password_form(); ?>
        </div></section>
        <?php
     }
     else {
       include 'partials/_custom_content.php';  
     }
             
     ?>
     



<?php get_footer(); ?>