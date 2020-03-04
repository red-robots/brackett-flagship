<?php
/*
session_start();
add_filter( 'posts_orderby', 'randomise_with_pagination' );
function randomise_with_pagination( $orderby ) {
	if( is_page(23) ) {
	  	// Reset seed on load of initial archive page
		if( ! get_query_var( 'paged' ) || get_query_var( 'paged' ) == 0 || get_query_var( 'paged' ) == 1 ) {
			if( isset( $_SESSION['seed'] ) ) {
				unset( $_SESSION['seed'] );
			}
		}
	
		// Get seed from session variable if it exists
		$seed = false;
		if( isset( $_SESSION['seed'] ) ) {
			$seed = $_SESSION['seed'];
		}
	
	    	// Set new seed if none exists
	    	if ( ! $seed ) {
	      		$seed = rand();
	      		$_SESSION['seed'] = $seed;
	    	}
	
	    	// Update ORDER BY clause to use seed
	    	$orderby = 'RAND(' . $seed . ')';
	}
	return $orderby;
}*/
// This theme uses wp_nav_menu() in one location.

register_nav_menu( 'primary', __( 'Primary Menu', 'twentytwelve' ) );
register_nav_menu( 'top', __( 'Header Menu', 'twentytwelve' ) );
register_nav_menu( 'sitemap', __( 'Sitemap Menu', 'twentytwelve' ) );
	
// This theme uses a custom image size for featured images, displayed on "standard" posts.
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop
add_image_size('slide', 1200, 775, array('center','center'));
add_image_size('profile', 400, 400, array('center','center'));
add_image_size('property', 400, 214, array('center','center'));
add_image_size('rep-e', 400, 250, array('center','center'));


/*-------------------------------------
	Custom client login, link and title.
---------------------------------------*/
function my_login_logo() { ?>
<style type="text/css">
  body.login div#login h1 a {
  	background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png);
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    width: 300px;
    height: 65px;
  }
</style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

// Change Link
function loginpage_custom_link() {
  return get_site_url();
}
add_filter('login_headerurl','loginpage_custom_link');

function bella_login_logo_url_title() {
    return get_bloginfo('name');
}
add_filter( 'login_headertitle', 'bella_login_logo_url_title' );

add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );
function remove_wp_logo( $wp_admin_bar ) {
  $wp_admin_bar->remove_node( 'wp-logo' );
}


/*-------------------------------------
	Favicon.
---------------------------------------*/
function mytheme_favicon() { 
 echo '<link rel="shortcut icon" href="' . get_bloginfo('stylesheet_directory') . '/images/favicon.ico" >'; 
} 
add_action('wp_head', 'mytheme_favicon');
/*-------------------------------------
	ACF Pro Options Page
---------------------------------------*/
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}
/*-------------------------------------
	// Add a last and first menu class option
---------------------------------------*/
function ac_first_and_last_menu_class($items) {
	foreach($items as $k => $v){
		$parent[$v->menu_item_parent][] = $v;
	}
	foreach($parent as $k => $v){
		$v[0]->classes[] = 'first';
		$v[count($v)-1]->classes[] = 'last';
	}
	return $items;
}
add_filter('wp_nav_menu_objects', 'ac_first_and_last_menu_class');
/*-------------------------------------
	// Custom Excerpt
	// change the # to lengthen or shorten your excerpt
		echo get_excerpt(125);
---------------------------------------*/
function get_excerpt($count){
  // whatever you want to append on the end of the last word
  $words = '...';
  $excerpt = get_the_content();
  $excerpt = strip_tags($excerpt);
  $excerpt = wp_trim_words($excerpt, $count, $words);
  $excerpt = $excerpt . ' &raquo;&raquo;';
  return $excerpt;
}
/*-------------------------------------
	// V Cards
---------------------------------------*/
add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() ) {
// add your extension to the array
$existing_mimes['vcf'] = 'text/x-vcard';
return $existing_mimes;
}

function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'News';
    $submenu['edit.php'][5][0] = 'News';
    $submenu['edit.php'][10][0] = 'Add News';
    echo '';
}

function change_post_object_label() {
        global $wp_post_types;
        $labels = &$wp_post_types['post']->labels;
        $labels->name = 'News';
        $labels->singular_name = 'News';
        $labels->add_new = 'Add News';
        $labels->add_new_item = 'Add News';
        $labels->edit_item = 'Edit News';
        $labels->new_item = 'News';
        $labels->view_item = 'View News';
        $labels->search_items = 'Search v';
        $labels->not_found = 'No News found';
        $labels->not_found_in_trash = 'No News found in Trash';
    }
    add_action( 'init', 'change_post_object_label' );
    add_action( 'admin_menu', 'change_post_menu_label' );
	
	function wpb_mce_buttons_2($buttons) {
	array_unshift($buttons, 'styleselect');
	return $buttons;
}
add_filter('mce_buttons_2', 'wpb_mce_buttons_2');

