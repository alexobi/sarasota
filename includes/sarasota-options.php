<?php
/*
Template Name: Sarasota
Template URI: http://www.dcigroup.com/
Description: Sarasota Theme Option Page
Author: Alexander Obi (DCI Group)
Author URI: http://www.dcigroup.com/
*/

//Define Option defaults
$simplefluid_options = array(
			    'header_title'=>'', 
                            'header_text'=>'',
                            'featured_article'=>'',
                            'latest_news'=>'',
                            'letter'=>'',
                            'fact_sheet'=>'',
                            'sign_up'=>'',
                            'facebook'=>'',
                            'twitter'=>'',
                            'footer_text'=>'',
                            'footer_logo'=>'',
                            'copyright'=>''
							);

$latest_news = get_categories();
$featured_posts = get_posts();


if ( is_admin() ) : // Load only if we are viewing an admin page

// Init theme options to white list our options
function simplefluid_register_settings(){
	register_setting( 'simplefluid_theme_options', 'simplefluid_options', 'simplefluid_validate' );
        
        wp_register_style( 'bootstrap_css', get_template_directory_uri().'/bootstrap/css/bootstrap.css' );
        wp_register_script('bootstrap', get_template_directory_uri().'/bootstrap/js/bootstrap.js', array('jquery'));
}
add_action('admin_init', 'simplefluid_register_settings' );


// Add menu page
function simplefluid_theme_options() {
	add_theme_page('Theme Options', 'Theme Options', 'edit_theme_options', 'theme_options', 'simplefluid_theme_option_page');
}
add_action('admin_menu', 'simplefluid_theme_options');

function admin_styles() {
       /*
        * It will be called only on your plugin admin page, enqueue our stylesheet here
        */
       wp_enqueue_style( 'bootstrap_css' );
       wp_enqueue_script( 'bootstrap');
   }
add_action('admin_enqueue_scripts', 'admin_styles');   

