<?php
/*
Plugin Name: Scroll Popup Ads
Plugin URL:http://themepoints.com/tp-scroll-popup-ads
Description: Tp Scroll Popup allows you to slide popups from all four corners of your website. You can choose in which corner you would like the popup to appear and also the direction you would like the popup to slide from.
Author: Themepoints
Author URI: http://themepoints.com
Version:1.0.1
*/

if ( ! defined( 'ABSPATH' ) )
	die( "Can't load this file directly" );
	
define('TP_ADS_POPUP_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
define('tp_ads_scroll_popup_plugin_dir', plugin_dir_path( __FILE__ ) );

/*==========================================================================
  Scroll Popup Plugins enqueue scripts
==========================================================================*/
function tp_ads_scrollpopup_post_script(){
	wp_enqueue_script('jquery');
	wp_enqueue_script('corner-slider-js', plugins_url( '/js/jquery.cornerslider.js', __FILE__ ), array('jquery'), '1.0', false);
	wp_enqueue_style('corner-style-css', TP_ADS_POPUP_PATH.'css/corner.css');
	wp_enqueue_style('corner-animate-css', TP_ADS_POPUP_PATH.'css/animate.css');
	wp_enqueue_style('corner-awesome-css', TP_ADS_POPUP_PATH.'css/font-awesome.min.css');
	wp_enqueue_style('wp-color-picker');
	wp_enqueue_script( 'corner_rp_color_picker', plugins_url('/js/color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}
add_action('init', 'tp_ads_scrollpopup_post_script');


/*==========================================================================
  Scroll Popup Plugins admin hook
==========================================================================*/
function tp_ads_admin_styles_hook(){
	$tp_ads_popup_ads_bg_color = get_option( 'tp_ads_popup_ads_bg_color' );
	if(empty($tp_ads_popup_ads_bg_color)){
		$tp_ads_popup_ads_bg_color = "#18a3d9";
	}
	$kento_popup_ads_button_color = get_option( 'kento_popup_ads_button_color' );
	if(empty($kento_popup_ads_button_color)) {
		$kento_popup_ads_button_color = "#4b7a98";
	}
	$kento_popup_ads_texts_color = get_option( 'kento_popup_ads_texts_color' );
	if(empty($kento_popup_ads_texts_color)) {
		$kento_popup_ads_texts_color = "#ffffff";
	}
	?>
<style type="text/css">
	
#corner-slider {
  background: <?php echo $tp_ads_popup_ads_bg_color; ?>;
  border: 4px solid #fff;
  box-shadow: 0 0 8px 0 rgba(50, 50, 50, 0.75);
  height: 400px;
  overflow: hidden;
  padding: 8px;
  position: fixed;
  width: 350px;
  z-index: 10000;
}
#corner-slider.hidden{
    display:none;
}
#corner-slider .close {
  background: #ddd none repeat scroll 0 0;
  border-radius: 50px;
  color: #000;
  cursor: pointer;
  display: inline-block;
  font-size: 16px;
  opacity: 0.6;
  padding-left: 8px;
  position: absolute;
  right: 24px;
  top: 12px;
  width: 27px;
  z-index: 1002;
}
.corner-header > h2 {
  color: <?php echo $kento_popup_ads_texts_color; ?>;
  font-family: Raleway,open sans;
  font-weight: 600;
  padding-bottom: 15px;
  text-align: center;
  font-size:16px;
}
#corner-slider span#download a h2 {
  font-family: Raleway;
  font-size: 20px;
  font-weight: 600;
  height: auto;
  text-transform: uppercase;
  width: 100%;
  color:<?php echo $kento_popup_ads_texts_color; ?>;
}
#corner-slider span#download {
  background: <?php echo $kento_popup_ads_button_color; ?>;
  display: block;
  margin: 28px auto 0;
  text-align: center;
  width: 250px;
}
#corner-slider span#download a h2 i {
  margin-right: 18px;
}
#corner-slider span#download > a {
  outline: medium none;
  text-decoration: none;
}
#corner-slider span#content p {
  color: <?php echo $kento_popup_ads_texts_color; ?>;
  font-family: Raleway,open sans;
  font-size: 13px;
  font-weight: 500;
  padding-top: 5px;
  text-align: center;
}

