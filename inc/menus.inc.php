<?php
function mg_confetti_add_admin_menu()
{
add_submenu_page(
    'options-general.php',
    __( 'Minigiv Confetti', 'minigiv-confetti' ),
    __( 'Minigiv Confetti', 'minigiv-confetti' ),
    'manage_options',
    'minigiv-confetti',
    'mg_confetti_content'
);

}
?>
