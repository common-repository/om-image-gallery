<?php 
add_action( 'wp_ajax_image_gallery_reponse', 'om_image_gallery_reponse_submit' );
add_action('wp_ajax_nopriv_image_gallery_reponse', 'om_image_gallery_reponse_submit');

function om_image_gallery_reponse_submit(){
global $wpdb;	
$table_name = $wpdb->prefix . "om_image_gallery_states";
$user_id=get_current_user_id();

$nonce = $_REQUEST['_wpnonce'];

if ( ! wp_verify_nonce( $nonce, 'Om-image-gallery' ) ) {
     die( 'Security check' ); 
} else {
if(isset($_POST['thumb_up_post_id'])){
$thumb_up_post_id=intval($_POST['thumb_up_post_id']);
$thumb_up_value=intval($_POST['thumb_up_value']);
$thumb_up_value_fine=($thumb_up_value+1);

//below code is updated by above code
$strQuery = "UPDATE `$table_name` SET  `like` = %d , `user_id` = %d WHERE  post_id=%d";
$rows_updated=$wpdb->query($wpdb->prepare(  $strQuery, $thumb_up_value_fine, $user_id, $thumb_up_post_id) );
//$rows_updated=$wpdb->query("UPDATE `$table_name` SET  `like` = '$thumb_up_value_fine', `user_id` = '$user_id' WHERE  post_id='$thumb_up_post_id'");
}
if(isset($_POST['thumb_down_post_id'])){
$thumb_down_post_id=intval($_POST['thumb_down_post_id']);
$thumb_down_value=intval($_POST['thumb_down_value']);
$thumb_down_value_fine=($thumb_down_value+1);

//below code is updated by above code
$strQuery = "UPDATE `$table_name` SET  `dislike` = %d , `user_id` = %d WHERE  post_id=%d";
$rows_updated=$wpdb->query($wpdb->prepare(  $strQuery, $thumb_down_value_fine, $user_id, $thumb_down_post_id) );
//$rows_updated=$wpdb->query("UPDATE `$table_name` SET  `dislike` = '$thumb_down_value_fine', `user_id` = '$user_id' WHERE  post_id='$thumb_down_post_id'");
}

if(isset($_POST['flag_post_id'])){
$flag_post_id=intval($_POST['flag_post_id']);
$flag_value=intval($_POST['flag_value']);
$flag_value_fine=($flag_value+1);

//below code is updated by above code
$strQuery = "UPDATE `$table_name` SET  `flag` = %d , `user_id` = %d WHERE  post_id=%d";
$rows_updated=$wpdb->query($wpdb->prepare(  $strQuery, $flag_value_fine, $user_id, $flag_post_id) );
//$rows_updated=$wpdb->query("UPDATE `$table_name` SET  `flag` = '$flag_value_fine', user_id='$user_id' WHERE  post_id='$flag_post_id'");
}




//show sucess message
 echo ($rows_updated) ? 'sucess' : 'error' ; die(); }    // Do stuff here.
 }?>