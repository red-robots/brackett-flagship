<?php
 // Enqueueing all the java script in a no conflict mode
 function ineedmyjava() {
	if (!is_admin()) {

		wp_enqueue_style('customfonts', get_bloginfo('template_directory') . '/fonts/customwebfonts/MyFontsWebfontsKit.css');

		wp_deregister_script('jquery');

		wp_register_script('googlemaps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAvbVp1FfPxsPE3qzPwHQeyyHp_0VI2NWo',null,null,true);
		wp_enqueue_script('googlemaps');

		wp_register_script(
			'jquery', 
			'https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', 
			'', 
			'1.10.2', 
			true
			);
		wp_enqueue_script('jquery');
		
		// Homepage slider 'flexslider' scripts...
		wp_register_script(
			'flexslider',
			get_bloginfo('template_directory') . '/assets/js/vendors.js',
			array('jquery') , 
			'1.0' , true 
			);
		wp_enqueue_script('flexslider');


		// Custom Theme scripts...
		wp_register_script(
			'custom',
			get_bloginfo('template_directory') . '/assets/js/custom.js',
			array('jquery'), '1.0' , 
			true 
			);
		wp_enqueue_script('custom');
		
	}
}
add_action('wp_enqueue_scripts', 'ineedmyjava');

function bella_acf_init() {

	acf_update_setting('google_api_key', 'AIzaSyAvbVp1FfPxsPE3qzPwHQeyyHp_0VI2NWo');
}

add_action('acf/init', 'bella_acf_init');