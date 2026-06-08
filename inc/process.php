<?php
function process_mgConfetti_option()
{
   if ( !current_user_can( 'manage_options' ) )
   {
     wp_die(
    __( 'You are not allowed to be on this page.', 'minigiv-confetti' )
);
   }
   // Check that nonce field
   check_admin_referer( 'mg_confetti_verify' );

   $options = get_option( 'mg_confetti_array' );

   if ( isset( $_POST['confetti_price'] ) ) {
        $options['mg_confetti_price'] = absint(
       $_POST['confetti_price']
   );
   }
   if ( isset( $_POST['confetti_discount'] ) ) {
     $options['mg_confetti_discount'] =
    sanitize_text_field(
        wp_unslash(
            $_POST['confetti_discount']
        )
    );
   }

   $allowed_status = array(
    'enabled',
    'disabled'
);

if (
    isset($_POST['confetti_status']) &&
    in_array(
        $_POST['confetti_status'],
        $allowed_status,
        true
    )
) {
    $options['mg_confetti_status'] =
        $_POST['confetti_status'];
}

   update_option( 'mg_confetti_array', $options );

   wp_safe_redirect(
    admin_url(
        'options-general.php?page=minigiv-confetti/inc/menus.inc.php_display_confetti&m=1'
    )
);

   
}
?>
