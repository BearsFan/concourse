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

    <section id="sub-page-hero" class="<?php echo $section; ?> news" >
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
              offset="0" 
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