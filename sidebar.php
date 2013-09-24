<?php 
/**
 * Sidebar Template
 *
 *
 * @file           sidebar.php
 * @package        Sarasota
 * @author         DCI group
 * @copyright      2013 DCI Group
 * @version        Release: 1.0
 * 
 */
    global $simplefluid_options;
    $settings = get_option( 'simplefluid_options', $simplefluid_options );
    $letter = $settings['letter'];
    $fact = $settings['fact_sheet'];
    $signUp = $settings['sign_up'];
    $facebook = $settings['facebook'];
    $twitter = $settings['twitter'];
?>       
<aside id="sidebar" class="col-md-4">
         <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Letter to Sarasota City Council</h3>
            </div>
            <div class="panel-body">
                <?php if ($letter != '') {
                    echo $letter; } 
                    else {?>
                    <ul>
                        <li><a href="#">Morbi nec urna adipiscing, dignissim mi a, convallis lorem.</a></li>
                        <li><a href="#">Phasellus facilisis orci vel purus iaculis accumsan.</a></li>
                        <li><a href="#">Donec vel sem tincidunt, vehicula tortor a, faucibus dolor.</a></li>
                    </ul>
                <?php } ?>
            </div>
       </div>
   
     <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Fact Sheet</h3>
        </div>
        <div class="panel-body">
             <?php if ($fact != '') {  
                    echo $fact; 
                    } else {  ?> 
                        <ul>
                            <li><a href="#">Morbi nec </a></li>
                            <li><a href="#">Phasellus facilisis</a></li>
                            <li><a href="#">Donec vel sem</a></li>
                            <li><a href="#">Vestibulum eleifend</a></li>
                        </ul>
                  <?php }?> 
        </div>
     </div>
     
     <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Sign Up for Updates</h3>
        </div>
        <div class="panel-body">
            <?php if ($signUp != '') { 
                    echo $signUp; 
                  } else { ?>
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Email Address">
                            <span class="input-group-btn">
                                <button class="btn btn-sm" type="button">Submit</button>
                            </span>
                        </div>
                    </form>  <?php } ?> 
       </div>
    </div>
     
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Follow Us on</h3>
            </div>
            <div class="panel-body">
                <ul class="social-network">
                    <?php if ($facebook != '' || $twitter != '') {?> 
                    <li><a href="<?php echo $facebook; ?>"><img src="<?php echo get_template_directory_uri();?>/images/facebook2.png" /></a></li>
                    <li><a href="<?php echo $twitter; ?>"><img src="<?php echo get_template_directory_uri();?>/images/twitter2.png" /></a></li>
                    <?php } else { ?>
                    <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook2.png" /></a></li>
                    <li><a href="#"><img src="<?php echo get_template_directory_uri();?>/images/twitter2.png" /></a></li>
                     <?php } ?> 
                </ul> 
            </div>
        </div>
                    
    <?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
        <?php dynamic_sidebar( 'sidebar' ); ?>
    <?php endif; ?>                      
</aside>