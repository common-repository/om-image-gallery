// Load is used to ensure all images have been loaded, impossible with document





/*my code start*/

// JavaScript Document
jQuery(document).ready(function(e) {
jQuery(".thumb-up").click(function(e) {
var thumb_up_post_id=jQuery(this).attr('data');
var thumb_up_value=Number(jQuery(this).attr('role'));
var thumb_up_value_final=thumb_up_value+1;
var security=image_gallery_ajax_script.ajax_nonce
jQuery(this).closest('li').prev().text(thumb_up_value_final);

jQuery.ajax({			
type:'POST',
url: image_gallery_ajax_script.ajaxurl,
data:{'thumb_up_post_id': thumb_up_post_id, 'thumb_up_value': thumb_up_value , 'action': 'image_gallery_reponse','_wpnonce' : security}
}).success(function(resultData){
console.log(resultData);
})
})


	
jQuery(".thumb-down").click(function(e) {
var thumb_down_post_id=jQuery(this).attr('data'); 
var thumb_down_value=Number(jQuery(this).attr('role'));
var thumb_down_value_final=thumb_down_value+1;
var security=image_gallery_ajax_script.ajax_nonce
jQuery(this).closest('li').next().text(thumb_down_value_final);

jQuery.ajax({			
type:'POST',
url: image_gallery_ajax_script.ajaxurl,
data:{'thumb_down_post_id': thumb_down_post_id, 'thumb_down_value': thumb_down_value , 'action': 'image_gallery_reponse','_wpnonce' : security}
}).success(function(resultData){
console.log(resultData);
})
})





jQuery(".flag").click(function(e) {
var flag_post_id=jQuery(this).attr('data'); 
var flag_value=Number(jQuery(this).attr('role'));
var flag_value_final=flag_value+1;
var security=image_gallery_ajax_script.ajax_nonce
jQuery(this).children('span').text(flag_value_final);

jQuery.ajax({			
type:'POST',
url: image_gallery_ajax_script.ajaxurl,
data:{'flag_post_id': flag_post_id, 'flag_value': flag_value , 'action': 'image_gallery_reponse','_wpnonce' : security}
}).success(function(resultData){
console.log(resultData);
})
})


})

    /*jQuery('#popupShraddhaMessageOutput').html('<p class="alert alert-warning">Please wait....</p>');
	message=Object();
    message.top_bar=jQuery("#top_bar_message").val();
	message.top_bar_view=jQuery("#top_bar_message_view").is(":checked") ? 1 : 2;
	message.footer_bar=jQuery("#footer_bar_message").val();
	message.footer_bar_view=jQuery("#footer_bar_message_view").is(":checked") ? 1 : 2;
	message.middle_alert=jQuery("#middle_alert_message").val();
	message.middle_alert_view=jQuery("#middle_alert_message_view").is(":checked") ? 1 : 2;
jQuery.ajax({
	     beforeSend:function(){
			jQuery('#popupShraddhaMessageOutput').html('<p class="alert alert-warning">Please wait....</p>');
			},			
		type:'POST',
		url: popup_shraddha_ajax_script.ajaxurl,
		data:{'message': message, 'action': 'image_gallery_ajax_script'}
		}).success(function(resultData){
		  if(jQuery.trim(resultData) == "success"){
    	  jQuery('#popupShraddhaMessageOutput').html('<p class="alert alert-success">Your message update successfully</p>'); return false;
				}else{
				jQuery('#popupShraddhaMessageOutput').html('<p class="alert alert-warning">!Something went wrong try again later</p>'); return false;	
					}
			}).error(function(){
				jQuery('#popupShraddhaMessageOutput').html('<p class="alert alert-danger">Something went wrong try again later</p>'); return false;
				})
    });*/
