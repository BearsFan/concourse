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
     



<?php get_footer(); ?>