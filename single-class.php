<?php
/**
 * The main template file
 *
 * @package WordPress
 * @subpackage Alletess
 */

get_header(); 

$title = get_field('title');
$hero = get_field('hero');

?>
      
   <section id="sub-page-hero" class="<?php echo $section; ?>" >
     <div class="wrapper">
       
       <div class="rip-top"></div>
       <div class="rip-bot"></div>
      
       <div class="inner">
         <div class="text">
           <h2>Core Concourse Classes</h2>
           <h1><?php echo the_title(); ?></h1>
         </div>
         <div class="image"><img src="http://localhost:10032/wp-content/uploads/2024/02/academics.png" alt=""></div>
       </div>
    
    </div> 
   </section>
     
   
     
     <section class="content-block class">
       <div class="wrapper">
         
         
        <?php
              $units = get_field('units', $class->ID, $post->ID);
              $number = get_field('number', $class->ID, $post->ID);
              $name = get_field('name', $class->ID, $post->ID);
              $url = get_field('url', $class->ID, $post->ID);                
              $subject = get_field('subjecttype', $class->ID, $post->ID);
              $teaser = get_field('teaser', $class->ID, $post->ID);
              $instructor = get_field('instructor', $class->ID, $post->ID);
              $type = get_field('type', $class->ID, $post->ID);
              $image = get_field('image', $class->ID, $post->ID);
              $link = get_the_permalink($post->ID);
              $description = get_field('description', $class->ID, $post->ID);
              ?>
              
              
          <div class="class">
            <img src="<?php echo $image['sizes']['class']; ?>" alt="<?php echo $image['alt']; ?>" />
            <div class="top">
              <?php if ($url) { ?>
                <a href="<?php echo $url; ?>" target="_blank"><?php echo $number; ?></a>
              <?php }
              else { ?>
                <span class="number"><?php echo $number; ?></span>
              <?php }
              ?>
              <span><?php echo $type; ?></span>
            </div>
            <a href="<?php echo $link; ?>" class="title"><?php echo $name; ?></a>
            <p class="instructor"><strong>Faculty:</strong> <?php echo $instructor; ?></p>
            <div class="teaser">
              <div class="text"><?php echo $description; ?><p></div>
            </div>
          </div>

          

       
      </div> 
     </section>
     



<?php get_footer(); ?>
     

