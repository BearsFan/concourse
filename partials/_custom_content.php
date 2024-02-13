<?php

// Check value exists.
if( have_rows('content_blocks') ):

    // Loop through rows.
    while ( have_rows('content_blocks') ) : the_row();


     // Case: Carousel 
        if( get_row_layout() == 'carousel' ):
            $slides = get_sub_field('slide');
            if( $slides ) {
              ?>
              <section class="slider-section">
                <div class="wrapper ">     
                  <div class="slider">
                    <?php
                    foreach( $slides as $slide ) {
                     $quote = $slide['quote']; 
                     $author = $slide['author']; 
                     ?>
                    <div class="slide">
                      <p class="quote"><?php echo $quote; ?></p>
                      <p class="author"><?php echo $author; ?></p>
                    </div>
                     <?php
                }
            }
            
        ?>
                 </div>
        
        <?php
        if ($buttonurl) { ?>
        <a href="<?php echo $buttonurl; ?>" class="btn"><?php echo $buttontext; ?></a>
        <?php  
        }
        ?>
           
           
        </div> 
       </section>
       
      <?php 
         // Case: Image SLideshow
         elseif( get_row_layout() == 'image_slideshow' ):
             $imageslides = get_sub_field('images');
             if( $imageslides ) {
               ?>
               <section class="slider-section image-slideshow">
                 <div class="wrapper ">     
                   <div class="slider">
                     <?php
                     foreach( $imageslides as $imageslide ) {
                      $caption = $imageslide['caption']; 
                      $image = $imageslide['image']; 
                      ?>
                     <div class="slide">
                       <div class="wrap">
                         <img src="<?php echo $image['url']; ?>" />
                         <p class="caption"><?php echo $caption; ?></p>
                       </div>
                     </div>
                      <?php
                 }
             }
            
         ?>
          </div>
        
                    
           
         </div> 
        </section>
             
        <?php
            
        // Case: Regular Bucket.
        elseif( get_row_layout() == 'regular_content_bucket' ): 
            $bucket = get_sub_field('bucket');
            $border = get_sub_field('show_border_on_bottom');
            $grey = get_sub_field('make_background_grey');
            $squeeze = get_sub_field('squeeze_content');
            $alignleft = get_sub_field('align_content_left');
            $remove = get_sub_field('remove_top_and_bottom_padding');
            $removet = get_sub_field('remove_top_padding');
            $removeb = get_sub_field('remove_bottom_padding');
            ?>
            
            <section class="content-block  
            <?php if ($remove == 1) {echo 'remove';} ?> 
            <?php if ($removet == 1) {echo 'removet';} ?> 
            <?php if ($removeb == 1) {echo 'removeb';} ?> 
            <?php if ($grey == 1) {echo 'bg-gray';} ?> 
            <?php if (!is_front_page()) {echo 'subpage';} ?>"
            >
              <div class="wrapper <?php if ($border == 1) {echo 'border-bottom';} ?> <?php if ($squeeze == 1) {echo 'squeeze';} ?> <?php if ($alignleft == 1) {echo 'align-left';} ?>">       
                <?php echo $bucket; ?>       
             </div> 
            </section>
            <?php
            
        // 2 Column Block Layout
        elseif( get_row_layout() == '2_column_block_layout' ): 
                $left_block = get_sub_field('left_block');
                $left_block_type = get_sub_field('left_block_type');
                $right_block = get_sub_field('right_block');
                $right_block_type = get_sub_field('right_block_type');
                $title = get_sub_field('title');
                $lbt = 'content';
                $rbt = 'content';
                if ($left_block_type == 'Image') {
                    $lbt = 'image';
                }
                if ($right_block_type == 'Image') {
                    $rbt = 'image';
                }
                $showborder = '';
                $border = get_sub_field('bottom_border');
                if ($border == 1) {
                  $showborder = 'border-bottom';
                }
                $bgcolor = get_sub_field('bgcolor');
                ?>
            
              <section class="blocks" style="background-color:#<?php if ($bgcolor) { echo $bgcolor; } else {echo 'fff'; } ?>" >
                <div class="wrapper <?php echo $showborder; ?>">
                  
                  <?php
                  if ($title) { ?>
                    <h2 class="title"><span><?php echo $title; ?></span></h2>
                  <?php
                  }
                  ?>
                  
                  
                  <div class="blocks">
       
                    <div class="block <?php echo $lbt; ?>">
                       <?php echo $left_block; ?>
                    </div>
                    <div class="block <?php echo $rbt; ?>">
                      <?php echo $right_block; ?>
                    </div>
                    
                  </div>
       
               </div> 
              </section>
        <?php  
        
        // 2 Column Block Layout with Rotating Images
        elseif( get_row_layout() == '2_column_block_layout_with_rotators' ): 

                $right_block = get_sub_field('right_block');
                $title = get_sub_field('title');
              
                $showborder = '';
                $border = get_sub_field('bottom_border');
                if ($border == 1) {
                  $showborder = 'border-bottom';
                }
                $bgcolor = get_sub_field('bgcolor');
                $images = get_sub_field('random_images');
                ?>
            
              <section class="blocks" style="background-color:#<?php if ($bgcolor) { echo $bgcolor; } else {echo 'fff'; } ?>" >
                <div class="wrapper <?php echo $showborder; ?>">
                  
                  <?php
                  if ($title) { ?>
                    <h2 class="title"><span><?php echo $title; ?></span></h2>
                  <?php
                  }
                  ?>
                  
                  
                  <div class="blocks">
       
                    <div class="block image">
                       <div id="pick-one">
                         <?php
                         foreach( $images as $image ) {
                          $url = $image['url']; 
                          $image = $image['image']; 
                          ?>
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="onlyone" />  
                            <?php }
                            ?>
                       </div>
                    </div>
                    <div class="block content">
                      <?php echo $right_block; ?>
                    </div>
                    
                  </div>
       
               </div> 
              </section>
        <?php  
        
        // 3 Column Block Layout
        elseif( get_row_layout() == '3_column_block_layout' ): 
                $left_block = get_sub_field('left_block');
                $right_block = get_sub_field('right_block');
                $center_block = get_sub_field('center_block');
                $topcontent = get_sub_field('top_content');
                $bgcolor = get_sub_field('bgcolor');
                ?>
            
              <section class="blocks" style="background-color:#<?php if ($bgcolor) { echo $bgcolor; } else {echo 'fff'; } ?>" >
                <div class="wrapper <?php echo $showborder; ?>">
                  
                  <?php
                  if ($topcontent) { ?>
                   <?php echo $topcontent; 
                  }
                  ?>
                  
                  
                  <div class="blocks threecol">
       
                    <div class="block content">
                       <?php echo $left_block; ?>
                    </div>
                    <div class="block content">
                       <?php echo $center_block; ?>
                    </div>
                    <div class="block content">
                      <?php echo $right_block; ?>
                    </div>
                    
                  </div>
       
               </div> 
              </section> 
      
      
      <?php     
      
      // Page Highlight Blocks
      elseif( get_row_layout() == 'page_highlight_blocks' ): 
              $pages = get_sub_field('pages');  
              $columns = get_sub_field('two_column_or_three_column');
              $content = get_sub_field('content_below_columns');
              $hide = get_field('hide_apply_now_button');
              ?>
          
            <section class="blocks <?php if ($hide == '1') {echo 'hide-apply-now'; } ?>" >
              <div class="wrapper">
                
                
                <div class="pageblocks <?php echo $columns; ?>">
                  
                  <?php
                  foreach( $pages as $mypage ) {
                   $name = $mypage['name']; 
                   $description = $mypage['description']; 
                   $url = $mypage['url']; 
                   $image = $mypage['image']; 
                   
           
                   
                   ?>
                   
                     <div class="pageblock ">
                         <a href="<?php echo $url; ?>">
                           <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                           <img src="/wp-content/themes/hasts/img/icons/plus.png" alt="Plus" class="icon"/>
                         </a>
                         <h4><?php echo $name; ?></h4>
                         <p><?php echo $description; ?></p>
                     </div>
                   
                     <?php }
                     ?>
                     
                </div>
                
                <div class="below-content">
                  <?php echo $content; ?>
                </div>
     
             </div> 
            </section> 
    
    
    <?php     
    
    // Quote
    elseif( get_row_layout() == 'quote' ): 
            $quote = get_sub_field('quote');
            $author = get_sub_field('author');

            ?>
        
          <section class="quote">
            <div class="wrapper">
              
              <h3><?php echo $quote; ?></h3>           
              <h4><?php echo $author; ?></h4>
              
   
           </div> 
          </section> 
  
  
   <?php 
   
   // 1 Column BlockAccordion   
   elseif( get_row_layout() == '1_column_block_layout_accordion' ): 
     $accordions = get_sub_field('accordions');
     $accordion_header = get_sub_field('accordion_header');
   ?>
  
    <section class="blocks full-width full-width-accordions">
      <div class="wrapper">

          <div class="block ">
            <div class="accordions">

             <h2 class="red"><?php echo $accordion_header; ?></h2>
             <?php
             if ($accordions) {
               foreach( $accordions as $acc ) {
                $label = $acc['label']; 
                $content = $acc['content']; 
                ?>
              <div class="accordion">
                <span class="text"><?php echo $label; ?></span><span class="plus">+</span><span class="minus">-</span>
                <div class="content">
                 <?php echo $content; ?>
                </div>
              </div>
                <?php
              }
             }
             ?>
    
            </div> <!-- end accordions -->
          </div>
        
     </div> 
    </section>


<?php     

 // Image Row
 elseif( get_row_layout() == 'image_row' ): 
         $images = get_sub_field('image');      
         ?>
     
       <section class="image_row">
         <div class="wrapper">
           
          <?php
          if ($images) {
            foreach( $images as $img ) {
             $file = $img['image']; 
             ?>
           <div class="image">
             <img src="<?php echo $file['url']; ?>" alt="<?php echo $file['alt']; ?>" />           
           </div>
             <?php
           }
          }
          ?>
           

        </div> 
       </section> 


<?php 
            
        endif;

    // End loop.
    endwhile;

// No value.
else :
    // Do something...
endif;