#corner-slider > span {
    display: block;
    padding: 0 10px;
}
#corner-slider span#corner-thumb img {
    height: auto;
    width: 100%;
}

/*==========  Mobile First Method  ==========*/

/* Custom, iPhone Retina */ 
@media only screen and (min-width : 320px) {
#corner-slider {
  background: <?php echo $tp_ads_popup_ads_bg_color; ?>;
  border: 4px solid #fff;
  box-shadow: 0 0 8px 0 rgba(50, 50, 50, 0.75);
  height: 400px;
  overflow: hidden;
  padding: 8px;
  position: fixed;
  width: 300px;
  z-index: 10000;
}
}

/* Extra Small Devices, Phones */ 
@media only screen and (min-width : 480px) {
#corner-slider {
  background: <?php echo $tp_ads_popup_ads_bg_color; ?>;
  border: 4px solid #fff;
  box-shadow: 0 0 8px 0 rgba(50, 50, 50, 0.75);
  height: 400px;
  overflow: hidden;
  padding: 8px;
  position: fixed;
  width: 350px;
  z-index: 10000;
}

}

/* Small Devices, Tablets */
@media only screen and (min-width : 768px) {
#corner-slider {
  background: <?php echo $tp_ads_popup_ads_bg_color; ?>;
  border: 4px solid #fff;
  box-shadow: 0 0 8px 0 rgba(50, 50, 50, 0.75);
  height: 400px;
  overflow: hidden;
  padding: 8px;
  position: fixed;
  width: 350px;
  z-index: 10000;
}

}

/* Medium Devices, Desktops */
@media only screen and (min-width : 992px) {
#corner-slider {
  background: <?php echo $tp_ads_popup_ads_bg_color; ?>;
  border: 4px solid #fff;
  box-shadow: 0 0 8px 0 rgba(50, 50, 50, 0.75);
  height: 400px;
  overflow: hidden;
  padding: 8px;
  position: fixed;
  width: 350px;
  z-index: 10000;
}

}

/* Large Devices, Wide Screens */
@media only screen and (min-width : 1200px) {
#corner-slider {
  background: <?php echo $tp_ads_popup_ads_bg_color; ?>;
  border: 4px solid #fff;
  box-shadow: 0 0 8px 0 rgba(50, 50, 50, 0.75);
  height: 445px;
  overflow: hidden;
  padding: 8px;
  position: fixed;
  width: 350px;
  z-index: 10000;
}
}



/*==========  Non-Mobile First Method  ==========*/

/* Large Devices, Wide Screens */
@media only screen and (max-width : 1200px) {
#corner-slider {
  background: <?php echo $tp_ads_popup_ads_bg_color; ?>;
  border: 4px solid #fff;
  box-shadow: 0 0 8px 0 rgba(50, 50, 50, 0.75);
  height: 445px;
  overflow: hidden;
  padding: 8px;
  position: fixed;
  width: 350px;
  z-index: 10000;
}
#corner-slider span#download {
  background: <?php echo $kento_popup_ads_button_color; ?>;
  display: block;
  margin: 28px auto 0;
  text-align: center;
  width: 250px;
}
}

/* Medium Devices, Desktops */
@media only screen and (max-width : 992px) {
#corner-slider {
  background: <?php echo $tp_ads_popup_ads_bg_color; ?>;
  border: 4px solid #fff;
  box-shadow: 0 0 8px 0 rgba(50, 50, 50, 0.75);
  height: 400px;
  overflow: hidden;
  padding: 8px;
  position: fixed;
  width: 350px;
  z-index: 10000;
}
#corner-slider span#download {
  background: <?php echo $kento_popup_ads_button_color; ?>;
  display: block;
  margin: 28px auto 0;
  text-align: center;
  width: 250px;
}

}

