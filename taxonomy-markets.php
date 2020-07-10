<?php
/**
 * Markets
 *
 * 
 */

get_header(); 

$object = get_queried_object();
$taxterm = $object->slug;
$taxonomy = $object->taxonomy;
/*echo '<pre>';
print_r($object);
echo '</pre>';*/
?>
<div class="wrapper">
	<div id="primary" class="property-content">
		<div id="content" role="main">


        <div class="entry-content">
            <h1><?php echo $object->name; ?></h1>
            <?php //the_content(); ?>
        </div><!-- entry content -->
            
            
<?php
	$i=0;
	if( have_posts() ) :
	while ( have_posts() ) : the_post();
		// image
		$image = get_field('image_of_property');
		
		$url = $image['url'];
		$title = $image['title'];
		$alt = $image['alt'];
		$caption = $image['caption'];
		$size = 'property';
		$thumb = $image['sizes'][ $size ];
		$width = $image['sizes'][ $size . '-width' ];
		$height = $image['sizes'][ $size . '-height' ];
		// other variables
		$address = get_field('address');
		$location = $address['address'];
		$us = ', United States';
		$trimmedAdd = str_replace($us, '', $location);
		$addYourAdd = get_field('add_your_own_address');
		$customAdd = get_field('custom_address');
		/*echo '<pre>';
		print_r($address);
		echo '</pre>';*/
		$i++;
		// set float class
		if( $i == 2 ) {
		$profileClass = 'property-last';
		$i = 0;
		} else {
			$profileClass = 'property-first';
		}
	?>
    
    <div class="property-wrapper <?php echo $profileClass; ?>">
        <div class="property blocks">
        
             <div class="property-image">
             <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
            </div><!-- profile image -->
            
            <div class="property-title"><?php the_title(); ?></div>
            
            <div class="property-address">
				<?php 
						if( $addYourAdd == 'Yes' ) {
							echo $customAdd;
						} else {
							echo $trimmedAdd; 
						}
					?>
            </div><!--property-address-->
            
            <div class="seemore-team"><a href="<?php the_permalink(); ?>">See More</a></div><!-- seemore -->
            
         </div><!-- property -->
     </div><!-- property-wrapper -->
    
    <?php endwhile; ?>
    <div class="clear"></div>
    <?php pagi_posts_nav(); ?>
    <?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->
    
        
        
        <div class="property-list">
        
        <div class="viewlistings-map">
       		<a href="<?php bloginfo('url'); ?>/map">View listings by Map</a>
       </div><!-- view listings -->
       
		<?php get_template_part('inc/property-search'); ?>
        
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
 	</div><!-- list -->
    </div><!-- list -->
    
    
</div><!-- wrapper -->
<?php get_footer(); ?>