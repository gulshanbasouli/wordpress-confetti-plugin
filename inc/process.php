<?php
function process_mgConfetti_option()
{
   if ( !current_user_can( 'manage_options' ) )
   {
      wp_die( 'You are not allowed to be on this page.' );
   }
   // Check that nonce field
   check_admin_referer( 'mg_confetti_verify' );

   $options = get_option( 'mg_confetti_array' );

   if ( isset( $_POST['confetti_price'] ) ) {
      $options['mg_confetti_price'] = sanitize_text_field( $_POST['confetti_price'] );
   }
   if ( isset( $_POST['confetti_discount'] ) ) {
      $options['mg_confetti_discount'] = sanitize_text_field( $_POST['confetti_discount'] );
   }

   if ( isset( $_POST['confetti_status'] ) ) {
      $options['mg_confetti_status'] = sanitize_text_field( $_POST['confetti_status'] );
   }

   update_option( 'mg_confetti_array', $options );

   wp_redirect(  admin_url( 'options-general.php?page=minigiv-confetti/inc/menus.inc.php_display_confetti&m=1' ) );
   exit;
}
?>