/* Small Devices, Tablets */
@media only screen and (max-width : 768px) {
#corner-slider {
  background: <?php echo $tp_ads_popup_ads_bg_color; ?>;
  border: 4px solid #fff;
  box-shadow: 0 0 8px 0 rgba(50, 50, 50, 0.75);
  height: 445px;
  overflow: hidden;
  padding: 8px;
  position: fixed;
  width: 350px;
  z-index: 10000;
}
#corner-slider span#download {
  background: <?php echo $kento_popup_ads_button_color; ?>;
  display: block;
  margin: 28px auto 0;
  text-align: center;
  width: 250px;
}
}

/* Extra Small Devices, Phones */ 
@media only screen and (max-width : 480px) {
#corner-slider {
  background: <?php echo $tp_ads_popup_ads_bg_color; ?>;
  border: 4px solid #fff;
  box-shadow: 0 0 8px 0 rgba(50, 50, 50, 0.75);
  height: 400px;
  overflow: hidden;
  padding: 8px;
  position: fixed;
  width: 350px;
  z-index: 10000;
}
#corner-slider span#download {
  background: <?php echo $kento_popup_ads_button_color; ?>;
  display: block;
  margin: 28px auto 0;
  text-align: center;
  width: 250px;
}
}

/* Custom, iPhone Retina */ 
@media only screen and (max-width : 320px) {
#corner-slider {
  background: <?php echo $tp_ads_popup_ads_bg_color; ?>;
  border: 4px solid #fff;
  box-shadow: 0 0 8px 0 rgba(50, 50, 50, 0.75);
  height: 400px;
  overflow: hidden;
  padding: 8px;
  position: fixed;
  width: 250px;
  z-index: 10000;
}
#corner-slider span#download {
  background: <?php echo $kento_popup_ads_button_color; ?>;
  display: block;
  margin: 28px auto 0;
  text-align: center;
  width: 210px;
}
}
	</style>
<?php	
}
add_action('wp_head', 'tp_ads_admin_styles_hook');



/*===============================================
  Scroll Popup Main Scripts
=================================================*/

function tp_ads_scroll_popup_active_script(){
	 $tp_ads_popup_adds_sidebar = get_option( 'tp_ads_popup_adds_sidebar' );
			if(empty($tp_ads_popup_adds_sidebar))
				{
					$tp_ads_popup_adds_sidebar = "right";
				}
	?>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$("#corner-slider").cornerSlider({
				showAtScrollingHeight : 1000,
				directionEffect       : "<?php echo $tp_ads_popup_adds_sidebar; ?>",
				speedEffect           : 300,
				right                 : 20,
				bottom                : 20,
				cookieMinutesToExpiry : 15,
			});
		});
	</script>
<?php	
}
add_action('wp_footer', 'tp_ads_scroll_popup_active_script');


/*===============================================
  Scroll Popup Main Options
=================================================*/

