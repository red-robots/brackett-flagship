<?php
/**
 * The Template for displaying all single posts
 *
 * 
 */

get_header(); ?>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<div class="wrapper">
	<div id="primary" class="property-content">
		<div id="content" role="main">

<?php while ( have_posts() ) : the_post(); 
		// image	
		$image = get_field('image_of_property');
		$url = $image['url'];
		$title = $image['title'];
		$alt = $image['alt'];
		$caption = $image['caption'];
		$size = 'large';
		$thumb = $image['sizes'][ $size ];
		$width = $image['sizes'][ $size . '-width' ];
		$height = $image['sizes'][ $size . '-height' ];
		// other variables
		$saleLease = get_field('sale__lease');
		$buildingSize = get_field('building_size');
		$sqft = get_field('available_sqft');
		$salePrice = get_field('sale_price');
		$maxContig = get_field('max_contig');
		$rate = get_field('rate_(psf)');
		$leaseType = get_field('lease_type');
		$yearBuilt = get_field('year_built');
		$parking = get_field('parking_ratio');
		$availabilities = get_field('availabilities');
		$description = get_field('description');
		$flyer = get_field('flyer');
		$teamMember = get_field('team_members');
		$address = get_field('address');
		$location = $address['address'];
		//echo $location;
		if (strpos($location,'United States') !== false) {
			$us = ', United States';
		} else if(strpos($location,'USA') !== false) {
			$us = ', USA';
		}
		$pos = strpos($location,',');
		if ($pos !== false) {
			$newstring = substr_replace($location,'<br>',$pos,strlen(','));
		}
		//echo $addBreak;
		$trimmedAdd = str_replace($us, '', $newstring);
		$addYourAdd = get_field('add_your_own_address');
		$customAdd = get_field('custom_address');
		
		// Google Map Link
		//____________________________
		// if has address
		$stringAdd = str_replace(' ', '+', $location);
		$lat = $address['lat'];
		$lng = $address['lng'];
		// if has custom address
		if( $addYourAdd == 'Yes' ) {
			$viewMap = 'https://www.google.com/maps/@'.$lat.','.$lng.',16z?hl=en-US';
		} else {
			$viewMap = 'https://www.google.com/maps/place/'.$stringAdd;
		}
			?>

				<div class="entry-content">
                <h1><?php the_title(); ?></h1>
                
                <div class="single-property-image">
                	<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
                </div><!-- signel profile pic -->
                
                <div class="single-property-details">
                
                <div class="single-property-header">
                	<div class="sph-address">
					<?php 
						if( $addYourAdd == 'Yes' ) {
							echo $customAdd;
						} else {
							echo $trimmedAdd; 
						}
					?>
                    </div><!-- sph-address -->
                    <?php if( $flyer != '' ) { ?>
                    <div class="flyer"><a target="_blank" href="<?php echo $flyer; ?>">DOWNLOAD FLYER</a></div>
                    <?php } ?>
                </div><!-- single property header -->
                
                <div class="clear"></div>
                
                	<div class="property-halve-left p-paddingtop">
                    	
                        	<?php if( $saleLease != '' ) { ?>
                            <li class="property-detail">
                            	<span class="p-detail">Sale/Lease:</span><!--p-detail-->
                                <span class="p-value"><?php echo $saleLease; ?></span><!--p-detail-->
                            </li><!--property-detail-->
                            <?php } ?>
                           <?php if( $buildingSize != '' ) { ?> 
                          <li class="property-detail">
                            	<span class="p-detail">Building Size:</span><!--p-detail-->
                                <span class="p-value"><?php echo $buildingSize; ?></span><!--p-detail-->
                            </li><!--property-detail-->
                            <?php } ?>
                           <?php if( $sqft != '' ) { ?> 
                           <li class="property-detail">
                            	<span class="p-detail">Total Available SF:</span><!--p-detail-->
                                <span class="p-value"><?php echo $sqft; ?></span><!--p-detail-->
                            </li><!--property-detail-->
                            <?php } ?>
                            <?php if( $rate != '' ) { ?>
                            <li class="property-detail">
                            	<span class="p-detail">Rate (PSF):</span><!--p-detail-->
                                <span class="p-value"><?php echo $rate; ?></span><!--p-detail-->
                            </li><!--property-detail-->
                            <?php } ?>
                             <?php if( $leaseType != '' ) { ?>
                        		<li class="property-detail">
                            	<span class="p-detail">Lease Type:</span><!--p-detail-->
                                <span class="p-value"><?php echo $leaseType; ?></span><!--p-detail-->
                            </li><!--property-detail-->
                            <?php } ?>
                            <?php if( $salePrice != '' ) { ?>
                            <li class="property-detail">
                            	<span class="p-detail">Sale Price:</span><!--p-detail-->
                                <span class="p-value"><?php echo $salePrice; ?></span><!--p-detail-->
                            </li><!--property-detail-->
                            <?php } ?>
                            <?php if( $yearBuilt != '' ) { ?>
                            <li class="property-detail">
                            	<span class="p-detail">Year Built:</span><!--p-detail-->
                                <span class="p-value"><?php echo $yearBuilt; ?></span><!--p-detail-->
                            </li><!--property-detail-->
                            <?php } ?>
                            <?php if( $parking != '' ) { ?>
                            <li class="property-detail">
                            	<span class="p-detail">Parking Ratio:</span><!--p-detail-->
                                <span class="p-value"><?php echo $parking; ?></span><!--p-detail-->
                            </li><!--property-detail-->
                            <?php } ?>
                     
                        
                       
                    </div><!-- property halve -->
                    
                    <div class="property-halve-right">
                    	<?php 
						if( !empty($address) ):
						?>
						<div class="acf-map-small">
							<div class="marker" data-lat="<?php echo $address['lat']; ?>" data-lng="<?php echo $address['lng']; ?>">
                            <h4><?php the_title(); ?></h4>
            					<p class="address"><?php echo $address['address']; ?></p>
                            
                            </div><!-- marker -->
						</div>
                        <div class="viewmap">
                        		<a href="<?php echo $viewMap; ?>" target="_blank" >view larger map</a>
                        </div><!--viewmap-->
						<?php endif; ?>
                    </div><!-- property halve -->
                    
                </div><!-- single property -details -->
                
                <div class="clear"></div>
                
                <?php if( $availabilities != '' ) { ?>
                    <div class="single-profile-extras">
                    	<h3>Availabilities</h3>
                        <?php if(have_rows('availabilities')) : ?>
                        <ul class="availabilities">
                        <?php while(have_rows('availabilities')) : the_row();
									$bullet = get_sub_field('avail_bullet');
									$floorplan = get_sub_field('floorplan');
						?>
                        		<li>
									<span class="bullet"><?php echo $bullet; ?></span>
                                    <div class="clear"></div>
                                <?php if( $floorplan != '' ) { ?>
                                	<div class="floorplan"><a href="<?php echo $floorplan; ?>">VIEW FLOORPLAN</a></div>
                                    <?php } ?>
                                </li>
                        
                        <?php endwhile; ?>
						</ul>
						<?php endif; ?>
                    </div><!-- signel profile extras -->
                <?php } ?>
                
                <?php if( $description != '' ) { ?>
                	<div class="single-profile-extras">
                    	<h3>description</h3>
                       
                        <?php echo $description; ?>
                        
                    </div><!-- signel profile extras -->
                <?php } ?>
                
                
                <?php 
					/*echo '<pre>';
					print_r($teamMember);
					echo '</pre>';*/
				   if( $teamMember ):
				   // will probably have multiple
					foreach( $teamMember as $post):
					setup_postdata( $post );
					$i++;
	$image = get_field('team_photo');
	$url = $image['url'];
	$title = $image['title'];
	$alt = $image['alt'];
	$caption = $image['caption'];
	$size = 'profile';
	$thumb = $image['sizes'][ $size ];
	$width = $image['sizes'][ $size . '-width' ];
	$height = $image['sizes'][ $size . '-height' ];
	$jobTitle = get_field('job_title');
	$dPhone = get_field('direct_phone');
	$mPhone = get_field('mobile_phone');
	$oPHone = get_field('office_phone');
	$email = get_field('email');
	$obfsc = antispambot($email);
	$vcard = get_field('vcard');
	
	if( $i == 4 ) {
		$profileClass = 'profile-last';
		$i = 0;
	} else {
		$profileClass = 'profile-first';
	}
					?>
                
 <div class="profile-wrapper <?php echo $profileClass; ?>">
    <div class="profile blocks">
    	 <div class="profile-image">
         <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
    	</div><!-- profile image -->
        
        <div class="profile-title"><?php the_title(); ?></div>
        
        <?php if( $jobTitle != '' ) {echo '<div class="profile-name">'.$jobTitle.'</div>';} ?>
        
        <?php if( $dPhone != '' ) {echo '<div class="profile-phone">D.'.$dPhone.'</div>';} ?>
        <?php if( $mPhone != '' ) {echo '<div class="profile-phone">M.'.$mPhone.'</div>';} ?>
        <?php if( $oPhone != '' ) {echo '<div class="profile-phone">O.'.$oPhone.'</div>';} ?>
        
        <?php if( $email != '' ) {
				echo '<div class="profile-email"><a href="mailto:'.$obfsc.'">'.$obfsc.'</a></div>';
			} ?>
            
         <?php if( $vcard != '' ) {
				echo '<div class="profile-card"><a href="'.$vcard.'">download vcard</a></div>';
			} ?>
            
            <div class="clear"></div>
            
            <div class="seemore-team"><a href="<?php the_permalink(); ?>">Full Bio</a></div><!-- seemore -->
    </div><!-- profile -->
    </div><!-- profile wrapper  -->
                
                <?php endforeach; endif; wp_reset_postdata(); ?>
                
                
                <?php if(have_rows('additional_team_members')):
						while(have_rows('additional_team_members')):
						the_row();
						$xName = get_sub_field('name');
						$xCompany = get_sub_field('company');
						$xphone = get_sub_field('phone');
						$xemail = get_sub_field('email');
						$obEmail = antispambot($xemail);
						?>
                        
