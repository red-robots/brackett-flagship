<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); 

$post_type = get_query_var('post_type'); 

?>
<div class="wrapper">
	<section id="primary" class="site-content-full">
		<div id="content" role="main">

		<?php 
		$i =0;
		if ( have_posts() ) : ?>
        
        <div class="entry-content">
                	<h1><?php printf( __( 'Search Results for: %s', 'twentytwelve' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                    <?php //the_content(); ?>
                </div><!-- entry content -->

		<?php if ($post->post_type == "knowledge_center") { ?>
		<section class="newsroll">
		<?php } ?>

			<?php //twentytwelve_content_nav( 'nav-above' ); ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				
                
           <?php if ($post->post_type == "property") { 
		   
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
			if (strpos($location,'United States') !== false) {
				$us = ', United States';
			} else if(strpos($location,'USA') !== false) {
				$us = ', USA';
			}
			$trimmedAdd = str_replace($us, '', $location);
			$addYourAdd = get_field('add_your_own_address');
			$customAdd = get_field('custom_address');
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
        
             <?php if( $image != '' ) : ?>
                 <div class="property-image">
                 <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
                </div><!-- profile image -->
            <?php endif; ?>
            
            <div class="property-title"><?php the_title(); ?></div>
            
            <?php if( $image != '' ) : ?>
            	<div class="property-address">
					<?php 
						if( $addYourAdd == 'Yes' ) {
							echo $customAdd;
						} else {
							echo $trimmedAdd; 
						}
					?>
                </div><!--property-address-->
             <?php endif; ?>
             
             
            <div class="seemore"><a href="<?php the_permalink(); ?>">Details</a></div><!-- seemore -->
            
         </div><!-- property -->
     </div><!-- property-wrapper -->
     
     <?php 
	 // else style them like posts
	 } else { ?>
     
     
     <div class="news-wrapper">
        <div class="news">
        
            <h2><?php the_title(); ?></h2>
            
            <div class="entry-content">
            	<?php the_excerpt(); ?>
            </div><!-- entry content -->
            
            <div class="seemore"><a href="<?php the_permalink(); ?>">Read Full Article</a></div><!-- seemore -->
            
         </div><!-- property -->
     </div><!-- property-wrapper -->
     
     <?php } ?>
                
                
			<?php endwhile; ?>
	<?php if ($post->post_type == "knowledge_center") { ?>
		</section>
	<?php } ?>

	<div class="clear"></div>
    <?php pagi_posts_nav(); ?>
    <div class="clear"></div>

		<?php else : ?>

			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentytwelve' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentytwelve' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->
    
    
    
     
</div><!-- wrapper -->
<?php get_footer(); ?>