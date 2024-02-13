<?php
/**
 * The main template file
 *
 * @package WordPress
 * @subpackage Alletess
 */

get_header(); 
$hero = get_field('newshero','option');
?>
      
  <section id="sub-page-hero" style="background-image:url(<?php echo $hero['url']; ?>);">
    <div class="wrapper">
     
      <div class="inner">
        <div><h1>NEWS | <?php echo the_title(); ?></h1></div>
      </div>
   
   </div> 
  </section>
     
    <section class="content-block subpage">
      <div class="wrapper">
        
        <?php
          $quote = get_field('quote');
          $url = get_field('third_party_url');
          $thumb = get_the_post_thumbnail_url();
        ?>
        
        <div class="content news-content">
          
          
          <?php if ($quote || $thumb) { ?>    
            <div class="news-left">      
            <?php 
                             if ($quote) { ?>
                              <p class="quote"><?php echo $quote; ?></p>
                             <?php }
                              elseif ($thumb) { ?>
                               <img class="" src="<?php echo $thumb; ?>" alt="<?php echo the_title(); ?>" />   
                             <?php }
                              else { 
                             // echo the_excerpt();
                              }
                             ?>
            </div>        
          <?php }   
          else {
            
          }    
          ?>
          
          
          <div class="news-right  
           <?php if (!$thumb && !$quote) { echo ' full';} ?>    
          ">         
          <?php echo the_content(); ?>
          </div>
          
        </div>

        
        

       
     </div> 
    </section>
    
    <?php
          
      if( have_rows('carousel_images') ): ?>
      
      <section class="news-carousel">
        <div class="wrapper">
          <div class="news-images-wrap">
      
      <?php


          while( have_rows('carousel_images') ) : the_row();

              $image = get_sub_field('image');
              $caption = get_sub_field('caption');
              ?>
              
              <div class="img-wrap">
                <span>
                  <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                   <p><?php echo $caption; ?></p> 
                </span>
              </div>
              
              <?php

          endwhile;
          
          ?>
        </div>
      </div>
     </section>    


     <?php
     
      else : 
          
      endif;
        
        
    ?>
    
    
    



<?php get_footer(); ?>