/*
* Callback function to filter the MCE settings
*/

function my_mce_before_init_insert_formats( $init_array ) {  

// Define the style_formats array

	$style_formats = array(  
		// Each array child is a format with it's own settings
		array(  
			'title' => 'Button',  
			'block' => 'span',  
			'classes' => 'red-button',
			'wrapper' => true,
			
		), 
		array(  
			'title' => 'Red Button',  
			'block' => 'span',  
			'classes' => 'red-button-solid',
			'wrapper' => true,
			
		), 
	);  
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );  
	
	return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' ); 


/*

	Which Search Form?


*/
// function template_chooser($template)   
// {    
//   global $wp_query;   
//   $post_type = get_query_var('post_type');   
//   if( $wp_query->is_search && $post_type == 'knowledge_center' )   
//   {
//     return locate_template('search-knowledgecenter.php');  
//   } else {
//   	return locate_template('search-properties.php');
//   }

//   return $template;   
// }
// add_filter('template_include', 'template_chooser');   

function get_experience_categories() {
	global $wpdb;
	$post_type = 'profile';
	$posts = "{$wpdb->prefix}posts";
	$postmeta = "{$wpdb->prefix}postmeta";
	$query = "SELECT p.post_title,meta.* FROM {$wpdb->prefix}posts p, {$wpdb->prefix}postmeta meta WHERE p.ID=meta.post_id AND p.post_type='".$post_type."' AND p.post_status='publish' AND meta.meta_key='service_category' GROUP BY meta.meta_value";
	$result = $wpdb->get_results($query);
	$categories = array();
	if($result) {
		$objIDS = array();
		$parentArrs = array();
		foreach($result as $row) {
			$metaVal = ($row->meta_value) ? @unserialize($row->meta_value) : '';
			if($metaVal) {
				foreach($metaVal as $id) {
					$info = get_post($id);
					if($info) {
						$parent = $info->post_parent;
						if($parent>0) {
							$parentArrs[] = $parent;
							$objIDS[] = $id;
						}
					}
				}
			}
		}

		$the_ids = ($objIDS) ? array_unique($objIDS) : '';
		if($the_ids) {
			foreach($the_ids as $p_id) {
				$info = get_post($p_id);
				$i_parent = $info->post_parent;
				if( in_array($i_parent,$parentArrs) ) {
					$arg = array(
						'ID'=>$p_id,
						'post_title'=>$info->post_title,
						'post_parent'=>$info->post_parent,
						'post_type'=>$info->post_type
					);
					$categories[] = $arg;
				}
			}
		}
	}

	return $categories;
}

function get_experience_by_service_cat($catID=null) {
	global $wpdb;
	if(empty($catID)) return false;

	$post_type = 'profile';
	$posts = "{$wpdb->prefix}posts";
	$postmeta = "{$wpdb->prefix}postmeta";
	$query = "SELECT p.post_title,meta.* FROM {$wpdb->prefix}posts p, {$wpdb->prefix}postmeta meta WHERE p.ID=meta.post_id AND p.post_type='".$post_type."' AND p.post_status='publish' AND meta.meta_key='service_category'";
	$result = $wpdb->get_results($query);
	$thePosts = array();
	if($result) {
		$objIDS = array();
		$parentArrs = array();
		foreach($result as $row) {
			$postID = $row->post_id;
			$metaVal = ($row->meta_value) ? @unserialize($row->meta_value) : '';
			if($metaVal) {
				foreach($metaVal as $id) {
					$info = get_post($id);
					if($info) {
						$parent = $info->post_parent;
						if($parent>0) {
							if($catID==$id) {
								$thePosts[] = $postID;
							}
						}
					}
				}
			}
		}
	}
	return ($thePosts) ? array_unique($thePosts) : '';
}

function next_and_previous_experience($currentPostID=null) {
	if(empty($currentPostID)) return false;
	$args = array(
        'post_type'      => 'profile',
        'posts_per_page' => -1,
        'post_status'      => 'publish',
        'orderby' => 'menu_order', 
		'order' => 'ASC', 
    );
    $posts = get_posts($args);
    $post_ids = array();
    $prev_id = '';
    $next_id = '';
    $result = array();
    if($posts) {
    	$i=0; foreach($posts as $p) {
    		$id = $p->ID;
    		$post_ids[] = $p->ID;
    		$i++;
    	}

  		if($post_ids) {
  			$index = array_search($currentPostID, $post_ids);
  			$prev = $index-1;
  			$next = $index+1;

  			$prev_id = ( isset($post_ids[$prev]) && $post_ids[$prev] ) ? $post_ids[$prev] : '';
  			$next_id = ( isset($post_ids[$next]) && $post_ids[$next] ) ? $post_ids[$next] : '';
  		}
    }

    if($prev_id || $next_id) {
    	$result['prev_id'] = $prev_id;
    	$result['next_id'] = $next_id;
    } 
    return $result;
}

