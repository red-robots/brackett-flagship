<?php 
/* Custom Post Types */

add_action('init', 'js_custom_init');
function js_custom_init() 
{
	
	// Register the Homepage Slides
  
     $labels = array(
	'name' => _x('Slides', 'post type general name'),
    'singular_name' => _x('Slide', 'post type singular name'),
    'add_new' => _x('Add New', 'Slide'),
    'add_new_item' => __('Add New Slide'),
    'edit_item' => __('Edit Slides'),
    'new_item' => __('New Slide'),
    'view_item' => __('View Slides'),
    'search_items' => __('Search Slides'),
    'not_found' =>  __('No Slides found'),
    'not_found_in_trash' => __('No Slides found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Slides'
  );
  $args = array(
	'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
	
  ); 
  register_post_type('slides',$args); // name used in query
  
  	// Register the Homepage Slides
  
     $labels = array(
	'name' => _x('Property', 'post type general name'),
    'singular_name' => _x('Property', 'post type singular name'),
    'add_new' => _x('Add New', 'Property'),
    'add_new_item' => __('Add New Property'),
    'edit_item' => __('Edit Property'),
    'new_item' => __('New Property'),
    'view_item' => __('View Property'),
    'search_items' => __('Properties'),
    'not_found' =>  __('No Properties found'),
    'not_found_in_trash' => __('No Properties found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Properties'
  );
  $args = array(
	'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
	
  ); 
  register_post_type('property',$args); // name used in queryf
  
  
    	// Register the Homepage Slides
  
     $labels = array(
	'name' => _x('Team', 'post type general name'),
    'singular_name' => _x('Team', 'post type singular name'),
    'add_new' => _x('Add New', 'Team Member'),
    'add_new_item' => __('Add New Member'),
    'edit_item' => __('Edit Member'),
    'new_item' => __('New Member'),
    'view_item' => __('View Member'),
    'search_items' => __('Members'),
    'not_found' =>  __('No Members found'),
    'not_found_in_trash' => __('No Members found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Team'
  );
  $args = array(
	'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
	
  ); 
  register_post_type('team',$args); // name used in queryf

          // Register the Homepage Slides
  
$labels = array(
  'name' => _x('Knowledge Center', 'post type general name'),
    'singular_name' => _x('Knowledge Center', 'post type singular name'),
    'add_new' => _x('Add New', 'Knowledge Center'),
    'add_new_item' => __('Add New Knowledge Center'),
    'edit_item' => __('Edit Knowledge Center'),
    'new_item' => __('New Knowledge Center'),
    'view_item' => __('View Knowledge Center'),
    'search_items' => __('Knowledge Center'),
    'not_found' =>  __('No Knowledge Center found'),
    'not_found_in_trash' => __('No Knowledge Center found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Knowledge Center'
  );
  $args = array(
  'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 5,
    'supports' => array('title','editor','custom-fields','thumbnail'),
  
  ); 
  register_post_type('knowledge_center',$args); // name used in queryf

  $labels = array(
  'name' => _x('Profiles', 'post type general name'),
    'singular_name' => _x('Profile', 'post type singular name'),
    'add_new' => _x('Add New', 'Profile'),
    'add_new_item' => __('Add New Profile'),
    'edit_item' => __('Edit Profile'),
    'new_item' => __('New Profile'),
    'view_item' => __('View Profile'),
    'search_items' => __('Profile'),
    'not_found' =>  __('No Profiles found'),
    'not_found_in_trash' => __('No Profiles found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Profiles'
  );
  $args = array(
  'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
  
  ); 
  register_post_type('profile',$args); // name used in queryf
  
  
      	// Register the Homepage Slides
  
     $labels = array(
	'name' => _x('Testimonial', 'post type general name'),
    'singular_name' => _x('Testimonial', 'post type singular name'),
    'add_new' => _x('Add New', 'Testimonial'),
    'add_new_item' => __('Add New Testimonial'),
    'edit_item' => __('Edit Testimonial'),
    'new_item' => __('New Testimonial'),
    'view_item' => __('View Testimonial'),
    'search_items' => __('Testimonial'),
    'not_found' =>  __('No Testimonials found'),
    'not_found_in_trash' => __('No Testimonials found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Testimonials'
  );
  $args = array(
	'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
	
  ); 
  register_post_type('testimonial',$args); // name used in queryf
  
  $labels = array(
    'name' => _x('Jobs', 'post type general name'),
      'singular_name' => _x('Job', 'post type singular name'),
      'add_new' => _x('Add New', 'Job'),
      'add_new_item' => __('Add New Job'),
      'edit_item' => __('Edit Job'),
      'new_item' => __('New Job'),
      'view_item' => __('View Job'),
      'search_items' => __('Search Jobs'),
      'not_found' =>  __('No Jobs found'),
      'not_found_in_trash' => __('No Jobs found in Trash'), 
      'parent_item_colon' => '',
      'menu_name' => 'Jobs'
    );
    $args = array(
    'labels' => $labels,
      'public' => true,
      'publicly_queryable' => true,
      'show_ui' => true, 
      'show_in_menu' => true, 
      'query_var' => true,
      'rewrite' => true,
      'capability_type' => 'post',
      'has_archive' => false, 
      'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
      'menu_position' => 20,
      'supports' => array('title','editor','custom-fields','thumbnail'),
    
    ); 
    register_post_type('job',$args); // name used in query
  // Add more between here
  
  // and here
  
  } // close custom post type
  
  /*
##############################################
	Custom Taxonomies
*/
add_action( 'init', 'build_taxonomies', 0 );
 
function build_taxonomies() {
// cusotm tax
    register_taxonomy( 'service_category', 'team',
	 array( 
	'hierarchical' => true, // true = acts like categories false = acts like tags
	'label' => 'Service Category', 
	'query_var' => true, 
	'rewrite' => true ,
	'show_admin_column' => true,
	'public' => true,
	'rewrite' => array( 'slug' => 'service-category' ),
	'_builtin' => true
	) );
	
	// cusotm tax
    register_taxonomy( 'markets', 'property',
	 array( 
	'hierarchical' => true, // true = acts like categories false = acts like tags
	'label' => 'Markets', 
	'query_var' => true, 
	'rewrite' => true ,
	'show_admin_column' => true,
	'public' => true,
	'rewrite' => array( 'slug' => 'markets' ),
	'_builtin' => true
	) );

    // cusotm tax
    register_taxonomy( 'topic', 'knowledge_center',
   array( 
  'hierarchical' => true, // true = acts like categories false = acts like tags
  'label' => 'Topic', 
  'query_var' => true, 
  'rewrite' => true ,
  'show_admin_column' => true,
  'public' => true,
  'rewrite' => array( 'slug' => 'topic' ),
  '_builtin' => true
  ) );
	
} // End build taxonomies