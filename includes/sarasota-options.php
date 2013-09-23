<?php

$sarasota_header_option = array(
                            'header_title'=>'', 
                            'header_text'=>''
                            );
$sarasota_content_option = array(
                            'featured_article'=>'',
                            'latest_news'=>''
                            );
$sarasota_sidebar_option = array(
                            'letter'=>'',
                            'fact_sheet'=>'',
                            'sign_up'=>'',
                            'facebook'=>'',
                            'twitter'=>''
                            );
$sarasota_footer_option = array(
                            'footer_text'=>'',
                            'footer_logo'=>'',
                            'copyright'=>''
);

$sarasota_options = array ($sarasota_header_option, $sarasota_content_option, $sarasota_sidebar_option, $sarasota_footer_option);
$latest_news = get_categories();
$featured_posts = get_posts();

if ( is_admin() ) : // Load only if we are viewing an admin page

// Init theme options to white list our options
function register_settings(){
	register_setting( 'sarasota_theme_options', 'sarasota_options', 'sarasota_options_validate' );
        wp_register_style( 'bootstrap_css', get_template_directory_uri().'/bootstrap/css/bootstrap.css' );
        wp_register_style( 'admin_css', get_template_directory_uri().'/css/admin-style.css' );
        wp_register_script('bootstrap', get_template_directory_uri().'/bootstrap/js/bootstrap.js', array('jquery'));
 
}
add_action('admin_init', 'register_settings' );


// Add menu page
function theme_options() {
	add_theme_page('Theme Options', 'Theme Options', 'edit_theme_options', 'theme_options', 'sarasota_theme_option_page');
}
add_action('admin_menu', 'theme_options');

function admin_styles() {
       /*
        * It will be called only on your plugin admin page, enqueue our stylesheet here
        */
       wp_enqueue_style( 'bootstrap_css' );
       wp_enqueue_style( 'admin_css' );
       wp_enqueue_script( 'bootstrap');
   }
add_action('admin_enqueue_scripts', 'admin_styles');   


