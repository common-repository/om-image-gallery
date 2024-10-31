<?php
/* Plugin Name: Om Image Gallery
 * Plugin URI: http://sanditsolution.com/
 * Description: User Feaure Images form all post. 
 * Version: 1.0.05
 * Author:Siddharth Singh
 * Author URI:http://codecanyon.net/user/siddharthsingh91
 * License: A "Slug" license name e.g. GPL2
 */ 

include_once dirname( __FILE__ ) . '/include/db.php';
register_activation_hook( __FILE__, 'om_image_gallery_db_install' );
register_deactivation_hook( __FILE__, 'om_image_gallery_db_uninstall' );

include_once dirname( __FILE__ ) . '/html_container.php'; 
include_once dirname( __FILE__ ) . '/including_js_css.php';
require_once dirname( __FILE__ ) . '/form_submit.php';

//Add action link start
add_filter( 'plugin_action_links', 'om_image_gallery_add_action_plugin', 10, 5 ); 
function om_image_gallery_add_action_plugin( $actions, $plugin_file ){static $plugin; if(!isset($plugin))$plugin = plugin_basename(__FILE__); 
if ($plugin == $plugin_file) { $more_product = array('more product' => '<a href="http://www.sanditsolution.com/shops/">' . __('More Product', 'General') . '</a>');$site_link = array('support' => '<a href="http://www.sanditsolution.com/contact.html" target="_blank">Support</a>');
$became_client = array('became client' => '<a href="http://doc.sanditsolution.com/register/" target="_blank">Became Client</a>');
$actions = array_merge($more_product, $actions);$actions = array_merge($site_link, $actions);$actions = array_merge($became_client, $actions);
}return $actions;}
?>