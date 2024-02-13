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
      
    <section id="sub-page-hero" style="background-image:url(<?php echo $hero['url']; ?>);">
      <div class="wrapper">
       
        <div class="inner">
          <div><h1><?php echo $title; ?></h1></div>
        </div>
     
     </div> 
    </section>
     
     <?php
     include 'partials/_custom_content.php';    
     ?>
     
     <section class="content-block no-padding-top">
       <div class="wrapper">
         
         
         <?php
           echo do_shortcode( '
             [ajax_load_more_filters 
             id="students" 
             target="5959799049"]
           ' );
         ?>
        

      
         <div class="students-wrap">
          
           <?php
             echo do_shortcode( '
            [ajax_load_more 
             id="5959799049" 
             container_type="div" 
             repeater="template_4" 
             post_type="students" 
             posts_per_page="500"
             target="students"
             filters="true"
             scroll="false"
             order="ASC" 
             orderby="menu_order"
             ]
             ' );
           ?>
          
          

          

       
      </div> 
     </section>
     



<?php get_footer(); ?>
     

