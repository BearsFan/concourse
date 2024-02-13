<?php
/**
 * The main template file
 *
 * @package WordPress
 * @subpackage Site Name
 */

get_header(); ?>

      
     		<?php if ( have_posts() ) : ?>

     			<?php
     			// Start the loop.
     			while ( have_posts() ) : the_post();
            
     				the_content();

     			// End the loop.
     			endwhile;

     			
     		// If no content, include the "No posts found" template.
     		else :
     			
     		endif;
     		?>
      



<?php get_footer(); ?>