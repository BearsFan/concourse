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
      $args = array( 
          'post_type' => 'post', 
          'posts_per_page' => 1, 
          'order'=> 'ASC',
          'orderby'=> 'menu_order'
      );
      $latestpost = new WP_Query($args);
   
      if ($latestpost) {          
        while( $latestpost->have_posts() ): $latestpost->the_post(); 
        $type = get_field('type');
         $posttags = get_the_tags(); 
        $quote = get_field('quote');
        $post_date = get_the_date( 'F j, Y' ); 
        $teaser = get_the_excerpt();
        $url = get_field('third_party_url');
        ?>
     
        <section class="two-cols news-rows no-padding-bottom news-big-row">
          <div class="wrapper">
            
            <h3>Featured Story</h3>
    
           <div class="row featured-row">
             <div class="col">
               <div class="news-item ">
                 
                 <?php if ($url) { ?>
                                   <a href="<?php echo $url; ?>" target="_blank"><?php echo get_the_post_thumbnail( $post_id, 'full' );  ?></a>
                                   <?php }
                                   else { ?>
                                   <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_post_thumbnail( $post_id, 'full' );  ?></a>
                 <?php } ?>
                 
                
               </div>
             </div>
             <div class="col">
               <div class="news-item big">
                   <p class="date"><?php echo $post_date;?> | <span style="text-transform:uppercase;"><?php if ($posttags) {
                   foreach($posttags as $tag) {
    	             echo $tag->name . '<span>, </span> '; 
	               }
              } ?></span></p>
                   <?php if ($url) { ?>
                                     <a href="<?php echo $url; ?>" target="_blank"><?php the_title(); ?></a>
                                     <?php }
                                     else { ?>
                                     <a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a>
                   <?php } ?>
                   
                   <div class="teaser"><?php echo $teaser; ?></div>
               </div>
             </div>
           </div>
    
          </div>
        </section>
     
        <?php  
        endwhile; /* end secondary loop */
     
      }
     ?>
  
  


     <section class="three-cols news-cols">
        <div class="wrapper">   
           
            <div class="filter"><span>Filter</span>
            <?php           
           echo do_shortcode('
           [ajax_load_more_filters 
           id="news" 
           target="newslist"
           ]');          
           ?>         
           </div>  
           
          <div class="row">
         
              <?php              
              echo do_shortcode('
              [ajax_load_more 
              id="news_items" 
              repeater="template_5" 
              post_type="post" 
              posts_per_page="9" 
              offset="1" 
              scroll="false"
              id="newslist"
              filter="news"
              orderby="menu_order"
              ]');
              ?>
           
          </div>
          
        </div>
      </section>
    



<?php get_footer(); ?>