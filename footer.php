<?php
$footerlogo = get_field('footer_logo','option');
$footerlogo2 = get_field('footer_logo2','option');
$address = get_field('address','option');

?>

    

   <footer>  
     <div class="wrapper">
       
       <div>
         <span><img src="<?php echo $footerlogo['url']; ?>" alt="<?php echo $footerlogo['alt']; ?>" /></span>
         <p><?php echo $address; ?></p>
       </div>
       
      
       
       <div>
         <span><img src="<?php echo $footerlogo2['url']; ?>" alt="<?php echo $footerlogo2['alt']; ?>" /></span>
       </div>
       
     </div>     
   </footer>
   
   <?php wp_footer(); ?>
   
   </body>
   </html>