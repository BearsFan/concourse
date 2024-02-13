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
        
          <div class="classtable">
            
             <h3>Other Humanities Courses</h3>
          
         <?php
            
         if( have_rows('courses') ): ?>
           
           <table cellpadding="0" cellspacing="0" border="0">
             
             <tr>
               <th>Subject</th>
               <th>Units</th>
               <th>Title</th>
               <th>Instructor</th>
               <th>Day/Time</th>
               <th>Room</th>
             </tr>
           
           <?php
             while( have_rows('courses') ) : the_row();
                 $class = get_sub_field('class'); 
                 $daytime = get_sub_field('daytime'); 
                 $instructor = get_sub_field('instructor'); 
                 $room = get_sub_field('room'); 
                 $units = get_field('units', $class->ID);
                 $subject = get_field('number', $class->ID);
                 $name = get_field('name', $class->ID);
                 $url = get_field('url', $class->ID);
                 $title = get_the_title($class->ID);
                 ?>
                 <tr>
                   <td class="subject"><?php echo $subject; ?></td>
                   <td class="units"><span style="white-space:nowrap;"><?php echo $units; ?></span></td>
                   <td class="name"><a href="<?php echo $url; ?>" target="_blank"><?php echo $name; ?></a></td>
                   <td class="instructor"><?php echo $instructor; ?></td>
                    <td class="daytime"><?php echo $daytime; ?></td>
                   <td class="room"><?php echo $room; ?></td>
                </tr>
            <?php     
             endwhile; ?>
             
            </table>
            
            <?php 
         else :
         endif;
         ?>
         
       </div>
         
         <?php     
          endwhile; ?>
          
        
       
      </div> 
     </section>
     



<?php get_footer(); ?>
     

