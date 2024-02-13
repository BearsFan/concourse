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
     



<?php get_footer(); ?>