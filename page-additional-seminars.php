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
         
      
        
        <?php
        $my_query = new WP_Query( array(
          'showposts' => '1', 
          'post_type' => 'schedules'
          )
        );
        
         while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
        
            <div class="schedule-block ">
              <h3>Other Humanities Courses</h3>         
              <div class="classes">      
            <?php
            $cmpfall = new WP_Query( array(
              'showposts' => '1000', 
              'post_type' => 'class',  
              'meta_query'    => array(
                      'relation'      => 'AND',
                      array(
                          'key'       => 'subjecttype',
                          'value'     => 'add',
                      )
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
         
         <?php     
         
         
         endwhile; ?>
          
        
       
      </div> 
     </section>
     



<?php get_footer(); ?>
     