function tp_ads_scroll_popup_main_options(){

	$tp_ads_popup_adds_desc = get_option( 'tp_ads_popup_adds_desc' );
	$tp_ads_popup_screen_bg_img = get_option( 'tp_ads_popup_screen_bg_img' );
	$tp_ads_popup_ads_title = get_option( 'tp_ads_popup_ads_title' );
	if(empty($tp_ads_popup_ads_title))
		{
			$tp_ads_popup_ads_title = "Your Ad Title Here....";
		}
	
	$tp_ads_popup_purchase_btn = get_option( 'tp_ads_popup_purchase_btn' );
	if(empty($tp_ads_popup_purchase_btn))
		{
			$tp_ads_popup_purchase_btn = "Purchase Now";
		}
	$tp_ads_popup_ads_button_link = get_option( 'tp_ads_popup_ads_button_link' );
	if(empty($tp_ads_popup_ads_button_link))
		{
			$tp_ads_popup_ads_button_link = "yourdomain.com";
		}
	$tp_ads_popup_adds_open_page = get_option( 'tp_ads_popup_adds_open_page' );
	if(empty($tp_ads_popup_adds_open_page))
		{
			$tp_ads_popup_adds_open_page = "_self";
		}
	
	?>
	
	<div id="corner-slider">
		<span class="corner-header"><h2><?php echo $tp_ads_popup_ads_title;?></h2></span>
		<span id="corner-thumb"><img src="<?php echo $tp_ads_popup_screen_bg_img;?>" alt="" />
		</span>
		<span id="content">
			<p><?php echo $tp_ads_popup_adds_desc;?></p>
		</span>
		<span id="download">
			<a target="<?php echo $tp_ads_popup_adds_open_page;?>" href="<?php echo $tp_ads_popup_ads_button_link;?>"><h2><?php echo $tp_ads_popup_purchase_btn;?></h2></a>
		</span>
	</div>
	
<?php
}
add_action('wp_footer', 'tp_ads_scroll_popup_main_options');


/*===============================================
  Scroll Popup Admin Enqueue Style
=================================================*/

function tp_ads_popup_admin_enqueue_script(){
  wp_enqueue_style( 'tp-admin-stylesheet', plugins_url('css/scroll-popup-admin-style.css', __FILE__) );
}
add_action('admin_enqueue_scripts', 'tp_ads_popup_admin_enqueue_script');


function tp_ads_scroll_popup_load_fonts() {
		wp_register_style('krp_Rajdhani', 'http://fonts.googleapis.com/css?family=Rajdhani:500,600');
		wp_register_style('krp_Raleway', 'http://fonts.googleapis.com/css?family=Raleway:700,400');
		wp_register_style('krp_Open-Sans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,700');	
		wp_register_style('krp_Roboto', 'http://fonts.googleapis.com/css?family=Roboto:400,500,700');	
		wp_register_style('krp_Roboto-condensed', 'http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700');	
		wp_register_style('krp_Oswald', 'http://fonts.googleapis.com/css?family=Oswald:400,700');	
		wp_register_style('krp_droid-sans', 'http://fonts.googleapis.com/css?family=Droid+Sans');	
		wp_register_style('krp_lato', 'http://fonts.googleapis.com/css?family=Lato:400,700');	
		wp_register_style('krp_Montserrat', 'http://fonts.googleapis.com/css?family=Montserrat:400,700');	

		wp_enqueue_style( 'krp_Montserrat');
		wp_enqueue_style( 'krp_lato');
		wp_enqueue_style( 'krp_droid-sans');
		wp_enqueue_style( 'krp_Oswald');
		wp_enqueue_style( 'krp_Roboto-condensed');
		wp_enqueue_style( 'krp_Roboto');
		wp_enqueue_style( 'krp_Open-Sans');
		wp_enqueue_style( 'krp_Rajdhani');
		wp_enqueue_style( 'krp_Raleway');
	}
add_action('wp_print_styles', 'tp_ads_scroll_popup_load_fonts');

/*===============================================
 Scroll Popup Option Register
=================================================*/
function tp_ads_scroll_popup_option_init(){
	register_setting( 'tp_ads_scrollpopup_options_setting', 'tp_ads_popup_ads_title');
	register_setting( 'tp_ads_scrollpopup_options_setting', 'tp_ads_popup_adds_desc');
	register_setting( 'tp_ads_scrollpopup_options_setting', 'tp_ads_popup_screen_bg_img');
	register_setting( 'tp_ads_scrollpopup_options_setting', 'kento_scroll_popup_screen_content');
	register_setting( 'tp_ads_scrollpopup_options_setting', 'tp_ads_popup_adds_sidebar');
	register_setting( 'tp_ads_scrollpopup_options_setting', 'kento_popup_ads_texts_color');
	register_setting( 'tp_ads_scrollpopup_options_setting', 'kento_popup_ads_button_color');
	register_setting( 'tp_ads_scrollpopup_options_setting', 'tp_ads_popup_ads_bg_color');
}
add_action('admin_init', 'tp_ads_scroll_popup_option_init' );

