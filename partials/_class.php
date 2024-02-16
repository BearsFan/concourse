                  <div class="class">
                    <img src="<?php echo $image['sizes']['class']; ?>" alt="<?php echo $image['alt']; ?>" />
                    <div class="top">
                      <?php if ($url) { ?>
                        <a href="<?php echo $url; ?>" target="_blank"><?php echo $number; ?></a>
                      <?php }
                      else { ?>
                        <span class="number"><?php echo $number; ?></span>
                      <?php }
                      ?>
                      <span><?php echo $type; ?></span>
                    </div>
                    <a href="<?php echo $link; ?>" class="title"><?php echo $name; ?></a>
                    <?php
                    if ($instructor) { ?>
                      <p class="instructor"><strong>Faculty:</strong> <?php echo $instructor; ?></p>
                    <?php }
                    ?>
                    <div class="teaser">
                      <?php
                      if ($teaser) { ?>
                        <div class="text cutoff"><?php echo $teaser; ?><p><a href="<?php echo $link; ?>">Read more</a></p></div>
                        <p class="readmore"><img src="/wp-content/themes/concourse/img/plus.png" alt="Read more" /></p>
                      <?php }
                      ?>        
                      
                    </div>
                  </div>