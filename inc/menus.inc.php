<?php
function mgconfetti_add_admin_menu()
{
   add_submenu_page( 'options-general.php' , 'Minigiv Confetti', 'Minigiv Confetti' , 'manage_options' , __FILE__ . '_display_confetti' , 'mg_confetti_content');
}
?>