/*===============================================
  Scroll Popup Option Page Settings
=================================================*/
function tp_ads_scroll_popup_options_panel(){
  add_menu_page('plugins page title', 'Scroll Popup', 'manage_options', 'theme-options', 'tp_ads_scroll_popup_theme_func');
  add_submenu_page( 'theme-options', 'Support', 'Support', 'manage_options', 'theme-op-settings', 'tp_ads_scroll_popup_theme_func_settings');
}
add_action('admin_menu', 'tp_ads_scroll_popup_options_panel');


function tp_ads_scroll_popup_theme_func(){?>
<?php

	if(empty($_POST['tp_ads_scrollpopup_options_hidden'])){
			$tp_ads_popup_ads_title = get_option( 'tp_ads_popup_ads_title' );
			$tp_ads_popup_adds_desc = get_option( 'tp_ads_popup_adds_desc' );
			$tp_ads_popup_screen_bg_img = get_option( 'tp_ads_popup_screen_bg_img' );
			$tp_ads_popup_purchase_btn = get_option( 'tp_ads_popup_purchase_btn' );
			$tp_ads_popup_adds_sidebar = get_option( 'tp_ads_popup_adds_sidebar' );
			$tp_ads_popup_ads_bg_color = get_option( 'tp_ads_popup_ads_bg_color' );
			$kento_popup_ads_texts_color = get_option( 'kento_popup_ads_texts_color' );
			$kento_popup_ads_button_color = get_option( 'kento_popup_ads_button_color' );
			$tp_ads_popup_ads_button_link = get_option( 'tp_ads_popup_ads_button_link' );
			$tp_ads_popup_adds_open_page = get_option( 'tp_ads_popup_adds_open_page' );
	} else {
		if($_POST['tp_ads_scrollpopup_options_hidden'] == 'Y') {
			//Form data sent				
			$tp_ads_popup_ads_title = $_POST['tp_ads_popup_ads_title'];
			update_option('tp_ads_popup_ads_title', $tp_ads_popup_ads_title);

			$tp_ads_popup_adds_desc = $_POST['tp_ads_popup_adds_desc'];
			update_option('tp_ads_popup_adds_desc', $tp_ads_popup_adds_desc);
				
			$tp_ads_popup_screen_bg_img = $_POST['tp_ads_popup_screen_bg_img'];
			update_option('tp_ads_popup_screen_bg_img', $tp_ads_popup_screen_bg_img);
			
			$tp_ads_popup_purchase_btn = $_POST['tp_ads_popup_purchase_btn'];
			update_option('tp_ads_popup_purchase_btn', $tp_ads_popup_purchase_btn);
			
			$tp_ads_popup_adds_sidebar = $_POST['tp_ads_popup_adds_sidebar'];
			update_option('tp_ads_popup_adds_sidebar', $tp_ads_popup_adds_sidebar);
			
			$tp_ads_popup_ads_bg_color = $_POST['tp_ads_popup_ads_bg_color'];
			update_option('tp_ads_popup_ads_bg_color', $tp_ads_popup_ads_bg_color);
			
			$kento_popup_ads_texts_color = $_POST['kento_popup_ads_texts_color'];
			update_option('kento_popup_ads_texts_color', $kento_popup_ads_texts_color);
			
			$kento_popup_ads_button_color = $_POST['kento_popup_ads_button_color'];
			update_option('kento_popup_ads_button_color', $kento_popup_ads_button_color);
			
			$tp_ads_popup_ads_button_link = $_POST['tp_ads_popup_ads_button_link'];
			update_option('tp_ads_popup_ads_button_link', $tp_ads_popup_ads_button_link);
			
			$tp_ads_popup_adds_open_page = $_POST['tp_ads_popup_adds_open_page'];
			update_option('tp_ads_popup_adds_open_page', $tp_ads_popup_adds_open_page);
			
			?>
			<div class="updated"><p><strong><?php _e('Changes Saved.' ); ?></strong></p></div>
      <?php
			}
		} 
?>


<div class="wrap">
	<?php echo "<h2>".__('Scroll Popup Ads Settings')."</h2>";?>

	<form  method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
		<input type="hidden" name="tp_ads_scrollpopup_options_hidden" value="Y">
			<?php settings_fields( 'tp_ads_scrollpopup_options_setting' );
				do_settings_sections( 'tp_ads_scrollpopup_options_setting' );
		?>
		<table class="form-table">
 				
			<tr valign="top">
				<th scope="row"><label for="tp_ads_popup_ads_title">Ads Title</label></th>
				<td style="vertical-align:middle;">
					<input  size='20' name='tp_ads_popup_ads_title' class='kento-ads-title' type='text' id="kento-ads-title" value='<?php echo esc_attr($tp_ads_popup_ads_title); ?>' /><br />
					<span style="font-size:12px;color:#22aa5d">insert your ads title.</span>
				</td>
			</tr>
			
			<tr valign="top">
				<th scope="row">Ads Image URL:
				</th>
				<td style="vertical-align:middle;">
				<input type="text" name="tp_ads_popup_screen_bg_img" size="45"  id="kento-scroll-screen-bg-img" value="<?php if ( isset( $tp_ads_popup_screen_bg_img ) ) echo $tp_ads_popup_screen_bg_img; ?>"  /><br />
					<div id="kento-popup-screen-bg-img-preview">
					<?php
					if(!empty($tp_ads_popup_screen_bg_img))
						{
					?>
					<img src="" />
					<?php
					}
					?>
					</div>
				</td>
			</tr>
			
			<script>
			jQuery(document).ready(function(jQuery)
				{	
				var tp_ads_popup_screen_bg_img = jQuery('#kento-scroll-screen-bg-img').val();
				jQuery('#kento-popup-screen-bg-img-preview img').attr("src",tp_ads_popup_screen_bg_img);
				});
			</script> 
			
			<tr valign="top">
				<th scope="row"><label for="tp_ads_popup_adds_desc">Ads Description</label></th>
				<td style="vertical-align:middle;">
					<textarea class="kento-popup-desc" name="tp_ads_popup_adds_desc" type="text" id="kento-popup-desc" cols="43" rows="5"><?php echo esc_textarea($tp_ads_popup_adds_desc); ?></textarea>
				</td>
			</tr>
			
			<tr valign="top">
				<th scope="row"><label for="tp_ads_popup_ads_bg_color">Ads Background Color</label></th>
				<td style="vertical-align:middle;">
				<input  size='10' name='tp_ads_popup_ads_bg_color' class='tp_ads_popup_ads_bg_color' type='text' id="kento-popup-adsbg-color" value='<?php echo $tp_ads_popup_ads_bg_color; ?>' /><br />
				<span style="font-size:12px;color:#22aa5d">select Ads Background color. default  color: #18a3d9 .</span>
				</td>
			</tr>
			
			<tr valign="top">
				<th scope="row"><label for="tp_ads_popup_adds_sidebar">Display Ads in corner</label></th>
				<td style="vertical-align:middle;">
				<select name="tp_ads_popup_adds_sidebar">
					<option value="top" <?php if($tp_ads_popup_adds_sidebar=='top') echo "selected"; ?> >Top</option>
					<option value="left" <?php if($tp_ads_popup_adds_sidebar=='left') echo "selected"; ?> >Left</option>
					<option value="right" <?php if($tp_ads_popup_adds_sidebar=='right') echo "selected"; ?> >Right</option>
					<option value="bottom" <?php if($tp_ads_popup_adds_sidebar=='bottom') echo "selected"; ?> >Bottom</option>
				</select><br>
				<span style="font-size:12px;color:#22aa5d">Select Which corner you want to show your ads.</span>
				</td>
			</tr>			
			
			<tr valign="top">
				<th scope="row"><label for="tp_ads_popup_purchase_btn">Purchase Button Text</label></th>
				<td style="vertical-align:middle;">
					<input placeholder="Purchase Now" size='45' name='tp_ads_popup_purchase_btn' class='kento-ads-btn' type='text' id="kento-ads-btn" value='<?php echo esc_attr($tp_ads_popup_purchase_btn); ?>' /><br />
					<span style="font-size:12px;color:#22aa5d">insert your purchase button text. ex: Download Now, Purchase Now.</span>
				</td>
			</tr>			
			
			<tr valign="top">
				<th scope="row"><label for="tp_ads_popup_ads_button_link">Purchase Button Link</label></th>
				<td style="vertical-align:middle;">
					<input placeholder="http://example.com" size='45' name='tp_ads_popup_ads_button_link' class='kento-ads-btn-link' type='text' id="kento-ads-btn-link" value='<?php echo esc_url($tp_ads_popup_ads_button_link); ?>' /><br />
					<span style="font-size:12px;color:#22aa5d">insert your purchase button link here...</span>
				</td>
			</tr>
			
			<tr valign="top">
				<th scope="row"><label for="tp_ads_popup_adds_open_page">Open Ads In</label></th>
				<td style="vertical-align:middle;">
				<select name="tp_ads_popup_adds_open_page">
					<option value="_self" <?php if($tp_ads_popup_adds_open_page=='_self') echo "selected"; ?> >_self</option>
					<option value="_blank" <?php if($tp_ads_popup_adds_open_page=='_blank') echo "selected"; ?> >_blank</option>
				</select><br>
				<span style="font-size:12px;color:#22aa5d">Select Open your ads in self or new page.</span>
				</td>
			</tr>				
			
			<tr valign="top">
				<th scope="row"><label for="kento_popup_ads_button_color">Button Background Color</label></th>
				<td style="vertical-align:middle;">
				<input  size='10' name='kento_popup_ads_button_color' class='kento_popup_ads_button_color' type='text' id="kento-popup-button-color" value='<?php echo $kento_popup_ads_button_color; ?>' /><br />
				<span style="font-size:12px;color:#22aa5d">select Button Background color. default  color: #18a3d9 .</span>
				</td>
			</tr>
			
			<tr valign="top">
				<th scope="row"><label for="kento_popup_ads_texts_color">Font Color</label></th>
				<td style="vertical-align:middle;">
				<input  size='10' name='kento_popup_ads_texts_color' class='kento_popup_ads_texts_color' type='text' id="kento-popup-button-text-color" value='<?php echo $kento_popup_ads_texts_color; ?>' /><br />
				<span style="font-size:12px;color:#22aa5d">select Button text color. default  color: #18a3d9 .</span>
				</td>
			</tr>
			
		</table>
		<p class="submit">
			<input class="button button-primary" type="submit" name="Submit" value="<?php _e('Save Changes' ) ?>" />
		</p>
	</form>
</div>
<?php
}

function tp_ads_scroll_popup_theme_func_settings(){?>
	<div class="wrap">
		<div id="icon-options-general" class="icon32"><br></div>
		<?php echo "<h2>".__('Support')."</h2>";?>
		
		<div class="map_helps">
			<h4 class="title">Need Help?</h4>
			<div>if you need more help please feel free to join our forum and ask any question<br />
				<a href="http://themepoints.com/questions-answer/" >Themepoints.com Questions & Answers</a><br /><br />
			</div> 			
		</div>
		
		<div class="more_plugins">
			<h4 class="title">You May Also Like?</h4>
			<ul></ul>
		</div>
	</div>
<?php
}
?>