<div class="property-profile-wrapper  <?php echo $profileClass; ?>">
    <div class="profile overflow">

     <div class="profile-title"><?php echo $xName; ?></div>
        <?php if( $xCompany != '' ) {echo '<div class="profile-name">'.$xCompany.'</div>';} ?>
        <?php if( $xphone != '' ) {echo '<div class="profile-phone">'.$xphone.'</div>';} ?>
        <?php if( $obEmail != '' ) {
				echo '<div class="profile-card"><a href="'.$obEmail.'">'.$obEmail.'</a></div>';
			} ?>
    </div><!-- profile -->
</div><!-- profile-wrapper -->

  
                        <?php endwhile; endif; ?>
                </div><!-- tentru contetn -->

				

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
    
       
       
        <div class="property-list">
        
        <div class="viewlistings-map">
       		<a href="<?php bloginfo('url'); ?>/map">View listings by Map</a>
       </div><!-- view listings -->
    	
        	<div class="property-list-content">
            <h3>Filter Listings By</h3>
            <ul class="listings">
            <?php
			$args = array(
				'show_option_all'    => '',
				'orderby'            => 'name',
				'order'              => 'ASC',
				'style'              => 'list',
				'show_count'         => 0,
				'hide_empty'         => 1,
				'use_desc_for_title' => 0,
				'child_of'           => 0,
				'feed'               => '',
				'feed_type'          => '',
				'feed_image'         => '',
				'exclude'            => '',
				'exclude_tree'       => '',
				'include'            => '',
				'hierarchical'       => 1,
				'title_li'           => __( '' ),
				'show_option_none'   => __( '' ),
				'number'             => null,
				'echo'               => 1,
				'depth'              => 0,
				'current_category'   => 0,
				'pad_counts'         => 0,
				'taxonomy'           => 'markets',
				'walker'             => null
				);
				wp_list_categories( $args );
				
				?>
                </ul>
        </div><!-- content -->
 	</div><!-- list -->
    
