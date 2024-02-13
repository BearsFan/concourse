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
     
   
     
     <section class="content-block alumni-books">
       <div class="wrapper">
         
         
            <div class="filter">
           
           
         
            <?php
              echo do_shortcode( '
                [ajax_load_more_filters 
                id="alumnibooks" 
                target="5959799044"]
              ' );
            ?>
          </div>
        
         
         
         <div class="classtable">
           
         
         
           
         
           <?php
          echo do_shortcode( '
            [ajax_load_more 
            id="5959799044" 
            repeater="template_7" 
            post_type="book" 
            posts_per_page="20"
            target="alumnibooks"
            filters="true"
            scroll="false"
            order="ASC" 
            orderby="menu_order"
            transition_container="false"
            container_type="table" 
            ]
            
  
            
          ' );
        ?>
              
       
        
        
        
        
        
      </div>
 
         
       

       
      </div> 
     </section>
     



<?php get_footer(); ?>
     

