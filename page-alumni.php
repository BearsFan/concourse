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
         
         <div class="filter">
           
           
         
         <?php
           echo do_shortcode( '
             [ajax_load_more_filters 
             id="alumni" 
             target="5959799043"]
           ' );
         ?>
       </div>
        

      
      <div class="alumni-wrap">
          
                <?php
                  echo do_shortcode( '
                 [ajax_load_more 
                  id="5959799043" 
                  container_type="div" 
                  repeater="template_2" 
                  post_type="alumni" 
                  posts_per_page="21"
                  target="alumni"
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
     

