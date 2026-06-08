<?php
/**
 * Plugin Name: Minigiv Confetti
 * Plugin URI: https://github.com/gulshanbasouli/wordpress-confetti-plugin
 * Description: Display confetti animations based on custom conditions.
 * Version: 1.0.0
 * Author: Gulshan Chauhan
 * Author URI: https://loeion.com
 * License: GPL v2 or later
 * Text Domain: minigiv-confetti
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


add_action( 'admin_post_mgConfetti_save_option', 'process_mgConfetti_option' );

// Set up our WordPress Plugin
function mg_confetti_check_version()
{
   if ( version_compare( get_bloginfo( 'version' ), '6.0', '<' ) ) {
      wp_die(
    __( 'You must update WordPress to use this plugin!', 'minigiv-confetti' )
);
   }

   if ( get_option( 'mg_confetti_array' ) === false ) {

      $options_array['mg_confetti_price'] = '3';
       $options_array['mg_confetti_discount_code'] = 'coupon-code';
      $options_array['mg_confetti_discount_percent'] = '2';

      $options_array['mg_confetti_op_version'] = '1';
      add_option( 'mg_confetti_array', $options_array );
   }
}
register_activation_hook( __FILE__, 'mg_confetti_check_version' );

// Include or Require any files
require_once plugin_dir_path( __FILE__ ) . 'inc/process.php';
require_once plugin_dir_path( __FILE__ ) . 'inc/display-options.inc.php';
require_once plugin_dir_path( __FILE__ ) . 'inc/menus.inc.php';


// Action & Filter Hooks
add_action( 'admin_menu', 'mg_confetti_add_admin_menu' );




function mg_confetti_get_data() {

    $arr = get_option( 'mg_confetti_array' );

    if ( empty( $arr ) ) {
        return '';
    }

    ob_start();
    ?>
    <ul>
        <li><strong>Price:</strong> <?php echo esc_html( $arr['mg_confetti_price'] ?? '' ); ?></li>
        <li><strong>Discount Code:</strong> <?php echo esc_html( $arr['mg_confetti_discount_code'] ?? '' ); ?></li>
        <li><strong>Discount Percent:</strong> <?php echo esc_html( $arr['mg_confetti_discount_percent'] ?? '' ); ?></li>
    </ul>
    <?php

    return ob_get_clean();
}

add_shortcode('confetti-data', 'mg_confetti_get_data');
?>
