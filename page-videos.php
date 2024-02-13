<?php
/*
Template Name: Videos Page
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
          if ($heros) {
            foreach( $heros as $hero ) {
             $image = $hero['image']; 
             $left = $hero['left']; 
             $top = $hero['top']; 
             ?>
             <img class="stack" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"
             style="
             <?php if ($left) { echo 'left:' . $left . '% !important;';}  ?>
             <?php if ($top) { echo ' top:' . $top . '% !important;';}  ?>
             "
              />
             <?php
        }
          }
              
          ?>

        </div>
        </div>
     
     </div> 
    </section>
    
    <?php
    include 'partials/_custom_content.php';  
    
    wp_reset_postdata();   
    ?>
    
    <?php

        
        $args = array(
        	'post_type'  => 'video',
          'post_status' => 'publish',
          'posts_per_page' => 10000,  
          'order' => 'ASC', 
        );
        $postslist = get_posts( $args );
        
    ?>
     

    <section class="blocks">
        <div class="wrapper border-bottom videos">
       
       <?php
       foreach ( $postslist as $post ) {
         setup_postdata( $post );
          $id = get_field('video_id');
          $description = get_field('description');
          
          ?>
          <div class="block content">
               <iframe loading="lazy" title="" src="https://www.youtube.com/embed/<?php echo $id; ?>" width="560" height="315" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
               <p><?php echo $description; ?></p>
           </div>
      <?php  
          
          
       }
       ?>
       
       
       
      
       <?php
           
       wp_reset_postdata(); 
       ?>
             
             
       
                   </div> 
    </section>
    



<?php get_footer(); ?>