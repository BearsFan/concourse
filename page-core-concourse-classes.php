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
         
         <div class="links">
          <?php
          $my_query = new WP_Query( array(
            'showposts' => '1000', 
            'post_type' => 'schedules', 
            )
          );
          
          while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
              <li><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></li>
          <?php endwhile; ?>
         </div>
         
         <div class="classtable">
           
          <h3>Anthropology Graduate Subjects</h3>
          <table cellpadding="0" cellspacing="0" border="0">
           
           <tr>
             <th>Subject</th>
             <th>Units</th>
             <th>Title</th>
           </tr>
         
         <?php
         $my_query = new WP_Query( array(
           'showposts' => '1000', 
           'post_type' => 'class',  
           'meta_query'    => array(
                   'relation'      => 'AND',
                   array(
                       'key'       => 'type',
                       'value'     => 'Anthropology',
                   ),
                   array(
                       'key'       => 'inactive',
                       'value'     => '1',
                       'compare'   => '!=',
                   ),
               ),
           )
         );
         
         while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
           
            <?php
                  $units = get_field('units', $class->ID, $post->ID);
                  $subject = get_field('number', $class->ID, $post->ID);
                  $name = get_field('name', $class->ID, $post->ID);
                  $url = get_field('url', $class->ID, $post->ID);
                  ?>
                  <tr>
                    <td class="subject"><?php echo $subject; ?></td>
                    <td class="units"><?php echo $units; ?></td>
                    <td class="title"><a href="<?php echo $url; ?>" target="_blank"><?php echo $name; ?></a></td>
                 </tr>
             <?php     
              endwhile; ?>
              
        </table>
        
          <h3>History Graduate Subjects</h3>
          <table cellpadding="0" cellspacing="0" border="0">
           
           <tr>
             <th>Subject</th>
             <th>Units</th>
             <th>Title</th>
           </tr>
         
         <?php
         $my_query = new WP_Query( array(
           'showposts' => '1000', 
           'post_type' => 'class',  
           'meta_query'    => array(
                   'relation'      => 'AND',
                   array(
                       'key'       => 'type',
                       'value'     => 'History',
                   ),
                   array(
                       'key'       => 'inactive',
                       'value'     => '1',
                       'compare'   => '!=',
                   ),
               ),
           )
         );
         
         while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
           
           <?php
                 $units = get_field('units', $class->ID, $post->ID);
                 $subject = get_field('number', $class->ID, $post->ID);
                 $name = get_field('name', $class->ID, $post->ID);
                 $url = get_field('url', $class->ID, $post->ID);
                 ?>
                 <tr>
                   <td class="subject"><?php echo $subject; ?></td>
                   <td class="units"><?php echo $units; ?></td>
                    <td class="title"><a href="<?php echo $url; ?>" target="_blank"><?php echo $name; ?></a></td>
                </tr>
            <?php
              endwhile; ?>
              
        </table>
        
          <h3>STS Graduate Subjects</h3>
          <table cellpadding="0" cellspacing="0" border="0">
           
           <tr>
             <th>Subject</th>
             <th>Units</th>
             <th>Title</th>
           </tr>
         
         <?php
         $my_query = new WP_Query( array(
           'showposts' => '1000', 
           'post_type' => 'class',  
           'meta_query'    => array(
                   'relation'      => 'AND',
                   array(
                       'key'       => 'type',
                       'value'     => 'STS',
                   ),
                   array(
                       'key'       => 'inactive',
                       'value'     => '1',
                       'compare'   => '!=',
                   ),
               ),
           )
         );
         
         while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
           
           <?php
                 $units = get_field('units', $class->ID, $post->ID);
                 $subject = get_field('number', $class->ID, $post->ID);
                 $name = get_field('name', $class->ID, $post->ID);
                 $url = get_field('url', $class->ID, $post->ID);
                 ?>
                 <tr>
                   <td class="subject"><?php echo $subject; ?></td>
                   <td class="units"><?php echo $units; ?></td>
                   <td class="title"><a href="<?php echo $url; ?>" target="_blank"><?php echo $name; ?></a></td>
                </tr>
            <?php
              endwhile; ?>
              
        </table>
        
        
        
      </div>
 
         
        <div class="other">
          <h4>See Class Schedules:</h4>
          <ul>
            <?php
            $my_query = new WP_Query( array(
              'showposts' => '1000', 
              'post_type' => 'schedules', 
              )
            );
            
            while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
                <li><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></li>
            <?php endwhile; ?>
              
          </ul>
        </div>

       
      </div> 
     </section>
     



<?php get_footer(); ?>
     