</div><!-- wrapper -->

<script type="text/javascript">
(function($) {

/*
*  new_map
*
*  This function will render a Google Map onto the selected jQuery element
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$el (jQuery element)
*  @return	n/a
*/

function new_map( $el ) {
	
	// var
	var $markers = $el.find('.marker');
	
	
	// vars
	var args = {
		zoom		: 16,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP
	};
	
	
	// create map	        	
	var map = new google.maps.Map( $el[0], args);
	
	
	// add a markers reference
	map.markers = [];
	
	
	// add markers
	$markers.each(function(){
		
    	add_marker( $(this), map );
		
	});
	
	
	// center map
	center_map( map );
	
	
	// return
	return map;
	
}

/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$marker (jQuery element)
*  @param	map (Google Map object)
*  @return	n/a
*/

function add_marker( $marker, map ) {

	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map
	});

	// add to array
	map.markers.push( marker );

	// if marker contains HTML, add it to an infoWindow
	if( $marker.html() )
	{
		// create info window
		var infowindow = new google.maps.InfoWindow({
			content		: $marker.html()
		});

		// show info window when marker is clicked
		google.maps.event.addListener(marker, 'click', function() {

			infowindow.open( map, marker );

		});
	}

}

/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	map (Google Map object)
*  @return	n/a
*/

function center_map( map ) {

	// vars
	var bounds = new google.maps.LatLngBounds();

	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){

		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

		bounds.extend( latlng );

	});

	// only 1 marker?
	if( map.markers.length == 1 )
	{
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 16 );
	}
	else
	{
		// fit to bounds
		map.fitBounds( bounds );
	}

}

/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*
*  @type	function
*  @date	8/11/2013
*  @since	5.0.0
*
*  @param	n/a
*  @return	n/a
*/
// global var
var map = null;

$(document).ready(function(){

	$('.acf-map-small').each(function(){

		// create map
		map = new_map( $(this) );

	});

});

})(jQuery);
</script>
<?php get_footer(); ?>