// Draw the menu page itself
function simplefluid_theme_option_page() {
	global $simplefluid_options, $featured_posts, $latest_news;

	if ( ! isset( $_REQUEST['updated'] ) )
		$_REQUEST['updated'] = false; // This checks whether the form has just been submitted. 
?>

<div class="wrap">

	<?php screen_icon(); echo "<h2>" . wp_get_theme() . __('Theme Options', 'simplefluid_options') . "</h2>";
	// This shows the page's name and an icon if one has been provided ?>

	<?php if ( false !== $_REQUEST['updated'] ) : ?>
	<div class="updated fade"><p><strong><?php _e('Options saved', 'simplefluid_options'); ?></strong></p></div>
	<?php endif; // If the form has just been submitted, this shows the notification ?>
    
    <form method="post" action="options.php">
    
    <?php $settings = get_option( 'simplefluid_options', $simplefluid_options ); ?>
	
	<?php settings_fields( 'simplefluid_theme_options' );
	/* This function outputs some hidden fields required by the form,
	including a nonce, a unique number used to ensure the form has been submitted from the admin page
	and not somewhere else, very important for security */ ?>
    
        <div id="accordion_wrap">  
<div class="panel-group" id="accordion">
  <div class="panel panel-success">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Sarasota Theme Header Options</a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
<div class="row"><div class="col-md-2">Header Title</div><div class="col-md-6"><textarea id="header_title" name="simplefluid_options[header_title]" class="form-control"><?php echo stripslashes($settings['header_title']); ?></textarea></div><div class="col-md-4">Paste in the Header Title</div></div>
          <br/>
          <hr/>
          <div class="row"><div class="col-md-2">Header Text</div><div class="col-md-6"><textarea id="header_text" name="simplefluid_options[header_text]" class="form-control"><?php echo stripslashes($settings['header_text']); ?></textarea></div><div class="col-md-4">Paste in the Header Text language</div></div>
      </div>
    </div>
  </div>
  <div class="panel panel-success">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Sarasota Theme Content Options</a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
        <div class="row"><div class="col-md-2">Featured Article</div>
            <div class="col-md-6">
                <select id="featured_article]" name="simplefluid_options[featured_article]" class="form-control">
                    <?php
					foreach ( $featured_posts as $featured_post ) :
						$label = $featured_post -> post_title;
						$selected = '';
						if ($featured_post -> ID == $settings['featured_article'] )
							$selected = 'selected="selected"';
						echo '<option style="padding-right: 10px;" value="' . $featured_post -> ID. '" ' . $selected . '>' . $label . '</option>';
					endforeach;
					?>
			</select>
            </div>
        <div class="col-md-4">Select an article to display on Homepage</div></div>
        <br/>
        <hr/>
         <div class="row"><div class="col-md-2">Latest News</div>
            <div class="col-md-6">
                <select id="latest_news" name="simplefluid_options[latest_news]" class="form-control">
                    <?php
					foreach ( $latest_news as $latest_new ) :
						$label = $latest_new -> cat_name;
						$selected = '';
						if ($latest_new -> cat_ID == $settings['latest_news'] )
							$selected = 'selected="selected"';
						echo '<option style="padding-right: 10px;" value="' . $latest_new -> cat_ID. '" ' . $selected . '>' . $label . '</option>';
					endforeach;
					?>
			</select>
            </div>
        <div class="col-md-4">Select Latest News category to display on the Homepage</div></div>
      </div>
    </div>
  </div>
  <div class="panel panel-success">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Sarasota Theme Sidebar Options</a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
          <div class="row"><div class="col-md-2">Letter to City Council</div><div class="col-md-6"><textarea id="letter" name="simplefluid_options[letter]" class="form-control"><?php echo stripslashes($settings['letter']); ?></textarea></div><div class="col-md-4">Paste in the letter Text</div></div>
          <br/>
          <hr/>
          <div class="row"><div class="col-md-2">Fact Sheet</div><div class="col-md-6"><textarea id="fact_sheet" name="simplefluid_options[fact_sheet]" class="form-control"><?php echo stripslashes($settings['fact_sheet']); ?></textarea></div><div class="col-md-4">Paste in the Fact Sheet Text</div></div>
          <br/>
          <hr/>
          <div class="row"><div class="col-md-2">Sign Up</div><div class="col-md-6"><textarea id="sign_up" name="simplefluid_options[sign_up]" class="form-control"><?php echo $settings['sign_up']; ?></textarea></div><div class="col-md-4">Paste in the publicaster signup Form</div></div>
          <br/>
          <hr/>
          <div class="row"><div class="col-md-2">Facebook URL</div><div class="col-md-6"><textarea id="facebook" name="simplefluid_options[facebook]" class="form-control"><?php echo $settings['facebook']; ?></textarea></div><div class="col-md-4">Paste in facebook URL</div></div>
          <br/>
          <hr/>
          <div class="row"><div class="col-md-2">Twitter URL</div><div class="col-md-6"><textarea id="twitter" name="simplefluid_options[twitter]" class="form-control"><?php echo $settings['twitter']; ?></textarea></div><div class="col-md-4">Paste in Twitter URL</div></div>
      </div>
    </div>
  </div>
  <div class="panel panel-success">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Sarasota Theme Footer Options</a>
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse">
      <div class="panel-body">
        <div class="row"><div class="col-md-2">Sarasota Footer Text</div><div class="col-md-6"><textarea id="footer_text" name="simplefluid_options[footer_text]" class="form-control"><?php echo stripslashes($settings['footer_text']); ?></textarea></div><div class="col-md-4">Paste in sarasota footer Text</div></div>
        <br/>
        <hr/>
        <div class="row"><div class="col-md-2">Copyright Text</div><div class="col-md-6"><textarea id="copyright" name="simplefluid_options[copyright]" class="form-control"><?php echo stripslashes($settings['copyright']); ?></textarea></div><div class="col-md-4">Paste in the Copyright Text</div></div>
        <br/>
        <hr/>
        <div class="row"><div class="col-md-2">Footer Logo URL</div><div class="col-md-6"><textarea id="footer_logo" name="simplefluid_options[footer_logo]" class="form-control"><?php echo stripslashes($settings['footer_logo']); ?></textarea></div><div class="col-md-4">Paste in the footer logo URL</div></div>
      </div>
    </div>
  </div>
</div>
    	
        <p class="submit">
        	<?php submit_button('Save Options','primary','submit', false); ?> 
        </p>
    </form>
	
   </div>
	<?php
}

function simplefluid_validate( $input ) {
	global $simplefluid_options;

	$settings = get_option( 'simplefluid_options', $simplefluid_options );
	
	// We strip all tags from the text field, to avoid vulnerablilties like XSS
	$input['logo_url'] =  $input['logo_url'] ;
	
	// We strip all tags from the text field, to avoid vulnerablilties like XSS
	$input['facebook_url'] =  $input['facebook_url'];
	
	// We strip all tags from the text field, to avoid vulnerablilties like XSS
	$input['twitter_url'] =  $input['twitter_url'] ;
	
	// We strip all tags from the text field, to avoid vulnerablilties like XSS
	$input['google_url'] = $input['google_url'];
	
	// We strip all tags from the text field, to avoid vulnerablilties like XSS
	$input['jumbo_title'] = wp_filter_post_kses( $input['jumbo_title'] );
	
	// We strip all tags from the text field, to avoid vulnerablilties like XSSs
	$input['jumbo_text'] = $input['jumbo_text'] ;
	
	// We strip all tags from the text field, to avoid vulnerablilties like XSS
	$input['jumbo_btn_url'] =  $input['jumbo_btn_url'];
	
	return $input;
}

endif;  // EndIf is_admin()