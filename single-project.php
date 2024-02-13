<?php
/**
 * The main template file
 *
 * @package WordPress
 * @subpackage Alletess
 */

get_header(); 

$title = get_the_title();
$hero = get_field('project_hero','option');
$quote = get_field('quote');
$student = get_field('student');
$first = get_field('first_name', $student->ID);
$last = get_field('last_name', $student->ID);

?>
      
    <section id="sub-page-hero" style="background-image:url(<?php echo $hero['url'] ;?>);">
      <div class="wrapper">
       
        <div class="inner">
          <div><h1>PROJECTS | <?php echo $first; ?> <?php echo $last; ?></h1></div>
        </div>
     
     </div> 
    </section>

      
     <section class="content-block single-project students">
       <div class="wrapper">
         
         
         <div class="left">
        
        
                    <div class="student">

                      <?php                       
                        
                      if ( get_post_type( $student->ID ) == 'students' ) {
                        
            			       $link = get_the_permalink($student->ID);
                         $email = get_field('email', $student->ID);
                         $research = get_field('current_research_areas',$student->ID);
                         $image = get_the_post_thumbnail_url($student->ID,'trend');
                         $year = get_field('graduation_year',$student->ID);
                         $pubdate = get_field('publish_date');
                        ?>
                        <?php  if ($image) { ?>
                          <p class="image"><img src="<?php echo $image; ?>" alt="" /></p>
                        <?php }
                        ?>
                        
                         <h3 class="name"><?php echo $first; ?> <?php echo $last; ?></h3>
                         <?php if ($email) { ?>
                           <p><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
                         <?php }
                         ?>
                         <?php if ($year) { ?>
                           <p><?php echo $year; ?></p>
                         <?php }
                         ?>
                         <?php if ($research) { ?>
                           <p><strong>Current Research Areas:</strong> <?php echo $research; ?></p>
                         <?php }
                         
                      }
                        
                      if ( get_post_type( $student->ID ) == 'alumni' ) {
                        
                                 $first = get_field('first_name',$student->ID);
                                 $last = get_field('last_name',$student->ID);
                                 $disertation = get_field('dissertation_title',$student->ID);
                                 $advisor = get_field('advisor',$student->ID);
                                 $year = get_field('graduation_year',$student->ID);
                                 $aff1 = get_field('current_affiliation',$student->ID);
                                 $aff1u = get_field('current_affiliation_link',$student->ID);
                                 $aff2 = get_field('second_affiliation',$student->ID);
                                 $aff2u = get_field('second_affiliation_link',$student->ID);
                                 $aff3 = get_field('third_affiliation',$student->ID);
                                 $aff3u = get_field('third_affiliation_link',$student->ID);
                                 $pubdate = get_field('publish_date');
                                 ?>
                                  <h3 style="padding-top:20px;"><?php echo $first; ?> <?php echo $last; ?></h3>
                                  <p><strong>Disertation:</strong> <?php echo $disertation; ?></p>
                                  <p><strong>Advisor:</strong> <?php echo $advisor; ?></p>
                                  <p><strong>Degree Awarded:</strong> <?php echo $year; ?></p>
                                  <p><strong>Current Affiliation:</strong> 
                                    
                                    <?php
                                    if ($aff1u) { ?>
                                      <a href="<?php echo $aff1u; ?>" target="_blank"><?php echo $aff1;?></a>
                                    <?php }
                                    else { ?>
                                      <?php echo $aff1;?>
                                     <?php }
                                    ?>
                                    
                                    <?php
                                    if ($aff2u) { ?>
                                      <a href="<?php echo $aff2u; ?>" target="_blank"><?php echo $aff2;?></a>
                                    <?php }
                                    else { ?>
                                      <?php echo $aff2;?>
                                     <?php }
                                    ?>
                                    
                                    <?php
                                    if ($aff3u) { ?>
                                      <a href="<?php echo $aff3u; ?>" target="_blank"><?php echo $aff3;?></a>
                                    <?php }
                                    else { ?>
                                      <?php echo $aff3;?>
                                     <?php }
                                    ?>
                                    
                                 
                                  </p>
                                  
                    <?php  }  
                    ?>
                        
                     </div>
                     
                     <div class="quote">
                       <?php echo $quote; ?>
                     </div>
           
         </div>
         

        <div class="right">
          
          <h3 class="project-title"><?php echo the_title(); ?></h3>
          
          <?php echo the_content(); ?>
          
          <p><?php echo $pubdate; ?></p>
          
        </div>

          
       
      </div> 
     </section>
     
   
     
     

           <?php
     
            if( have_rows('photos') ): ?>
    <section class="project-photos">
        <div class="wrapper">
                 <div class="photos">
            <?php
             while( have_rows('photos') ) : the_row(); 
               $photo = get_sub_field('photo','full'); 
               $caption = get_sub_field('caption'); 
             ?>
               <div class="photo-wrap">
                 <span>
                   <img src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt']; ?>" />
                   <p><?php echo $caption; ?></p> 
                 </span>
               </div>
               
             <?php
             endwhile; ?>
            
                </div>
                
                
         
              </div>
            </section>
            
            <?php
            
         
            else:
            endif;
          
        ?>
          




<?php get_footer(); ?>
     

