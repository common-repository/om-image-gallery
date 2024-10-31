<?php 
global $om_image_gallery_version;
$om_image_gallery_version = "1.0";

function om_image_gallery_db_install() {
global $wpdb; 
global $om_image_gallery_version;
$charset_collate = $wpdb->get_charset_collate();

//Table Names
$table_name = $wpdb->prefix . "om_image_gallery_states";

if($wpdb->get_var('SHOW TABLES LIKE ' . $table_name) != $table_name){
$sql="CREATE TABLE $table_name (
`image_id` INT NOT NULL AUTO_INCREMENT,
`like` INT NULL,
`dislike` INT NULL,
`flag` INT NULL,
`post_id` INT NULL,
`user_id` INT NULL,
PRIMARY KEY (`image_id`), UNIQUE KEY `image_id` (`image_id`)
)$charset_collate;";

require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta( $sql );

 }

add_option( "om_image_gallery_states", $om_image_gallery_version );
} 



function om_image_gallery_db_uninstall() {
        global $wpdb;
        $table = $wpdb->prefix."om_image_gallery_states";
        //Delete any options thats stored also?
	    delete_option('om_image_gallery_states');
	    $wpdb->query("DROP TABLE IF EXISTS $table");
} register_deactivation_hook( __FILE__, 'om_contact_form_db_uninstall' );

?>