// Draw the menu page itself
function sarasota_theme_option_page() {
	global $sarasota_options, $latest_news, $featured_posts;

	if ( ! isset( $_REQUEST['updated'] ) )
		$_REQUEST['updated'] = false; // This checks whether the form has just been submitted. 
?>

<div class="wrap">

	<?php screen_icon(); echo "<h2>" . wp_get_theme() . __('Theme Options', 'sarasota_options') . "</h2>";
	// This shows the page's name and an icon if one has been provided ?>

	<?php if ( false !== $_REQUEST['updated'] ) : ?>
	<div class="updated fade"><p><strong><?php _e('Options saved', 'sarasota_options'); ?></strong></p></div>
	<?php endif; // If the form has just been submitted, this shows the notification ?>
    
        <form method="post" action="options.php">
            <h5>Edit Home Page Settings for the Sarasota Theme</h5>
    <?php $settings = get_option( 'sarasota_options', $sarasota_options ); ?>
	
	<?php settings_fields( 'sarasota_theme_options' );
	/* This function outputs some hidden fields required by the form,
	including a nonce, a unique number used to ensure the form has been submitted from the admin page
	and not somewhere else, very important for security */ ?>
<div id="accordion_wrap">  
<div class="panel-group" id="accordion">
  <div class="panel panel-success">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          Sarasota Header Theme Option
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
          <div class="row"><div class="col-md-2">Header Title</div><div class="col-md-6"><input id="header_title" class="form-control" name="sarasota_options[sarasota_header_option[header_title]]" type="text" value="<?php esc_url($settings[$sarasota_header_option['header_title']]); ?>" /> </div><div class="col-md-4">Paste in the Header Title</div></div>
          <br/>
          <hr/>
          <div class="row"><div class="col-md-2">Header Text</div><div class="col-md-6"><textarea id="header_text" name="sarasota_options[sarasota_header_option[header_text]" class="form-control"><?php echo stripslashes($settings[$sarasota_header_option['header_text']]); ?></textarea></div><div class="col-md-4">Paste in the Header Text language</div></div>
      </div>
    </div>
  </div>
  <div class="panel panel-success">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
           Sarasota Content Theme Option
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
        <div class="row"><div class="col-md-2">Featured Article</div>
            <div class="col-md-6">
                <select id="featured_article]" name="sarasota_options[sarasota_content_option[featured_article]]" class="form-control">
                    <?php
					foreach ( $featured_posts as $featured_post ) :
						$label = $featured_post -> post_title;
						$selected = '';
						if ($featured_post -> ID == $settings[$sarasota_content_option['featured_article']] )
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
                <select id="latest_news" name="sarasota_options[sarasota_content_option[latest_news]]" class="form-control">
                    <?php
					foreach ( $latest_news as $latest_new ) :
						$label = $latest_new -> cat_name;
						$selected = '';
						if ($latest_new -> cat_ID == $settings[$sarasota_content_option['latest_news']] )
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
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
           Sarasota Sidebar Theme Option
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
          <div class="row"><div class="col-md-2">Letter to City Council</div><div class="col-md-6"><textarea id="letter" name="sarasota_options[sarasota_sidebar_option[letter]" class="form-control"><?php echo stripslashes($settings[$sarasota_sidebar_option['letter']]); ?></textarea></div><div class="col-md-4">Paste in the letter Text</div></div>
          <br/>
          <hr/>
          <div class="row"><div class="col-md-2">Fact Sheet</div><div class="col-md-6"><textarea id="fact_sheet" name="sarasota_options[sarasota_sidebar_option[fact_sheet]" class="form-control"><?php echo stripslashes($settings[$sarasota_sidebar_option['fact_sheet']]); ?></textarea></div><div class="col-md-4">Paste in the Fact Sheet Text</div></div>
          <br/>
          <hr/>
          <div class="row"><div class="col-md-2">Facebook URL</div><div class="col-md-6"><input id="facebook" class="form-control" name="sarasota_options[sarasota_sidebar_option[facebook]]" type="text" value="<?php esc_url($settings[$sarasota_header_option['facebook']]); ?>" /> </div><div class="col-md-4">Paste in facebook URL</div></div>
          <br/>
          <hr/>
          <div class="row"><div class="col-md-2">Twitter URL</div><div class="col-md-6"><input id="twitter" class="form-control" name="sarasota_options[sarasota_sidebar_option[twitter]]" type="text" value="<?php esc_url($settings[$sarasota_sidebar_option['twitter']]); ?>" /> </div><div class="col-md-4">Paste in Twitter URL</div></div>
      </div>
    </div>
  </div>
  <div class="panel panel-success">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
           Sarasota Footer Theme Option
        </a>
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse">
      <div class="panel-body">
        <div class="row"><div class="col-md-2">Sarasota Footer Text</div><div class="col-md-6"><textarea id="footer_text" name="sarasota_options[sarasota_footer_option[footer_text]" class="form-control"><?php echo stripslashes($settings[$sarasota_footer_option['footer_text']]); ?></textarea></div><div class="col-md-4">Paste in sarasota footer Text</div></div>
        <br/>
        <hr/>
        <div class="row"><div class="col-md-2">Copyright Text</div><div class="col-md-6"><input id="copyright" class="form-control" name="sarasota_options[sarasota_footer_option[copyright]]" type="text" value="<?php esc_url($settings[$sarasota_footer_option['copyright']]); ?>" /> </div><div class="col-md-4">Paste in the Copyright Text</div></div>
        <br/>
        <hr/>
        <div class="row"><div class="col-md-2">Footer Logo URL</div><div class="col-md-6"><input id="footer_logo" class="form-control" name="sarasota_options[sarasota_footer_option[footer_logo]]" type="text" value="<?php esc_url($settings[$sarasota_footer_option['footer_logo']]); ?>" /> </div><div class="col-md-4">Paste in the footer logo URL</div></div>
      </div>
    </div>
  </div>
</div>
<p class="submit">
<?php submit_button('Save Options','primary','submit', false); ?>
    &nbsp;
<?php submit_button('Reset Options','secondary','reset', false); ?> 
</p>
</form>	
</div>
</div>
<?php } 
function simplefluid_validate( $input ) {
	
        global $sarasota_options;

	$settings = get_option( 'sarasota_options', $sarasota_options );
	
	// We strip all tags from the text field, to avoid vulnerablilties like XSS
	$input['copyright'] =  $input['copyright'] ;
	
	// We strip all tags from the text field, to avoid vulnerablilties like XSS
	$input['facebook'] =  $input['facebook'];
	
	// We strip all tags from the text field, to avoid vulnerablilties like XSS
	$input['twitter'] =  $input['twitter'] ;
	
	// We strip all tags from the text field, to avoid vulnerablilties like XSS
	$input['google_url'] = $input['google_url'];
	
	// We strip all tags from the text field, to avoid vulnerablilties like XSS
	$input['header_title'] = wp_filter_post_kses( $input['header_title'] );
	
	// We strip all tags from the text field, to avoid vulnerablilties like XSSs
	$input['header_text'] = $input['header_text'] ;
	
	// We strip all tags from the text field, to avoid vulnerablilties like XSS
	$input['footer_text'] =  $input['footer_text'];
        
        // We strip all tags from the text field, to avoid vulnerablilties like XSS
	$input['fact_sheet'] =  $input['fact_sheet'];
        
        // We strip all tags from the text field, to avoid vulnerablilties like XSS
	$input['letter'] =  $input['letter'];
	
	return $input;
}

endif; ?>
