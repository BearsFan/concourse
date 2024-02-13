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
      
    <section id="sub-page-hero" style="background-image:url(/wp-content/uploads/2023/05/ClassesHero.png);">
      <div class="wrapper">
       
        <div class="inner">
          <h1>Classes</h1>
        </div>
     
     </div> 
    </section>
     
   
     
     <section class="content-block schedule">
       <div class="wrapper">
         
         
         <div class="links">
           <a href="/classes">Graduate Classes</a>  |  <a href="/current-schedule">Current Class Schedule</a>
         </div>
         
         <h2><?php echo the_title(); ?></h2>
        

      
         <div class="classtable">
          
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
                   $name = get_field('name', $class->ID);
                   $url = get_field('url', $class->ID);
                   $title = get_the_title($class->ID);
                   $subject = get_field('number', $class->ID);
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
           
           <div class="other">
             <h4>See Other/Previous Class Schedules:</h4>
             <ul>
               <?php
               
               $obj = get_queried_object();
               $postid = $obj->ID;
               
               
               $my_query = new WP_Query( array(
                 'showposts' => '1000', 
                 'post_type' => 'schedules', 
                 'post__not_in' => array( $postid ), 
                 'orderby' => 'rand'
                 )
               );
               
               while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
                   <li><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></li>
               <?php endwhile; ?>
                 
             </ul>
           </div>
           
         </div>
          
          

          

       
      </div> 
     </section>
     



<?php get_footer(); ?>
     

