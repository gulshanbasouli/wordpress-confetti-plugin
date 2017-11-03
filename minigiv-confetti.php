<?php
/*
   * Plugin Name: Minigiv Confetti
   *Author: Webchefz
   *Author URI: https://www.webchefz.com
   *Description: Manage Confetti
   *Plugin URI:  https://github.com/gulshanbasouli/Webchefz
   Version: 0.1
 */
add_action( 'admin_post_mgConfetti_save_option', 'process_mgConfetti_option' );

// Set up our WordPress Plugin
function mg_checkVersion()
{
   if ( version_compare( get_bloginfo( 'version' ), '3.1', '<' ) ) {
      wp_die("You must update WordPress to use this plugin!");
   }

   if ( get_option( 'mg_confetti_array' ) === false ) {

      $options_array['mg_confetti_price'] = '3';
      $options_array['mg_confetti_discount'] = 'coupon-code';
      $options_array['mg_confetti_discount'] = '2';

      $options_array['mg_confetti_op_version'] = '1';
      add_option( 'mg_confetti_array', $options_array );
   }
}
register_activation_hook( __FILE__, 'mg_checkVersion' );

// Include or Require any files
include('inc/process.php');
include('inc/display-options.inc.php');
include('inc/menus.inc.php');

// Action & Filter Hooks
add_action( 'admin_menu', 'mgconfetti_add_admin_menu' );




function getConfettiData(){
   $arr = get_option( 'mg_confetti_array' );
   print_r($arr);
}


add_shortcode('confetti-data', 'getConfettiData');

?>