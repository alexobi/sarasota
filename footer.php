<?php 
/*
 * @file           footer.php
 * @package        Sarasota
 * @author         DCI group
 * @copyright      2013 DCI Group
 * @version        Release: 1.0
*/

    global $simplefluid_options;
    $settings = get_option( 'simplefluid_options', $simplefluid_options );
    $footer_text = $settings['footer_text'];
    $footer_logo = $settings['footer_logo'];
    $copyright = $settings['copyright'];
?>                      
    </div>
</section>
    <footer id="footer" class="row">
        <div class="container">
            <div class="col-md-4">
                <p class="partnership_lang">
                <?php if($footer_text != '') { 
                        echo $footer_text; } 
                      else {?>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nunc purus, sodales ac nisl quis, lobortis laoreet dui. In sit amet cursus lorem. Nam non nisi gravida, ultricies dui id, facilisis nisi.
                <?php } ?>
                </p>
            </div>
            
            <div class="col-md-4 col-md-offset-4">
                <div class="florida_logo">
                    <?php if($footer_logo != '') { ?>
                    <img src="<?php echo $footer_logo; ?>" />
                    <?php } else {?>
                    <img src="<?php echo get_template_directory_uri();?>/images/florida_logo2.png" />
                    <?php } ?>
                </div>
            </div>
        </div>
    </footer>
    <div id="copyright">
            <div class="container">
                <p class="container">
                    <?php if($copyright != '') { 
                            echo $copyright; 
                    } else {?>
                        Copyright &COPY; Sarasota 2013
                    <?php } ?>
                </p>
            </div>
   </div> 
         <?php  wp_footer(); ?>
        </div><!--End of div#wrap -->
    </body>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/lib/jquery-2.0.3.js" > </script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/bootstrap/js/bootstrap.js"> </script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/lib/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/lib/jquery.lavalamp.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/sarasota.js"> </script>
</html>

