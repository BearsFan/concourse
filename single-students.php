<?php
/**
 * The main template file
 *
 * @package WordPress
 * @subpackage Alletess
 */

get_header(); 

$title = get_the_title();
$hero = get_field('hero');
$banner = get_field('banner_photo');
?>
      
    <section id="sub-page-hero" 
    <?php if ($banner) { ?>
      style="background-image:url(<?php echo $banner['url']; ?>);">
    <?php
    }
    else { ?>
      style="background-image:url(/wp-content/uploads/2023/05/alumni.png);">
    <?php }
    ?>
    
    
      <div class="wrapper">
       
        <div class="inner">
          <div><h1>STUDENTS | <?php echo $title; ?></h1></div>
        </div>
     
     </div> 
    </section>

      
     <section class="content-block students">
       <div class="wrapper">
         
         
         <div class="left">
        
        
                    <div class="student">
                       <?php
                       $first = get_field('first_name');
                       $last = get_field('last_name');
           			       $link = get_the_permalink();
                       $email = get_field('email');
                       $research = get_field('current_research_areas');
                       $image = get_the_post_thumbnail_url($post->ID,'trend');
                       $bio = get_field('bio');
                       ?>
                        <p class="image"><img src="<?php echo $image; ?>" alt="" /></p>
                        <h3 class="name"><?php echo get_field('first_name'); ?> <?php echo get_field('last_name'); ?></h3>
                        <p><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
                        <p><strong>Current Research Areas:</strong> <?php echo $research; ?></p>
            
               
                     </div>
           
         </div>
         

        <div class="right">
          
          <?php echo $bio; ?>
          
        </div>

          

          

       
      </div> 
     </section>
     



<?php get_footer(); ?>
     

