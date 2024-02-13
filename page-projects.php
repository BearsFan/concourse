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
$blurb = get_field('blurb', 'option');

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
    
    <section class="books-slider">
      <div class="wrapper">
        
        <h3>Alumni Books</h3>
    
      <div id="books">
        
     <?php
     $my_query = new WP_Query( array(
       'showposts' => '1000', 
       'post_type' => 'book',  
       'meta_key' => 'show_in_projects_slider',
       'meta_value' => true
       )
     );
     
     while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
       
        <?php
              $first = get_field('first_name', $post->ID);
              $last = get_field('last_name', $post->ID);
              $title = get_field('book_title', $post->ID);
              $year = get_field('publication_year',  $post->ID);
              $additional = get_field('additional',  $post->ID);
              $publisher_website = get_field('publisher_website',  $post->ID);
              $image = get_field('image', $post->ID);
              ?>
     

           <div class="book">
             <div class="wrap">
               <div class="left">
               <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
               </div>
               <div class="right">
               <p class="blurb"><?php echo $blurb; ?></p>
               <p class="btn"><a href="/alumni-books"><button>Read On</button></a></p>
               </div>
             </div>
           </div>

        <?php  
        endwhile; /* end secondary loop */
     
      
     ?>
  
     </div>

    </div>
  </section>
  


     <section class="research-projects">
        <div class="wrapper">   
          
           <h3>Research Projects</h3>
           
           <div class="projects">
              <?php              
              echo do_shortcode('
              [ajax_load_more 
              id="projects" 
              repeater="template_6" 
              post_type="project" 
              posts_per_page="4" 
              scroll="false"
              order="ASC" orderby="menu_order"
              ]');
              ?>
           </div>

          
        </div>
      </section>
    



<?php get_footer(); ?>