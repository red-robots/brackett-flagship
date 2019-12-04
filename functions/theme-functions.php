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

function jberg_enable_vcard_upload( $mime_types=array() ){
  	$mime_types['vcf'] = 'text/x-vcard';
	$mime_types['vcard'] = 'text/x-vcard';
  	return $mime_types;
}
add_filter('upload_mimes', 'jberg_enable_vcard_upload' );

/*-------------------------------------
	Custom client login, link and title.
---------------------------------------*/
function my_login_logo() { ?>
<style type="text/css">
  body.login div#login h1 a {
  	background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png);
  	background-size: 360px 136px;
  	width: 360px;
  	height: 136px;
  }
</style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

// Change Link
function loginpage_custom_link() {
	return the_permalink();
}
add_filter('login_headerurl','loginpage_custom_link');

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


