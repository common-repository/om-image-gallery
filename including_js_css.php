<?php 
function om_image_gallery_register_scripts() {
global $wp_scripts;
wp_enqueue_script( 'masonry',plugins_url('js/masonry.pkgd.min.js', __FILE__), array('jquery'), '1.0.0', true );	
wp_enqueue_script( 'om_image_gallery_script', plugins_url('js/script.js', __FILE__), array('jquery'), '1.0.0', true ); 
wp_localize_script( 'om_image_gallery_script', 'image_gallery_ajax_script', array( "ajaxurl" => admin_url( "admin-ajax.php" ), "ajax_nonce" =>wp_create_nonce( "Om-image-gallery" ) ) );
wp_enqueue_script('lightbox', plugins_url('js/lightbox.js', __FILE__), array( 'jquery' ),'1.0.0',true); 
}add_action('wp_enqueue_scripts', "om_image_gallery_register_scripts"); 

function om_image_gallery_register_style() {
wp_enqueue_style( 'killua-contact-page', plugins_url('css/killua.css', __FILE__), array(), '1.0.0', 'all' );
wp_enqueue_style( 'custom-style', plugins_url('css/style.css', __FILE__), array(), '4.4.0', 'all' );
wp_enqueue_style( 'custom-lightobx', plugins_url('css/lightbox.css', __FILE__), array(), '4.4.0', 'all' );
}add_action('wp_enqueue_scripts', "om_image_gallery_register_style"); 


function om_image_gallery_register_admin() {
//something we do later	
}
add_action( 'admin_enqueue_scripts', 'om_image_gallery_register_admin' );?>