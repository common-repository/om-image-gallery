<?php 
function om_image_gallery_html_contaner(){ 
include_once ('include/main-function.php');
om_image_gallery_main_html();
}add_shortcode( 'om_image_gallery_show', 'om_image_gallery_html_contaner' ); 
?>