<?php
/**
 * The main template file
 *
 * @package WordPress
 * @subpackage Alletess
 */

get_header(); 

?>
      

    <section class="content-block search-form bg-gray">
      <div class="wrapper ">       
        <form action="/" method="get">
            <input type="text" name="s" id="searchfield" placeholder="Search" value="<?php the_search_query(); ?>" style="border-bottom:1px solid #000;" />
            <input type="submit" alt="Search" value="Submit" id="searchsubmit" class="btn" />
        </form>
     </div> 
    </section>
    
    <section class="search-bar">
      <div class="wrapper">
      
          <h2>Search Results</h2>
      
      </div>
    </section>
    
    
  <?php
  
  $didwe = htmlspecialchars($_GET["s"]);
  
  if ($didwe) {
  
  ?>
     
   
   <section id="search-results">
     <div class="wrapper">
    
          <div class="search-results-header">
           <h1>Search Results for "<?php echo htmlspecialchars($_GET["s"]); ?>"</h1>
         </div>
     

       
 <?php


 if( have_posts() ){
     $types = array ('page','posts','students','alumni','faculty','book','project');
     $searchterm = $_GET['s'];
 
     foreach( $types as $type ){

         $search_args = array(
           'posts_per_page'    => 1000,
           's' => $searchterm,
           'paged'             => $paged,
           'post_status'       => 'publish',
           'post_type'         => $type
         );

         $search_query = new WP_Query($search_args);

         if( $search_query->have_posts() ) : 
       
           $print = '';
           if ($type == 'page') {
             $print = 'Website';
           }
           else if ($type == 'posts') {
             $print = 'News';
           }
           else if ($type == 'students') {
             $print = 'Students';
           }
           else if ($type == 'alumni') {
             $print = 'Alumni';
           }
           else if ($type == 'faculty') {
             $print = 'Faculty';
           }
           else if ($type == 'book') {
             $print = 'Alumni Books';
           }
           else if ($type == 'project') {
             $print = 'Projects';
           }
        
       
           echo '<div class="col"><h2>from ' . $print . '</h2><ul class="search-results">';

         
             
         while( $search_query->have_posts() ): $search_query->the_post();
             if( $type == get_post_type() ) : ?>
                   <li>
                     <div id="post-<?php the_ID(); ?>" class="search-result">
                          <?php 
                          if ($type == 'news') {
                            $post_date = get_the_date( 'F j, Y' );
                            echo '<p>' . $post_date . '</p>';
                          }
                          
                          $link = '';
                          
                          if ( $type == 'faculty') {
                            $link = '/faculty/' ;
                          }
                          
                          else if ( $type == 'alumni') {
                            $link = '/alumni/' ;
                          }
                          
                          else if ( $type == 'book') {
                            $link = '/alumni-books/' ;
                          }
                          else {
                            $link = get_the_permalink();
                          }
                          
                          
                          
                          
                          ?>
                          
                          
                          
                          <a href="<?php echo $link; ?>">
                              <?php 
                              $title = get_the_title(); 
                              $keys    = explode(" ",$searchterm); 
                              $title = preg_replace(
                                  '/('.implode('|', $keys) .')/iu', 
                                  '<strong class="search-excerpt">\0</strong>', 
                                  $title
                              ); 
                              echo $title;
                              //the_title( '<span class="entry-title">', '</span>' ); 
                              ?>
                          </a>
                            
                       
                      </div><!-- #post-${ID} -->
                   </li>
                 <?php
                 endif; 
           endwhile;
       
           echo '</ul></div>';
       
           endif;
       
       
         ?>
          
     <?php 

      
     }  // end foreach
     } // end if have posts

      ?>
 
       </div>
       
   
     </section>
 
     
  <?php
  }
  else { ?>
    
 <section>
   <div class="wrapper">
     <br/><br/><br/><br/><br/><br/><br/>
     <br/><br/><br/><br/><br/><br/><br/>
     <br/><br/><br/><br/><br/><br/><br/>
     <br/><br/><br/><br/><br/><br/><br/>
   </div>
 </section>
 
 <?php    
    
  }
  ?> 



<?php get_footer(); ?>