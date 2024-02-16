<?php
/**
 * The main template file
 *
 * @package WordPress
 * @subpackage Alletess
 */

get_header(); 

$title = get_field('title');
$section = get_field('section');
$hero = get_field('hero');

?>
      
   <section id="sub-page-hero" class="<?php echo $section; ?>" >
     <div class="wrapper">
       
       <div class="rip-top"></div>
       <div class="rip-bot"></div>
      
       <div class="inner">
         <div class="text">
           <h2><?php echo $section; ?></h2>
           <h1><?php echo $title; ?></h1>
         </div>
         <div class="image"><img src="<?php echo $hero['url']; ?>" alt="<?php echo $hero['alt']; ?>" /></div>
       </div>
    
    </div> 
   </section>
    
    <?php
    include 'partials/_custom_content.php';    
    ?>
     
   
     
     <section class="content-block schedule">
       <div class="wrapper">
         
         <div class="buttons">
          
              <a href="#" data-season="fall" class="active">Fall</a>
              <a href="#" data-season="spring">Spring</a>
              <a href="#" data-season="iap">IAP</a>
         
         </div>
         
         <div class="schedule-block fall cmp">
           <h3>Chemistry, Math, Physics</h3>         
           <div class="classes">      
         <?php
         $cmpfall = new WP_Query( array(
           'showposts' => '1000', 
           'post_type' => 'class',  
           'meta_query'    => array(
                   'relation'      => 'AND',
                   array(
                       'key'       => 'subjecttype',
                       'value'     => 'cmp',
                   ),
                   array(
                       'key'       => 'schedule',
                       'value'     => 'fall',
                       'compare'   => 'LIKE',
                   ),
               ),
           )
         );
         
         while ( $cmpfall->have_posts() ) : $cmpfall->the_post(); ?>
           
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
                  ?>
                 <?php
                 include 'partials/_class.php';    
                 ?>
             <?php     
              endwhile; ?>
          </div>
      </div>
 
         
         <div class="schedule-block fall humanities">
           <h3>Humanities</h3>         
           <div class="classes">    
         <?php
         $cmpfall = new WP_Query( array(
           'showposts' => '1000', 
           'post_type' => 'class',  
           'meta_query'    => array(
                   'relation'      => 'AND',
                   array(
                       'key'       => 'subjecttype',
                       'value'     => 'humanities',
                   ),
                   array(
                       'key'       => 'schedule',
                       'value'     => 'fall',
                       'compare'   => 'LIKE',
                   ),
               ),
           )
         );
         
         while ( $cmpfall->have_posts() ) : $cmpfall->the_post(); ?>
           
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
                  ?>
                 <?php
                   include 'partials/_class.php';    
                 ?>
             <?php     
              endwhile; ?>
             </div> 
      </div>
      
      
         <div class="schedule-block spring cmp hide">
                
             
         <?php
         $cmpspring = new WP_Query( array(
           'showposts' => '1000', 
           'post_type' => 'class',  
           'meta_query'    => array(
                   'relation'      => 'AND',
                   array(
                       'key'       => 'subjecttype',
                       'value'     => 'cmp',
                   ),
                   array(
                       'key'       => 'schedule',
                       'value'     => 'spring',
                       'compare'   => 'LIKE',
                   ),
               ),
           )
         );
         
         if ($cmpspring->have_posts()) {
           echo '<h3>Chemistry, Math, Physics</h3><div class="classes"> ';
         }
         
         while ( $cmpspring->have_posts() ) : 
           
           $cmpspring->the_post(); ?>
           
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
                  ?>
                 <?php
                 include 'partials/_class.php';    
                 ?>
             <?php     
              endwhile; ?>
              
              <?php if ($cmpspring->have_posts()) {
                echo '</div>';
              } ?>
              
          
      </div>
 
         
         <div class="schedule-block spring humanities hide">
                  
            
         <?php
         $humspring = new WP_Query( array(
           'showposts' => '1000', 
           'post_type' => 'class',  
           'meta_query'    => array(
                   'relation'      => 'AND',
                   array(
                       'key'       => 'subjecttype',
                       'value'     => 'humanities',
                   ),
                   array(
                       'key'       => 'schedule',
                       'value'     => 'spring',
                       'compare'   => 'LIKE',
                   ),
               ),
           )
         );
         
         if ($humspring->have_posts()) {
           echo '<h3>Humanities</h3><div class="classes"> ';
         }
         
         while ( $humspring->have_posts() ) : 
           
           $humspring->the_post(); ?>
           
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
                  ?>
                 <?php
                   include 'partials/_class.php';    
                 ?>
             <?php     
              endwhile; ?>
             <?php if ($humspring->have_posts()) {
               echo '</div>';
             } ?>
      </div>
      
      
         <div class="schedule-block iap cmp hide">       
           
         <?php
         $cmpiap = new WP_Query( array(
           'showposts' => '1000', 
           'post_type' => 'class',  
           'meta_query'    => array(
                   'relation'      => 'AND',
                   array(
                       'key'       => 'subjecttype',
                       'value'     => 'cmp',
                   ),
                   array(
                       'key'       => 'schedule',
                       'value'     => 'iap',
                       'compare'   => 'LIKE',
                   ),
               ),
           )
         );
         
         while ( $cmpiap->have_posts() ) : 
           echo '<h3>Chemistry, Math, Physics</h3><div class="classes"> ';
           $cmpiap->the_post(); ?>
           
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
                  ?>
                 <?php
                 include 'partials/_class.php';    
                 ?>
             <?php     
              endwhile; ?>
              
              <?php if ($cmpiap->have_posts()) {
                echo '</div>';
              } ?>
          
      </div>
 
         
         <div class="schedule-block iap humanities hide">       
              
         <?php
         $humiap = new WP_Query( array(
           'showposts' => '1000', 
           'post_type' => 'class',  
           'meta_query'    => array(
                   'relation'      => 'AND',
                   array(
                       'key'       => 'subjecttype',
                       'value'     => 'humanities',
                   ),
                   array(
                       'key'       => 'schedule',
                       'value'     => 'iap',
                       'compare'   => 'LIKE',
                   ),
               ),
           )
         );
         
         while ( $humiap->have_posts() ) : 
           echo '<h3>Humanities</h3><div class="classes"> ';
           $humiap->the_post(); ?>
           
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
                  ?>
                 <?php
                   include 'partials/_class.php';    
                 ?>
             <?php     
              endwhile; ?>
             <?php if ($humiap->have_posts()) {
               echo '</div>';
             } ?>
      </div>
      

       
      </div> 
     </section>
     



<?php get_footer(); ?>
     

