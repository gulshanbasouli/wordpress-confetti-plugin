<?php
function mg_confetti_content()
{
   $options = get_option( 'mg_confetti_array' );
?>
   <div class="wrap">
      <p class="description">
Display confetti when cart value exceeds this amount.
</p>
     <h2><?php esc_html_e( 'Confetti Settings', 'minigiv-confetti' ); ?></h2>
      <form method="post" action="admin-post.php">
         <input type="hidden" name="action" value="mgConfetti_save_option" />

         <?php wp_nonce_field( 'mg_confetti_verify' ); ?>
      <table class="form-table">
         <tbody>
            <tr>
               <th scope="row"><label>Confetti Price:</label></th>
               <td> <input class="regular-text" type="number" name="confetti_price" value="<?php echo esc_attr( $options['mg_confetti_price'] ); ?>"/>
            </td>
            </tr>
          <tr>
               <th scope="row"><label>Confetti Discount coupon:</label></th>
               <td> <input class="regular-text" type="text" name="confetti_discount" value="<?php echo esc_attr( $options['mg_confetti_discount'] ); ?>"/>
            </td>
            </tr>

             <tr>
               <th scope="row"><label>Confetti Status:</label></th>
               <td> 
               <select class="regular-text" name="confetti_status">
                  <option  value="">Select Status</option>
                  <option <?php selected( $options['mg_confetti_status'], 1 ); ?> value="1">Active</option>
                  <option <?php selected( $options['mg_confetti_status'], 2 ); ?> value="2">Inactive</option>
               </select>               
            </td>
            </tr>
           

            </tbody>
         </table>
         <p class="submit"><input type="submit" value="Submit" class="button button-primary"/></p>
      </form>


      <hr>
     
       <h2>Shortcode for fetch array of confetti data</h2>
       <code>[confetti-data]</code>
      <code>&lt;?php echo do_shortcode('[confetti-data]'); ?&gt;</code>
       <br>  <br>  <br>




   </div>
<?php
}
?>
<?php
  if (
    isset( $_GET['m'] ) &&
    absint( $_GET['m'] ) === 1
   )
  {
?>
   <div id='message' class='updated fade'><p><strong>You have successfully updated your confetti Price.</strong></p></div>
<?php
  }
?>
