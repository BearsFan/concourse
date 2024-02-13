<?php
/**
 * The main template file
 *
 * @package WordPress
 * @subpackage Alletess
 */

get_header(); 

$hero = get_field('hero');
$herot = get_field('hero_title');

?>
      
     <section id="home-page-hero">
       <div class="wrapper" style="background-image:url(<?php echo $hero['url']?>);">
       
          <h1><?php echo $herot; ?></h1>
         
          <div class="rip-top"></div>
                  
          <div class="tint"></div>
         
          <div class="rip-bot"></div>
       
      </div> 
     </section>
     
     <section class="callout blue-bg white-bot">
       <div class="wrapper">
               
          <div class="content">
            <h3>If you seek a world-class STEM education enriched by engagement with the enduring human questions, think Concourse!</h3>
            <a href="#"><button>Learn More</button></a>
          </div>
          
       </div>
       <div class="rip-bot"></div>
    </section>
     
     <?php
     include 'partials/_custom_content.php';    
     ?>
     

     



<?php get_footer(); ?>