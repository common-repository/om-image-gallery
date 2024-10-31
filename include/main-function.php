<?php 
function om_image_gallery_main_html(){ 
global $wpdb; $table_name = $wpdb->prefix . 'om_image_gallery_states'; ?>

<div id="grid">
  <div id="posts">
    <?php
	$user_id=get_current_user_id();
global $post;
//$myposts = get_posts(array('showposts' => -1 ,'posts_per_page' => 10));


$btpgid=get_queried_object_id();
$btmetanm=get_post_meta( $btpgid, 'WP_Catid','true' );
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = array( 'posts_per_page' => 12, 'category_name' => $btmetanm,
'paged' => $paged,'post_type' => 'post' );
    $postslist = new WP_Query( $args );
	 if ( $postslist->have_posts() ) :
        while ( $postslist->have_posts() ) : $postslist->the_post(); 
if ( is_user_logged_in() ) { ?>
    <div class="post">
      <?php if ( has_post_thumbnail() ) : ?>
      <a href="<?php the_permalink(); ?>">
      <?php $img_attr = array('class' => "center-block img-thumbnail img-responsive"); ?>
      <?php the_post_thumbnail(array(400, 200) ,$img_attr ); ?>
      </a>
      <?php else: ?>
      <a href="<?php the_permalink(); ?>"> <img src="http://placehold.it/400x400" alt="<?php the_title_attribute(); ?>" class="center-block img-thumbnail img-responsive" /> </a>
      <?php endif; ?>
      <?php  $thePostID = $post->ID;
	  
	  //below code is updated by above code
	  $om_image_gallery_data = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM `$table_name` WHERE post_id = %d", $thePostID ) );
	  $om_image_gallery_data_user = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM `$table_name` WHERE  post_id=%d AND user_id=%d", $thePostID, $user_id ) );
      //$om_image_gallery_data= $wpdb->get_row("SELECT * FROM `$table_name` WHERE  post_id=$thePostID"); 
	  //$om_image_gallery_data_user= $wpdb->get_row("SELECT * FROM `$table_name` WHERE  post_id=$thePostID AND user_id=$user_id"); 
	  if($om_image_gallery_data== true ){ 
       $like=$om_image_gallery_data->like;
	   $dislike=$om_image_gallery_data->dislike;
	   $flag=$om_image_gallery_data->flag;			
	  }else{
		  
		  $wpdb->query( $wpdb->prepare( 
	"INSERT INTO $table_name
		( like, dislike, flag, post_id )
		VALUES ( %d, %d, %d, %d )", 
        array(
		0, 
		0, 
		0,
		$thePostID
	) 
) );
		$like=0;
		$dislike=0;
		$flag=0;
			}
	 if($om_image_gallery_data== true &  $om_image_gallery_data_user == false){?>
      <ul class="thumb-view">
        <li id="like-value"> <?php echo $like;?> </li>
        <li>
          <div class="thumb-container">
            <div class="thumb-up <?php echo ($like > 0) ? "thumb-up-active" : NULL; ?>" data="<?php the_ID(); ?>" role="<?php echo $like;?>"></div>
            <div class="thumb-down <?php echo ($dislike > 0) ? "thumb-down-active" : NULL; ?>" data="<?php the_ID(); ?>" role="<?php echo $dislike;?>"></div>
          </div>
        </li>
        <li id="dis-like"> <?php echo $dislike;?> </li>
      </ul>
      <ul class="main-view-contaner">
        <li class="flag" data="<?php the_ID(); ?>" role="<?php echo $flag;?>"><span> <?php echo $flag;?> </span> &nbsp; Flag inappropriate</li>
      </ul>
      <?php }else{		
	 if($om_image_gallery_data_user == true ){ ?>
      <ul class="thumb-view">
        <li id="like-value"> <?php echo $like;?> </li>
        <li>
          <div class="thumb-container">
            <div class="thumb-up-deactive <?php echo ($like > 0) ? "thumb-up-active" : NULL; ?>"></div>
            <div class="thumb-down-deactive <?php echo ($dislike > 0) ? "thumb-down-active" : NULL; ?>"></div>
          </div>
        </li>
        <li id="dis-like"> <?php echo $dislike;?> </li>
      </ul>
      <ul class="main-view-contaner">
        <li class="flag-deactive"><span> <?php echo $flag;?> </span> &nbsp; Flag inappropriate</li>
      </ul>
      <?php  }else{?>
      <ul class="thumb-view">
        <li id="like-value"> <?php echo $like;?> </li>
        <li>
          <div class="thumb-container">
            <div class="thumb-up <?php echo ($like > 0) ? "thumb-up-active" : NULL; ?>" data="<?php the_ID(); ?>" role="<?php echo $like;?>"></div>
            <div class="thumb-down <?php echo ($dislike > 0) ? "thumb-down-active" : NULL; ?>" data="<?php the_ID(); ?>" role="<?php echo $dislike;?>"></div>
          </div>
        </li>
        <li id="dis-like"> <?php echo $dislike;?> </li>
      </ul>
      <ul class="main-view-contaner">
        <li class="flag" data="<?php the_ID(); ?>" role="<?php echo $flag;?>"><span> <?php echo $flag;?> </span> &nbsp; Flag inappropriate</li>
      </ul>
      <?php } }?>
    </div>
    <?php  }else { ?>
    <!--Below script for logout users-->
    <div class="post">
      <?php if ( has_post_thumbnail() ) : ?>
      <a href="<?php the_permalink(); ?>">
      <?php $img_attr = array('class' => "center-block img-thumbnail img-responsive"); ?>
      <?php the_post_thumbnail(array(400, 200) ,$img_attr ); ?>
      </a>
      <?php else: ?>
      <a href="<?php the_permalink(); ?>"> <img src="http://placehold.it/400x400" alt="<?php the_title_attribute(); ?>" class="center-block img-thumbnail img-responsive" /> </a>
      <?php endif; ?>
      <?php  $thePostID = $post->ID;
	  
	  //below code is updated by above code
	  $om_image_gallery_data = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $table_name WHERE post_id = %d", $thePostID ) );
      //$om_image_gallery_data= $wpdb->get_row("SELECT * FROM `$table_name` WHERE  post_id=$thePostID"); 
	  if($om_image_gallery_data== true ){ 
       $like=$om_image_gallery_data->like;
	   $dislike=$om_image_gallery_data->dislike;
	   $flag=$om_image_gallery_data->flag;			
	  }else{
		$wpdb->insert( 
		$table_name, 
		array( 'like' => 0, 
		'dislike' => 0,
		'flag'=>0,
		'post_id'=>$thePostID));
		$like=0;
		$dislike=0;
		$flag=0;
			}
?>
      <ul class="thumb-view">
        <li id="like-value"> <?php echo $like;?> </li>
        <li>
          <div class="thumb-container">
            <div class="thumb-up-deactive <?php echo ($like > 0) ? "thumb-up-active" : NULL; ?>"></div>
            <div class="thumb-down-deactive <?php echo ($dislike > 0) ? "thumb-down-active" : NULL; ?>"></div>
          </div>
        </li>
        <li id="dis-like"> <?php echo $dislike;?> </li>
      </ul>
      <ul class="main-view-contaner">
        <li class="flag-deactive"><span> <?php echo $flag;?> </span> &nbsp; Flag inappropriate</li>
      </ul>
    </div>
    <?php } ?>
    <?php  endwhile;  ?>
    <ul class="pagination-image-gallery">
      <?php next_posts_link( '<li>&laquo; Older Entries</li>', $postslist->max_num_pages ); ?>
      <?php previous_posts_link( '<li>Next Entries &raquo;</li>' );  ?>
    </ul>
    <?php wp_reset_postdata();
    endif;?>
  </div>
</div>
<?php }?>
